<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\Country;
use App\Dosage;
use App\Http\Controllers\Admin\ImageController;
use App\Language;
use App\Page;
use App\PaymentPaypal;
use App\PaypalIpn;
use App\Question;
use App\Redirect;
use App\Review;
use App\Setting;
use App\State;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\TranslatorController;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
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

    public static function getCurLang(){
        $path = $_SERVER['REQUEST_URI'];
        $path = explode('/',$path);
        return $path[1];
    }

    public function getStates($id){


        $states = State::where('country_id', $id)->get();
        $str = '<div class="wrap_in state"><select name = "state_billing" id="state" class="take_val shipping_form_input">';
        foreach($states as $state){
            $str.='<option value="'.$state->state_name.'">'.$state->state_name.'</option>';
        }
        $str.='</select></div>';
        if(empty($state)){
            $str='';
        }
        return $str;
    }

    public function getStates_shipping($id){

        $states = State::where('country_id', $id)->get();
        $str = '<div class="wrap_in state"><select name = "state_shipping" id="ship_state" class="take_val shipping_form_input">';
        foreach($states as $state){
            $str.='<option value="'.$state->state_name.'">'.$state->state_name.'</option>';
        }
        $str.='</select></div>';
        if(empty($state)){
            $str='';
        }
        return $str;
    }

    public function getStates_c($id){

        $states = State::where('country_id', $id)->get();
        $str = '<div class="wrap_in state"><select name = "state" id="state" class="form-control">';
        foreach($states as $state){
            $str.='<option value="'.$state->state_name.'"';
            $str.=($state->state_name==session('customer')->bill_state)?' selected':'';
            $str.='>'.$state->state_name.'</option>';
        }
        $str.='</select></div>';
        if(empty($state)){
            $str='';
        }
        return $str;
    }

    public function getStates_shipping_c($id){

        $states = State::where('country_id', $id)->get();
        $str = '<div class="wrap_in state"><select name = "ship_state" id="state" class="form-control">';
        foreach($states as $state){
            $str.='<option value="'.$state->state_name.'"';
            $str.=($state->state_name==session('customer')->ship_state)?' selected':'';
            $str.='>'.$state->state_name.'</option>';
        }
        $str.='</select></div>';
        if(empty($state)){
            $str='';
        }
        return $str;
    }

    public function getQuestionsForProduct($prod_id, $lang){
        $questions = Question::where('published','1')
            ->where('lang', $lang)
            ->where('prod_id', $prod_id)
            ->latest()
            ->limit(5)
            ->get();
        return $questions;
    }

    public function getQuestionByScroll($prod_id,$count){
        $lang = self::getCurLang();
        $L = new TranslatorController($lang); //get instance of translator
        $img = new ImageController($lang); //get instance of images
        $question = Question::where('published', 1)
            ->where('lang', $lang)
            ->where('prod_id', $prod_id)
            ->latest()
            ->skip($count)
            ->first();
        if(isset($question)){
            $str = '<div class="question_item"><div class="user_question"><span class="glyphicon glyphicon-user gray_men"></span><span class="user_details">'.$question->name.', '.$question->age.' '.$L->__("years_old").'</span><span class="pull-right q_date">'.$question->created_at->format("M jS, Y").'</span><div class="clearfix"></div><div class="question_title">'.$question->title.'</div><div class="question_text">'.$question->question.'</div></div><hr class="blue"><div class="admin_answer"><div class="pull-left answer_logo">'.$img->__('answer_logo.jpg').'</div><div class="pull-left answer_text">'.$question->answer.'</div><div class="clearfix"></div></div></div>';
            return $str;
        }else{
            return '';
        }
    }

    public function freeSoap($email){
        $res = $this->getOrderTestBuying($email);
        if($res!='no data'){
            $order = unserialize($this->getOrderTestBuying($email));
            $dateTestBuying = $order->updated_at;
            $today = Carbon::today();
            $dif = $today->diffInDays($dateTestBuying);
            //dd($dif);
            if($dif<=23){
                $arr = [];
                $post = [
                    "prod_id" => '1002',
                    "price" => 0,
                    "currency" => "€",
                    "quantity" => "1"
                ];
                $arr[0] = $post;
                session(['cart' => $arr]);
                session(['free_soap' => 1]);
                return redirect()->to('/'.$order->lang.'/cart');
            }else{
                return redirect()->to('/')->with('free_soap_expired','1');
            }
        }else{
            return redirect()->to('/');
        }

    }

    public function getOrderTestBuying($email){
        $post = [
            'email'=>$email
        ];
        $str = http_build_query($post, '', '&');
        $res = $this->api_curl_send(env('ORDERS_URL') . '/getDateTestBuying', $str);
        return $res;
    }

    public function paymentSuccess(Request $request){
        //dd($request->all());
        $orderId = $request->get('ordernumber');
        if($orderId){
            $post = [
                'order_id'=>$orderId,
                'status'=>'success',
            ];
            $str = http_build_query($post, '', '&');
            $res = $this->api_curl_send(env('ORDERS_URL') . '/savePaymentStatus', $str);
        }

        $data = $this->getDataForPaymentResultPages();
        return view('payment_success',$data);
    }

    public function paymentFailed(Request $request){
        //dd($request->all());
        $orderId = $request->get('ordernumber');
        if($orderId){
            $post = [
                'order_id'=>$orderId,
                'status'=>'failed',
            ];
            $str = http_build_query($post, '', '&');
            $res = $this->api_curl_send(env('ORDERS_URL') . '/savePaymentStatus', $str);
        }
        $data = $this->getDataForPaymentResultPages();
        return view('payment_failed',$data);
    }

    public function getDataForPaymentResultPages(){
        $lang = $this->getLangFromBrowser('en');
        $data['L'] = new TranslatorController($lang); //get instance of translator
        $data['img'] = new ImageController($lang); //get instance of images
        /*get all products*/
        $data['products'] = $this->getAllProducts();
        if ($data['products']->isEmpty()) {
            $data['error_products'] = 'No Products created!';
        }else{
            foreach ($data['products'] as $product){
                $product->rate = $this->getRateForProd($product->prod_id, $lang);
            }
        }
        return $data;
    }

    public function getLangFromBrowser($defLang){
        $langs = [
            'es',
            'en',
            'it',
            'fr',
            'de',
            'cz',
            'ru',
            'ua',
        ];
        if (($list = strtolower($_SERVER['HTTP_ACCEPT_LANGUAGE']))) {
            if (preg_match_all('/([a-z]{1,8}(?:-[a-z]{1,8})?)(?:;q=([0-9.]+))?/', $list, $list)) {
                $languages = $list[1];
            }
        } else $languages = array();


        foreach ($languages as $language){
            $language = ($language=='uk')?'ua':$language;
            $language = ($language=='cs')?'cz':$language;
            if(in_array($language,$langs)){
                return $language;
            }
        }
        return $defLang;
    }

    public function paypalPayment(Request $request){
        $raw_post_data = file_get_contents('php://input');
        $raw_post_array = explode('&', $raw_post_data);
        $res = [];
        foreach ($raw_post_array as $key=>$item){
            $a = explode('=',$item);
            $res[$a[0]]=$a[1];
        }
        if(isset($res['item_name'])){
//            $p = new PaymentPaypal();
//            $p->order_id = $res['item_name'];
//            $p->status = $res['payment_status'];
//            $p->data = $raw_post_data;
//            $p->save();
            $post = [
                'order_id'=>$res['item_name'],
                'status'=>$res['payment_status'],
            ];
            $str = http_build_query($post, '', '&');
            $r = $this->api_curl_send(env('ORDERS_URL') . '/savePaymentStatus', $str);
            //dd($r);
        }
    }

    public function getAllProducts(){
        $lang = self::getCurLang();
        $products = Page::where('active', 1)
            ->where('type', 'product')
            ->where('lang', $lang)
            ->get();
        if (count($products)>0){
            foreach ($products as $product){
                $product->price = Dosage::where('lang',$lang)
                    ->where('prod_id', $product->prod_id)
                    ->get();
            }
        }
        return $products;
    }

    public function getRateForProd($id, $lang){
        $reviews = Review::where('lang', $lang)
            ->where('parent_id', $id)
            ->where('published', 1)
            ->get();
        $rate = 5;
        if(!$reviews->isEmpty()){
            foreach ($reviews as $review){
                $rate += $review->rate;
            }
            $rate = $rate/count($rate);
        }
        return $rate;
    }

    public function getBlogArticle($id, $count){
        //sleep(3);
        $page = Page::find($id);
        $lang = self::getCurLang();
        $L = new TranslatorController($lang); //get instance of translator
        $img = new ImageController($lang); //get instance of images
        //category parameters
        $arr_icon = explode('/', $page->real_url);
        $cat_icon = end($arr_icon).'_category_icon'.'.png';

        $articles = Page::where('active', 1)
            ->where('type', 'blog')
            ->where('lang', $lang)
            ->where('parent_id', $id)
            ->latest()
            ->limit(2)
            ->skip($count)
            ->get();
        $str = '';
        if(isset($articles)){
            foreach ($articles as $article){
                //article parameters
                $arr_photo = explode('/', $article->real_url);
                $article->art_photo = end($arr_photo).'_article'.'.jpg';
                $str .= '<div class="col-xs-6">
                        <a href="/'.$lang.'/'.$article->seo_url.'" class="article_link">
                            <div class="article-category__block">
                                <div class="b_article article-category__top-section">
                                    '.$img->__(!empty($article->art_photo)?$article->art_photo:'image_zaglushka.jpg', 'article-category__photo').'
                                    <div class="article-category__icon">
                                        '.$img->__($cat_icon).'
                                    </div>
                                </div>
                                <div class="article-category__title">'.$page->page_name.'</div>
                                <div class="article-category__desc">'.$article->title.'</div>
                                <div class="article-category__date">
                                     '.$L->__($article->id.'_article_date').'
                                </div>
                                <object>
                                    <div class="article-category__btn">
                                        <a href="/'.$lang.'/'.$article->seo_url.'">'.$L->__('Read more').'</a>
                                    </div>
                                </object>
                            </div>
                        </a>
                    </div>';
            }
            return $str;
        }else {
            $str = '';
            return $str;
        }
    }

    public function page_to_page(Request $request){
        $page = Page::where('real_url','/'.$request->get('lang').'/'.$request->get('type').'/'.$request->get('num'))->first();
        if($page){
            return redirect()->route('page',['lang'=>$request->get('lang'),'url'=>$page->seo_url]);
        }else{
            return redirect()->back();
        }
    }


}
