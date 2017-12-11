<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;

class SendStatisticMidd
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
        $h = date('H');
        $i = date('i');
        $min = $h*60+$i;
        $minLeft = 1440 - $min;

        //Cookie::queue('unique', 'true', -1);
        $cookie = $request->cookie('unique');
        if(isset($cookie)){
            $post = [
                'aff_id'=>env('AFF_ID'),
                'site_url'=>$_SERVER['SERVER_NAME']
            ];
            $str = http_build_query($post, '', '&');
            $res = $this->api_curl_send(env('ORDERS_URL').'/addHit', $str);
        }else{
            $post = [
                'aff_id'=>env('AFF_ID'),
                'site_url'=>$_SERVER['SERVER_NAME']
            ];
            $str = http_build_query($post, '', '&');
            $res = $this->api_curl_send(env('ORDERS_URL').'/addVisitor', $str);
            Cookie::queue('unique', 'true', $minLeft);
        }

        return $next($request);
    }
}