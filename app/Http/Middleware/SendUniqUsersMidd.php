<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Mobile_Detect;
use Closure;
use Illuminate\Support\Facades\Cookie;

class SendUniqUsersMidd
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
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $detect = new Mobile_Detect();
        $date = date('d/m/Y');
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $user_ip = $_SERVER['REMOTE_ADDR'];
        $user_type = 'desktop';
        if($detect->isTablet()){
            $user_type = 'tablet';
        }
        if($detect->isMobile()){
            $user_type = 'mobile';
        }
        if(substr($user_agent,0,7)=='Mozilla'){
            $bot = stripos($user_agent, 'bot');
            $http = stripos($user_agent, '+http');
            $compatible = stripos($user_agent, 'compatible');
            if(!$bot && !$http && !$compatible){
                $key = $date.'/'.$user_agent.'/'.$user_ip.'/'.$user_type;
                $post = [
                    'aff_id'=>env('AFF_ID'),
                    'site_url'=>$_SERVER['SERVER_NAME'],
                    'key'=>$key
                ];
                $str = http_build_query($post, '', '&');
                $res = $this->api_curl_send(env('ORDERS_URL').'/addVisitorNew', $str);
                //dd($res);
            }
            
        }


        return $next($request);
    }
}