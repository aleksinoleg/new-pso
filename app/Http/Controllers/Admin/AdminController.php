<?php

namespace App\Http\Controllers\Admin;

use App\Attribute;
use App\Dosage;
use App\Http\Controllers\DataController;
use App\Image;
use App\Language;
use App\Page;
use App\Question;
use App\Redirect;
use App\RelatedProducts;
use App\Review;
use App\Translator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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

    /**
     *  GET REQUESTS
     */
    public function index($method, $lang, $id = 0, $type=null)
    {
        $data['languages_all'] = Language::all();
        $data['languages'] = $data['languages_all']->where('active', 1)->all();
        $data['default_language'] = env('DEFAULT_LANG');
        $data['pages'] = Page::where('lang', $lang)->get();
        $data['reviews'] = Review::where('lang', $lang)->get();
        $data['lang'] = $lang;
        $data['L'] = new TranslatorController($lang, $data['languages_all']->where('lang_id',$lang)->first()->currency);
        $data['img'] = new ImageController($lang);
        $data['type'] = $type;
        if($id!=0){
            if($method=='delete'){
                if($type=='translator'){
                    Translator::find($id)->delete();
                    return redirect()->route('admin',['method'=>'translator','lang'=>$lang]);
                }
                if($type=='image'){
                    $item = Image::find($id);
                    if(file_exists('./img/' . $lang . '/' . $item->new_name)){
                        unlink('./img/' . $lang . '/' . $item->new_name);
                    }
                    $item->delete();
                    return redirect()->back();
                }
            }
            $data['page'] = $data['pages']->where('id',$id)->first();
        }

        if ($type == 'product') {
            $data['categories'] = $this->getCategories($lang);
            if ($data['categories']->isEmpty()) {
                $data['error_categories'] = 'Create Category first!';
            }
            if(isset($data['page'])){
                $data['page']->dosages = Dosage::where('prod_id', $data['page']->prod_id)
                    ->where('lang', $data['page']->lang)
                    ->get();

                $data['page']->attributes = Attribute::where('prod_id', $data['page']->prod_id)
                    ->where('lang', $data['page']->lang)
                    ->get();
            }

        }

        if ($type == 'review' || $type == 'blog') {
            $data['products'] = $this->getAllProductsRev($lang);
            if ($data['products']->isEmpty()) {
                $data['error_products'] = 'Create Product first!';
            }
        }

        if ($type == 'blog') {
            $data['blog_categories'] = $this->getBlogCategories($lang);
        }
        if ($type == 'question') {
            $data['question'] = Question::find($id);
        }

        if ($type == 'review_item'&&$id!=0) {
           $data['review'] = Review::find($id);
        }

        $data['images'] = [];

        $path = './images/lang/' . $lang . '/' . $type;
        if (is_dir($path)) {
            $images = scandir($path);
            foreach ($images as $image) {
                if ($image !== '.' && $image !== '..') {
                    $data['images'][] = $path . '/' . $image;
                }
            }
        };

        $data['questions'] = Question::with(['product'=>function($query) use ($lang){
            $query->where('lang',$lang);
        }])
        ->where('lang', $lang)->get();



        return view('admin.' . $method, $data);
    }

    public function dell_translator($id)
    {
        $item = Translator::find($id);
        $item->delete();
        return redirect()->back();
    }

    public function getCategories($lang){
        $categories = Page::where('active', 1)
            ->where('type', 'category')
            ->where('lang', $lang)
            ->get();
        return $categories;
    }

    public function getAllProductsRev($lang){
        $products = Page::where('active', 1)
            ->where('type', 'product')
            ->where('lang', $lang)
            ->get();
        return $products;
    }

    public function getBlogCategories($lang){
        $arr = Page::where('active', 1)
            ->where('type', 'b_cat')
            ->where('lang', $lang)
            ->get();
        return $arr;
    }

    public static function returnRedirects($lang, $old)
    {
        $redirect = Redirect::where('lang', $lang)
            ->where('old_url', $old)
            ->first();
        if (isset($redirect)) {
            header('HTTP/1.1 ' . $redirect->status . ' Moved Permanently');
            header('Location: ' . $redirect->new_url);
            exit();
        } else {
            return false;
        }

    }


    /**
     *  POST REQUESTS
     */
    public function post(Request $request, $action, $target, $lang)
    {
        $method = $action . '_' . $target;
        $this->$method($request, $lang);

        if($action=='add'
            ||$action=='create'
            ||$action=='dellToAdmin'
        ){
            return redirect()->route('admin',['method'=>'index','lang'=>$lang]);
        }
        return redirect()->back();
    }

    public function edit_allPages(Request $request, $lang)
    {
        $pages = Page::where('lang', $lang)->get();
        $reviews = Review::where('lang', $lang)->get();
        $post = $request->all();

        foreach ($post['seo_url'] as $id => $seo_url) {
            $page = $pages->where('id', $id)->first();
            if ($page->seo_url != $seo_url) {
                if (env('REDIRECTS') == true) {
                    $lang_pref = '/'.$lang.'/';
                    Redirect::create(['lang' => $lang, 'old_url' => $lang_pref . $page->seo_url, 'new_url' => $lang_pref . $seo_url, 'status' => 301]);
                    Redirect::where('old_url', '/' . $seo_url)->get()->each(function ($item, $key) {
                        $item->delete();
                    });
                }
                $page->seo_url = $seo_url;
                $page->save();
            }
            if (isset($post['active'][$id])) {
                if ($page->active == 0) {
                    $page->active = 1;
                    $page->save();
                }
            } else {
                if ($page->active == 1) {
                    $page->active = 0;
                    $page->save();
                }
            }

        }

        foreach ($reviews as $review) {
            $review->published = (isset($post['rev_publish'][$review->id])) ? "1" : '0';
            $review->save();
        }
    }

    public function update_languages(Request $request, $lang)
    {
        $post = $request->all();
        $languages = Language::all();
        foreach ($post['lang_name'] as $key => $item) {
            $lang = $languages->where('id', $key)->first();
            $lang->lang_name = $post['lang_name'][$key];
            $lang->lang_id = $post['lang_id'][$key];
            $lang->currency = $post['currency'][$key];
            $lang->active = (isset($post['active'][$key])) ? 1 : 0;
            $lang->save();
        }
        $def_lang = $languages->where('lang_id', env('DEFAULT_LANG'))->first();
        $def_lang->active = 1;
        $def_lang->save();
    }

    public function add_language(Request $request, $lang)
    {
        $post = $request->all();
        if (!isset($post['active'])) {
            $post['active'] = 0;
        }
        Language::create($post);
        $this->initDB(env('DEFAULT_LANG'), $post['lang_id']);
    }

    public function initDB($fromLang, $resultLang)
    {
        $db = Page::where('lang', $fromLang)->get();
        if ($db->isEmpty()) {
            return false;
        } else {
            $n = 1;
            foreach ($db as $item) {
                if ($item->type == 'category') {
                    $page = new Page();
                    $page->lang = $resultLang;
                    $page->active = 0;
                    $page->real_url = '/' . $resultLang . '/' . substr($item->real_url, 4);
                    $page->seo_url = $item->type . '-' . $n;
                    $page->type = $item->type;
                    $page->page_name = $item->page_name;
                    $page->link_name = $item->page_name;
                    $page->title = 'create title';
                    $page->meta_title = 'create meta title';
                    $page->meta_key = 'create meta key';
                    $page->meta_desc = 'create meta description';
                    $page->short_desc = '';
                    $page->long_desc = '';
                    $page->prod_id = $item->prod_id;

                    if ($item->category_id != 0) {
                        $category_proto = Page::find($item->category_id);
                        $category_end = Page::where('page_name', $category_proto->page_name)
                            ->where('lang', $resultLang)
                            ->where('type', 'category')
                            ->first();
                        if ($category_end) {
                            $page->category_id = $category_end->id;
                        }
                    }
                    if ($item->parent_id != 0) {
                        $prod_proto = Page::find($item->parent_id);
                        $prod_end = Page::where('page_name', $prod_proto->page_name)
                            ->where('lang', $resultLang)
                            ->where('type', 'product')
                            ->first();
                        if ($prod_end) {
                            $page->parent_id = $prod_end->id;
                        }
                    }
                    $page->save();
                }
                $n++;
            }
            $n = 1;
            foreach ($db as $item) {
                if ($item->type != 'category') {
                    $page = new Page();
                    $page->lang = $resultLang;
                    $page->active = 0;
                    $page->real_url = '/' . $resultLang . '/' . substr($item->real_url, 4);
                    $page->seo_url = $item->type . '-' . $n;
                    $page->type = $item->type;
                    $page->page_name = $item->page_name;
                    $page->link_name = $item->page_name;
                    $page->title = 'create title';
                    $page->meta_title = 'create meta title';
                    $page->meta_key = 'create meta key';
                    $page->meta_desc = 'create meta description';
                    $page->short_desc = '';
                    $page->long_desc = '';
                    $page->prod_id = $item->prod_id;

                    if ($item->category_id != 0) {
                        $category_proto = Page::find($item->category_id);
                        $category_end = Page::where('page_name', $category_proto->page_name)
                            ->where('lang', $resultLang)
                            ->where('type', 'category')
                            ->first();
                        if ($category_end) {
                            $page->category_id = $category_end->id;
                        }
                    }
                    if ($item->parent_id != 0) {
                        $prod_proto = Page::find($item->parent_id);
                        $prod_end = Page::where('page_name', $prod_proto->page_name)
                            ->where('lang', $resultLang)
                            ->where('type', 'product')
                            ->first();
                        if ($prod_end) {
                            $page->parent_id = $prod_end->id;
                        }
                    }
                    $page->save();
                }
                $n++;
            }
            $dosages = Dosage::where('lang', $fromLang)->get();
            if ($dosages->isEmpty()) {
                return false;
            } else {
                foreach ($dosages as $dosage) {
                    $newDosage = new Dosage();
                    $newDosage->lang = $resultLang;
                    $newDosage->prod_id = $dosage->prod_id;

                    $newDosage->dosage = $dosage->dosage;
                    $newDosage->amount = $dosage->amount;
                    $newDosage->price = $dosage->price;
                    $newDosage->save();
                }
            }
            return true;
        }
    }

    public function update_translator(Request $request, $lang)
    {
        $translatorInstance = new TranslatorController($lang);
        $post = $request->all();
        unset($post['_token']);
        foreach ($translatorInstance->instance as $key => $item) {
            if(isset($post['value'][$item->id])){
                if ($item->value != $post['value'][$item->id]) {
                    $item->value = $post['value'][$item->id];
                    $item->save();
                }
            }
        }

    }

    public function create_page(Request $request, $lang){
        $post = $request->all();
        $type = $post['type'];
        if(!isset($post['active'])){
            $post['active'] = 0;
        }

        $filename = "./txtdocs/".$type.".txt";

        $handle = fopen($filename, "r");
        $contents = fread($handle, filesize($filename));
        fclose($handle);

        $handle = fopen($filename, "w");
        fwrite($handle, $contents+1);
        fclose($handle);

        unset($post['_token']);
        $post['real_url'] = '/'.$lang.'/'.$type.'/'.$contents;

        if(isset($post['its_blog_cat'])){
            $post['type'] = 'b_cat';
            $post['parent_id'] = null;
        }

        Page::create($post);

        if (isset($post['price'])){
            foreach ($post['price'] as $key=>$price){
                $arr = [
                    'lang'=>$lang,
                    'prod_id'=>$post['prod_id'],
                    'dosage'=>$post['dosage'][$key],
                    'amount'=>$post['amount'][$key],
                    'price'=>$price
                ];
                Dosage::create($arr);
            }
        }

        if (isset($post['name'])){
            foreach ($post['name'] as $key=>$name){
                $arr = [
                    'lang'=>$lang,
                    'prod_id'=>$post['prod_id'],
                    'name'=>$name,
                    'value'=>$post['value'][$key]
                ];
                Attribute::create($arr);
            }
        }


        $languages = Language::all();

        foreach ($languages as $language){
            if($language->lang_id != $lang){
                $post['lang'] = $language->lang_id;
                $post['active'] = 0;
                $real_url = $post['real_url'];
                $post['real_url'] = '/'.$language->lang_id.'/'.substr($real_url,4);
                $post['seo_url'] = $language->lang_id.'/'.substr($real_url,4);
                $post['link_name'] = 'create link name';
                $post['title'] = 'create title';
                $post['meta_title'] = 'create meta title';
                $post['meta_key'] = 'create meta key';
                $post['meta_desc'] = 'create meta description';
                $post['short_desc'] = '';
                $post['long_desc'] = '';
                if(isset($post['category_id'])){
                    $category_proto = Page::find($post['category_id']);
                    $category_end = Page::where('page_name', $category_proto->page_name)
                        ->where('lang', $language->lang_id)
                        ->where('type', 'category')
                        ->first();
                    if($category_end){
                        $post['category_id'] = $category_end->id;
                    }
                }
                if(isset($post['parent_id'])){
                    $prod_proto = Page::find($post['parent_id']);
                    $prod_end = Page::where('page_name', $prod_proto->page_name)
                        ->where('lang', $language->lang_id)
                        ->first();
                    if($prod_end){
                        $post['parent_id'] = $prod_end->id;
                    }
                }
                Page::create($post);
            }

        }
    }

    public function translit($text) {
        $trans = array(
            "а" => "a",
            "б" => "b",
            "в" => "v",
            "г" => "g",
            "д" => "d",
            "е" => "e",
            "ё" => "e",
            "ж" => "zh",
            "з" => "z",
            "и" => "i",
            "й" => "y",
            "к" => "k",
            "л" => "l",
            "м" => "m",
            "н" => "n",
            "о" => "o",
            "п" => "p",
            "р" => "r",
            "с" => "s",
            "т" => "t",
            "у" => "u",
            "ф" => "f",
            "х" => "kh",
            "ц" => "ts",
            "ч" => "ch",
            "ш" => "sh",
            "щ" => "shch",
            "ы" => "y",
            "э" => "e",
            "ю" => "yu",
            "я" => "ya",
            "А" => "A",
            "Б" => "B",
            "В" => "V",
            "Г" => "G",
            "Д" => "D",
            "Е" => "E",
            "Ё" => "E",
            "Ж" => "Zh",
            "З" => "Z",
            "И" => "I",
            "Й" => "Y",
            "К" => "K",
            "Л" => "L",
            "М" => "M",
            "Н" => "N",
            "О" => "O",
            "П" => "P",
            "Р" => "R",
            "С" => "S",
            "Т" => "T",
            "У" => "U",
            "Ф" => "F",
            "Х" => "Kh",
            "Ц" => "Ts",
            "Ч" => "Ch",
            "Ш" => "Sh",
            "Щ" => "Shch",
            "Ы" => "Y",
            "Э" => "E",
            "Ю" => "Yu",
            "Я" => "Ya",
            "ь" => "",
            "Ь" => "",
            "ъ" => "",
            "Ъ" => "",
            "і" => "i",
            "І" => "I",
        );
        if(preg_match("/[а-яА-Яa-zA-Z\.]/", $text)) {
            return strtr($text, $trans);
        }
        else {
            return $text;
        }

    }

    public function save_image(Request $request, $lang){
        $type = $request->get('type');
        $file = $_FILES['articleImage']['tmp_name'];
        $path = "./images/lang/".$lang."/".$type;
        $baseName = $this->translit(basename($_FILES['articleImage']['name']));

        if(!is_dir($path)){
            mkdir($path, 0777, true);
        }
        $n = 1;
        while(file_exists($path.'/'.$baseName)){
            if($n == 1){
                $baseName = substr($baseName,0, -4).'_'.$n.substr($baseName, strlen($baseName)-4);
            }else{
                $baseName = substr($baseName,0, -6).'_'.$n.substr($baseName, strlen($baseName)-4);
            }
            $n++;
        }

        copy($file,$path.'/'.$baseName);
    }

    public function dell_image(Request $request, $lang){
        $type = $request->get('type');
        $key = $request->get('key');
        $images = scandir('./images/lang/'.$lang.'/'.$type);
        unlink('./images/lang/'.$lang.'/'.$type.'/'.$images[$key+2]);
    }

    public function edit_page(Request $request, $lang){
        $post = $request->all();

        if(!isset($post['active'])){
            $post['active'] = 0;
        }
        if (isset($post['prod_id'])){
            $dosages = Dosage::where('prod_id', $post['prod_id'])
                ->where('lang', session('lang'))
                ->get();
            if (!$dosages->isEmpty())
                foreach ($dosages as $dosage){
                    $dosage->delete();
                }
        }
        if (isset($post['price'])){
            Dosage::where('lang',$lang)
                ->where('prod_id', $post['prod_id'])
                ->get()->each(function ($item,$key){
                    $item->delete();
                });
            foreach ($post['price'] as $key=>$price){
                $arr = [
                    'lang'=>$lang,
                    'prod_id'=>$post['prod_id'],
                    'dosage'=>$post['dosage'][$key],
                    'amount'=>$post['amount'][$key],
                    'price'=>$price
                ];
                Dosage::create($arr);
            }
        }
        if (isset($post['prod_id'])){
            $attributes = Attribute::where('prod_id', $post['prod_id'])
                ->where('lang', session('lang'))
                ->get();
            if (!$attributes->isEmpty())
                foreach ($attributes as $attribute){
                    $attribute->delete();
                }

            if (isset($post['value'])){
                foreach ($post['value'] as $key=>$value){
                    $arr = [
                        'lang'=>$lang,
                        'prod_id'=>$post['prod_id'],
                        'name'=>$post['name'][$key],
                        'value'=>$value
                    ];
                    Attribute::create($arr);
                }
            }

            if(isset($post['related_prod'])){
                RelatedProducts::where('prod_id_1',$post['prod_id'])
                    ->get()->each(function($item, $key){
                    $item->delete();
                });
                foreach ($post['related_prod'] as $item){
                    $r = new RelatedProducts();
                    $r->prod_id_1 = $post['prod_id'];
                    $r->prod_id_2 = $item;
                    $r->save();
                }
            }
        }



        $oldPage = Page::find($post['id']);
        if($oldPage->seo_url!=$post['seo_url']){
            $lang_pref = '/'.$lang.'/';
            if (env('REDIRECTS') == true) {
                Redirect::create(['lang' => $lang, 'old_url'=>$lang_pref.$oldPage->seo_url, 'new_url'=>$lang_pref.$post['seo_url'], 'status'=>301]);
                Redirect::where('old_url', $lang_pref.$post['seo_url'])->get()->each(function ($item, $key) {
                    $item->delete();
                });
            }
        }

        unset($post['_token']);
        unset($post['dosage']);
        unset($post['amount']);
        unset($post['price']);
        unset($post['name']);
        unset($post['value']);
        unset($post['related_prod']);

        DB::table('pages')
            ->where('id', $post['id'])
            ->update($post);
    }

    public function edit_review(Request $request, $lang){
        $post = $request->all();
        $review = Review::find($post['id']);
        $post['published'] = (isset($post['published']))?$post['published']:0;
        unset($post['_token']);
        $review->update($post);
    }

    public function dellToAdmin_review(Request $request, $lang){
        Review::find($request->get('id'))->delete();
    }

    public function dellToAdmin_question(Request $request, $lang){
        Question::find($request->get('id'))->delete();
    }

    public function answer_question(Request $request, $lang){
        $id = $request->get('id');
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
    }

    public function update_image(Request $request, $lang){
        $post = $request->all();
        $imageInstance = new ImageController($lang);
        $item = $imageInstance->instance[$post['key']];
        unset($post['_token']);
        if ($item->new_name != $post['new_name'][$item->id] || $item->alt !== $post['alt'][$item->id]) {
            if(file_exists('./img/' . $lang . '/' . $item->new_name)){
                rename('./img/' . $lang . '/' . $item->new_name, './img/' . $lang . '/' . $post['new_name'][$item->id] . $post['ext'][$item->id]);
                $item->new_name = $post['new_name'][$item->id] . $post['ext'][$item->id];
                $item->alt = $post['alt'][$item->id];
                $item->save();
            }
        }
    }

}
