<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    function api_curl_send($url, $data)
    {
        $user_agent = "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_URL, $url);/**/
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // this line makes it work under https
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
        $result = curl_exec($ch);
        if (curl_error($ch)) {
            $error_num = curl_errno($ch);
            return false;
        }
        curl_close($ch);
        return $result;
    }

    public function askQuestion(Request $request)
    {
        $post = $request->all();
        $post1 = [
            'secret'=>'6LcDciYUAAAAAMyURgg9Ou1qZSU1WuwCEM9mrnP_',
            'response'=>$post['g-recaptcha-response']
        ];
        $str = http_build_query($post1, '', '&');
        $res1 = $this->api_curl_send('https://www.google.com/recaptcha/api/siteverify', $str);

        if (json_decode($res1)->success==true) {
            unset($post['_token']);
            $post['published'] = 0;
            $post['answer'] = '';
            $question = Question::create($post);

            $post['site_url'] = $_SERVER['SERVER_NAME'];
            $post['question_id'] = $question->id;

            $str = http_build_query($post, '', '&');
            $res = $this->api_curl_send(env('ORDERS_URL') . '/question_admin', $str);
            session(['question' => '1']);
            return redirect()->back();
        }else{
            return redirect()->back()->with('captcha_error',1)->withInput();
        }
        
    }

    public function answerQuestion($id)
    {
        $data['question'] = Question::find($id);
        return view('admin.answer-question', $data);
    }

    public function dellQuestion($id)
    {
        $question = Question::find($id);
        $question->delete();
        return redirect()->route('admin');
    }

    public function saveAnswer(Request $request, $id)
    {
        $question = Question::find($id);
        $post = $request->all();
        $question->answer = $post['answer'];
        $question->name = $post['name'];
        $question->email = $post['email'];
        $question->age = $post['age'];
        $question->title = $post['title'];
        $question->question = $post['question'];
        $question->created_at = $post['created_at'];
        if (isset($post['published'])) {
            $question->published = 1;
        } else {
            $question->published = 0;
        }
        $question->save();
        $arr = [
            'site_url' => $_SERVER['SERVER_NAME'],
            'lang' => $question->lang,
            'email' => $question->email,
            'name' => $question->name,
            'question' => $question->question,
            'answer' => $question->answer,
            'created_at' => $question->created_at,
        ];
        $str = http_build_query($arr, '', '&');
        $res = $this->api_curl_send(env('ORDERS_URL') . '/answer_user', $str);
        return redirect()->route('admin');
    }
}
