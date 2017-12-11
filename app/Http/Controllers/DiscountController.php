<?php

namespace App\Http\Controllers;

use App\Discount;
use App\Http\Controllers\Admin\TranslatorController;
use App\Mail\FirstTimeDiscount;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;

class DiscountController extends Controller
{
    public function firstTime(Request $request)
    {
        $email = $request->get('email');
        $check = Discount::where('email', $email)->first();
        if (!isset($check)){
            $arr['code'] = $this->getRandCode(10);
            $arr['email'] = $email;
            $arr['rate'] = '50';
            $arr['active'] = 1;
            Discount::create($arr);
            $lang = $request->get('lang');
            $data['L'] = new TranslatorController($lang); //get instance of translator
            $data['code'] = $arr['code'];
            Mail::to($email)->send(new FirstTimeDiscount($data));
            session(['success'=>11]);
            return back();
        }
        return back();
    }

    public function checkUniqueEmail(Request $request)
    {
        $email = $request->get('email');
        $check = Discount::where('email', $email)->first();
        return (isset($check)) ? 'false' : 'true';
    }

    public function getRandCode($int){
        $chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
        $max=$int;
        $size=strlen($chars)-1;
        $code=null;
        while($max--)
            $code.=$chars[rand(0,$size)];
        $check = Discount::where('code', $code)->first();
            if(isset($check)){
                $this->getRandCode($int);
            }
        return $code;
    }

    public function checkDiscount(Request $request){
        $code = $request->get('promo_code');
        $price = $request->get('price');
        if (session()->has('discount')){
            session()->forget('discount');
        }
        if (session()->has('discount_api')){
            session()->forget('discount_api');
        }
        $post = [
            'code'=>$code,
            'site_url'=>$_SERVER['SERVER_NAME'],
            'price'=>$price
        ];
        $str = http_build_query($post, '', '&');
        $res = $this->api_curl_send(env('ORDERS_URL') . '/getDiscount', $str);

        if($res=='low_price'){
            session(['discount'=>'false']);
            session(['low_price'=>1]);
        }else{
            if($res!=='false'){
                $discount = unserialize($res);
                session(['discount_api'=>$discount]);
            }else{
                $discount = Discount::where('code', $code)
                    ->where('active', '1')
                    ->first();
                if (isset($discount)){
                    session(['discount'=>$discount]);
                    $discount->active = 0;
                    $discount->save();
                }else{
                    session(['discount'=>'false']);
                }
            }
        }
        
        
    }

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
}
