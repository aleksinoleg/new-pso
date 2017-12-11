<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AffiliateController extends Controller
{
    function api_curl_send($url, $data)
    {
        $user_agent = "Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_URL, $url);/**/
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this line makes it work under https
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
        $result = curl_exec($ch);
        if (curl_error($ch)) {
            $error_num = curl_errno($ch);
            return curl_error($ch);
        }
        curl_close($ch);
        return $result;
    }

    public function index($aff_id, $banner_id, $lang, $url='/'){
        //session()->forget('aff_user');
//        dd($url);
        if(!isset($_SERVER['HTTP_REFERER'])){
            $_SERVER['HTTP_REFERER'] = '//';
        }

        $code = $this->getRandCode(10);
        //if(!session()->has('aff_user')){
            session(['aff_user'=>$code]);
            session(['affiliate'=>$aff_id]);
            $post = [
                'aff_id'=>$aff_id,
                'lang'=>$lang,
                'url'=>$url,
                'code'=>$code,
                'banner_id'=>$banner_id,
                'parent_url'=>$_SERVER['HTTP_REFERER']
            ];
            $str = http_build_query($post, '', '&');
            $res = $this->api_curl_send(env('AFF_URL') .'/save_aff_visitor', $str);
        //dd($res);
        //}

        return redirect()->to('/'.$lang.'/'.$url);
    }
    public function getRandCode($int){
        $chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
        $max=$int;
        $size=strlen($chars)-1;
        $code=null;
        while($max--)
            $code.=$chars[rand(0,$size)];
        return $code;
    }
}
