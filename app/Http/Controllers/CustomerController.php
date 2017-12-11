<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Dosage;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\TranslatorController;
use App\L;
use App\Mail\ContactUs;
use App\Page;
use App\TrialPackEmail;
use App\Unsubscribe;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
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

    public function update(Request $request, $id)
    {
        $post = $request->all();
        $post['id'] = $id;

        $str = http_build_query($post, '', '&');
        $res = $this->api_curl_send(env('ORDERS_URL').'/customer_update', $str);

        $customer = unserialize($res);
        session(['customer'=>$customer]);
        return redirect()->back();
    }

    public function login(Request $request){

        $post = $request->all();
        
        unset($post['_token']);
        $str = http_build_query($post, '', '&');
        $res = $this->api_curl_send(env('ORDERS_URL').'/customer_login', $str);
        if($res != 'fail'){
            $customer = unserialize($res);
        }
        if(isset($customer)){
            session(['customer' => $customer]);
        }else{
            session(['login_error'=>1]);
        }
        return redirect()->back();
    }
    public function customer_auth_shipping(Request $request){

        $post = $request->all();
        
        $str = http_build_query($post, '', '&');
        $res = $this->api_curl_send(env('ORDERS_URL').'/customer_login', $str);
        $customer = $res;
        if($res != 'fail'){
            $customer = unserialize($res);
            session(['customer' => $customer]);
        }
        return $customer;
    }

    public function register(Request $request){
        $lang = PageController::getCurLang();//get language
        $L = new TranslatorController($lang); //get instance of translator

        $pass = $request->get('password_r');
        
        if(!$pass || strlen($pass)==0){
            $pass = $this->getRandCode(6);
        }
        
        $post = [
            'email'=>$request->get('email_r'),
            'fname'=>$request->get('name'),
            'lname'=>$request->get('last_name'),
            'password'=>$pass,
            'sendMail'=>'0',
            'getCustomer'=>'0'
        ];

        $str = http_build_query($post, '', '&');
        $res = $this->api_curl_send(env('ORDERS_URL').'/customer_register', $str);
//        dd($res);
        if($res == 'This email is already used!'){
            session(['error_email'=>$L->__('This email is already used!')]);
        }else{
            session(['customer' => unserialize($res)]);
        }

        return redirect()->back();
    }

    public function register_shipping(Request $request){
        
        $pass = $request->get('password_r');
        $sendMail = 2;
        if(!$pass || strlen($pass)==0){
            $pass = $this->getRandCode(6);
            $sendMail = 1;
        }

        $p = [
            'email'=>$request->get('email_r'),
            'fname'=>$request->get('name'),
            'lname'=>$request->get('last_name'),
            'lang_reg'=>$request->get('lang_reg'),
            'password'=>$pass,
            'sendMail'=>$sendMail,
            'getCustomer'=>'0',
        ];

        $str = http_build_query($p, '', '&');
        $res = $this->api_curl_send(env('ORDERS_URL').'/customer_register', $str);/*serialized customer*/
        
        if($res!='This email is already used!'){
            $post['customer'] = $res;

            $arr = [];
            $post['order_price'] = 0;
            $quantities = [];
            foreach(session('updated_cart')['prod_id'] as $prod_id=>$quantity){
                $quantities[$prod_id] =  $quantity;
            }

            foreach ($quantities as $id => $quantity) {

                if ($id == "'2002'" || $id == "'2003'") {
                    $email = $request->get('email');
                    $check = TrialPackEmail::where('email', $email)->first();
                    if (isset($check)) {
                        session(['trialEmail' => 'false']);
                        return back()->withInput();
                    } else {
                        $t = new TrialPackEmail();
                        $t->email = $email;
                        $t->save();
                    }
                }

                $arr[substr($id, 1, 4)] = Page::where('lang', $request->get('lang_reg'))
                    ->where('prod_id', substr($id, 1, 4))->first();
                $arr[substr($id, 1, 4)]->sku_val = substr($id, 1, 4);
                $arr[substr($id, 1, 4)]->id_val = $arr[substr($id, 1, 4)]->id;
                $arr[substr($id, 1, 4)]->price_val = Dosage::where('lang', $request->get('lang_reg'))
                    ->where('prod_id', substr($id, 1, 4))->first()->price;
                $arr[substr($id, 1, 4)]->img_path = '/img/';
                $arr[substr($id, 1, 4)]->img_name = substr($id, 1, 4) . '_1.jpg';
                $arr[substr($id, 1, 4)]->url = $arr[substr($id, 1, 4)]->seo_url;
                $price = $arr[substr($id, 1, 4)]->price_val * $quantity;
                if (session()->has('discount') && session('discount') != 'false') {
                    if (substr($id, 1, 1) != 3) {
                        $post['discount'] = session('discount')->rate;
                        $price = $price - $price * session('discount')->rate / 100;
                        $price = round($price, 2);
                    }
                }
                if (session()->has('discount_api')) {
                    if(session('discount_api')->unit=='%'){
                        if (substr($id, 1, 1) != 3) {
                            $post['discount'] = session('discount_api')->value;
                            $price = $price - $price * session('discount_api')->value / 100;
                            $price = round($price, 2);
                        }
                    }

                }
                $post['order_price'] += $price;
                $arr[substr($id, 1, 4)]->quantity = $quantity;
            }

            if(session()->has('discount_api') && session('discount_api')->unit!='%'){
                $post['order_price'] = $post['order_price'] - session('discount_api')->value;
                $post['discount'] = session('discount_api')->value;
                $post['discount_unit'] = session('discount_api')->unit;
            }

            $post['cart'] = serialize($arr);
            $post['aff_id'] = env('AFF_ID');
            $post['lang'] = $request->get('lang_reg');
            $post['site_url'] = 'www.psoeasy.com';

            $st = http_build_query($post, '', '&');
            $r = $this->api_curl_send(env('ORDERS_URL') . '/save_lead', $st);/*lead id*/

            session(['lead_id'=>$r]);
        }
    }

    public function forget_pass(Request $request){
        $post = [
            'email'=>$request->get('email'),
            'site_url'=>$_SERVER['SERVER_NAME'],
            'lang'=>$request->get('lang')
        ];
        //dd($post);
        $str = http_build_query($post, '', '&');
        $res = $this->api_curl_send(env('ORDERS_URL').'/customer_forget_pass', $str);
        session(['forget_pass'=>$res]);
        return redirect()->back();
    }

    public function forget_pass_shipping(Request $request){
        $post = [
            'email'=>$request->get('email'),
            'site_url'=>$_SERVER['SERVER_NAME'],
            'lang'=>$request->get('lang')
        ];
        $str = http_build_query($post, '', '&');
        $res = $this->api_curl_send(env('ORDERS_URL').'/customer_forget_pass', $str);
        return $res;
    }
    
    public function contactUs(Request $request){
        $post = $request->all();
        unset($post['_token']);
        $post['site_url'] = $_SERVER['SERVER_NAME'];
        $str = http_build_query($post, '', '&');
        $res = $this->api_curl_send(env('ORDERS_URL').'/contact_admin', $str);

        session(['success'=>1]);
        return redirect()->back();
    }
    public function getRandCode($int)
    {
        $chars = "qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
        $max = $int;
        $size = strlen($chars) - 1;
        $code = null;
        while ($max--)
            $code .= $chars[rand(0, $size)];

        return $code;
    }

    public function toMail(Request $request){
        $post = $request->all();
        unset($post['_token']);
        $post['site_url'] = $_SERVER['SERVER_NAME'];
        $str = http_build_query($post, '', '&');
        $res = $this->api_curl_send(env('ORDERS_URL').'/toMail', $str);
//        dd($res);
        session(['success'=>1]);
        return redirect()->back();
    }

    public function unsubscribe($lang, $email, $subject){
        $data['L'] = new TranslatorController($lang); //get instance of translator
        $data['img'] = new ImageController($lang);
        $data['email'] = $email;
        $data['subject'] = $subject;
        return view('types.static.27',$data);
    }
    public function doUnsubscribe(Request $request){
        $post = $request->all();
        unset($post['_token']);
        Unsubscribe::create($post);
        return redirect()->back()->with('info','unsub_success');
    }
}