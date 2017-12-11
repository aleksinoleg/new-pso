<?php

namespace App\Http\Controllers;

use App\Dosage;
use App\Page;
use App\TrialPackEmail;
use Illuminate\Http\Request;

use App\Http\Requests;

class OrderController extends Controller
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

    public function proceed(Request $request)
    {
        $flag = 'red';
        $cart = session('cart');
        foreach ($cart as $item){
            if($item['price']>0){
                $flag = 'green';
            }
        }

        if(session()->has('free_soap') && $flag=='red'){
            return redirect()->back()->with('free_soap_error',1);
        }else{
            $post = $request->all();

            if(isset($post['free_soap_60'])&&$post['free_soap_60']==1){
                $cart['free_soap_60'] = ["prod_id"=>"1002","price"=>0,"currency"=>"€","quantity"=>1];
                session(['cart'=>$cart]);
            }else{
                unset($cart['free_soap_60']);
                session(['cart'=>$cart]);

                if(isset($post['prod_id']["'1002'_free"])){
                    unset($post['prod_id']["'1002'_free"]);
                }

            }

            unset($post['_token']);
            session(['updated_cart' => $post]);

            return redirect()->to('/' . $post['lang'] . '/' . $post['link']);
        }

    }

    public function finishOrder(Request $request)
    {
        $post = $request->all();

        /*fill empty rows*/
        $post['fname_shipping'] = (empty($post['fname_shipping'])) ? $post['fname'] : $post['fname_shipping'];
        $post['lname_shipping'] = (empty($post['lname_shipping'])) ? $post['lname'] : $post['lname_shipping'];
        $post['address_shipping'] = (empty($post['address_shipping'])) ? $post['address'] : $post['address_shipping'];
        $post['zip_shipping'] = (empty($post['zip_shipping'])) ? $post['zip'] : $post['zip_shipping'];
        $post['city_shipping'] = (empty($post['city_shipping'])) ? $post['city'] : $post['city_shipping'];
        $post['ship_phone'] = (empty($post['ship_phone'])) ? $post['phone'] : $post['ship_phone'];
        $post['country_shipping'] = (isset($post['addShippingInfo'])) ? $post['country_shipping'] : $post['country'];
        if (isset($post['addShippingInfo'])) {
            if (!isset($post['ship_state'])) {
                $post['ship_state'] = (isset($post['state'])) ? $post['state'] : '';
            }
        } else {
            $post['ship_state'] = (isset($post['state'])) ? $post['state'] : '';
        }

        $post['aff_id'] = env('AFF_ID');
        if(!isset($post['state_billing'])){
            $post['state_billing'] = (isset($post['state_shipping']))?$post['state_shipping']:'';
        }


        $post['site_url'] = $_SERVER['SERVER_NAME'];
        $post['affiliate'] = (session()->has('affiliate'))?session('affiliate'):'';

        $arr = [];
        $post['order_price'] = 0;
        $post['notes'] = '';

        //dd($post['quantity']);
        foreach ($post['quantity'] as $id => $quantity) {
            
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

            if($id=="'1002'_free"){
                $arr[substr($id, 1, 4).'_free'] = Page::where('lang', $post['lang'])
                    ->where('prod_id', substr($id, 1, 4))->first();


                $arr[substr($id, 1, 4).'_free']->price_val = 0;






                $arr[substr($id, 1, 4).'_free']->sku_val = substr($id, 1, 4);
                $arr[substr($id, 1, 4).'_free']->id_val = $arr[substr($id, 1, 4).'_free']->id;
                $arr[substr($id, 1, 4).'_free']->img_path = '/img/';
                $arr[substr($id, 1, 4).'_free']->img_name = substr($id, 1, 4) . '_1.jpg';
                $arr[substr($id, 1, 4).'_free']->url = $arr[substr($id, 1, 4).'_free']->seo_url;
                $arr[substr($id, 1, 4).'_free']->quantity = 1;
                $price = $arr[substr($id, 1, 4).'_free']->price_val * $quantity;


            }else{

                $arr[substr($id, 1, 4)] = Page::where('lang', $post['lang'])
                    ->where('prod_id', substr($id, 1, 4))->first();
                $arr[substr($id, 1, 4)]->price_val = Dosage::where('lang', $post['lang'])
                    ->where('prod_id', substr($id, 1, 4))->first()->price;
                $arr[substr($id, 1, 4)]->sku_val = substr($id, 1, 4);
                $arr[substr($id, 1, 4)]->id_val = $arr[substr($id, 1, 4)]->id;
                $arr[substr($id, 1, 4)]->img_path = '/img/';
                $arr[substr($id, 1, 4)]->img_name = substr($id, 1, 4) . '_1.jpg';
                $arr[substr($id, 1, 4)]->url = $arr[substr($id, 1, 4)]->seo_url;
                $arr[substr($id, 1, 4)]->quantity = $quantity;
                $price = $arr[substr($id, 1, 4)]->price_val * $quantity;

            }



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

        }


        if(session()->has('discount_api') && session('discount_api')->unit!='%'){
            $post['order_price'] = $post['order_price'] - session('discount_api')->value;
            $post['discount'] = session('discount_api')->value;
            $post['discount_unit'] = session('discount_api')->unit;
        }

        $post['cart'] = serialize($arr);
        $post['lead_id'] = session('lead_id');
        $post['parent_site'] = session('parent_site')[2]??'';

        session()->forget('parent_site');

        if(session()->has('emailClick')){
            $post['emailClick'] = session('emailClick');
            session()->forget('emailClick');
        }


        //dd($arr);

        $str = http_build_query($post, '', '&');
        $res = $this->api_curl_send(env('ORDERS_URL') . '/save_order', $str);
        //dd($res);
        $retData = unserialize($res);


        /*go to tranzila payment*/

        $data['order'] = $retData['order'];

        $data['customer'] = $retData['customer'];

        session()->forget('discount');
        session()->forget('discount_api');

        if(session()->has('aff_user')){
            $post12 = [
                'customer_id'=>$data['customer']->id,
                'order_id'=>$data['order']->id,
                'code'=>session('aff_user'),
                'price'=>$data['order']->total_cost
            ];
            $str = http_build_query($post12, '', '&');
            $res = $this->api_curl_send(env('AFF_URL') . '/save_aff_order', $str);
        }

//        if($post['order_price']==0){
//            return redirect()->to('/'.$data['order']->lang.'/')->with('info', 'free_order');
//        }

        if ($post['payment'] == 'credit_cart') {
            return view('direct_tranzila', $data);
        } else {
            if($data['customer']->email=='test@test.com'){
                return view('paypal_test', $data);
            }else{
                return view('paypal', $data);
            }
        }
    }

    public function repayOrder($method, $id)
    {

        if (session()->has('customer')) {
            $data['customer'] = session('customer');
            $c = session()->get('customer');
            $post = [
                'id' => $c->id,
                'site_url' => $_SERVER['SERVER_NAME']
            ];
            $str = http_build_query($post, '', '&');
            $res = $this->api_curl_send(env('ORDERS_URL') . '/get_customer_orders', $str);

            $orders = unserialize($res);
            foreach ($orders as $order) {
                if (isset($order)) {
                    foreach ($order->prod as $prod) {
                        if (isset($prod)) {
                            $prod->page = Page::find($prod->prod_id);
                        }
                    }

                    if ($order->id == $id) {
                        $data['order'] = $order;
                    }
                }
            }
            if (isset($data['order'])) {
                if ($method == 'cart') {
                    return view('direct_tranzila', $data);
                } else {
                    return view('paypal', $data);
                }
            } else {
                return redirect()->to('/');
            }

        } else {
            return redirect()->to('/');
        }
    }

    public function addOneTo(Request $request){
        $key = $request->get('key');
        $a = session('cart');
        $a[$key]['quantity']++;
        session(['cart'=>$a]);
    }
    public function removeOneTo(Request $request){
            $key = $request->get('key');
            $a = session('cart');

            $a[$key]['quantity']--;
            session(['cart'=>$a]);
        }

}
