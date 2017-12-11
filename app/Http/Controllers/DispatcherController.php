<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\TranslatorController;
use App\Language;
use App\Page;
use App\Product_category;
use App\Setting;
use App\Url;
use Illuminate\Http\Request;

class DispatcherController extends Controller
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

    public function index($lang = 'not_specified', $url = '/', Request $request){
        $langs = [
            '/de/',
            '/en/',
            '/es/',
            '/fr/',
            '/it/',
            '/cz/',
            '/ru/',
            '/ua/',
            '/he/',
        ];
        $path = $_SERVER['REQUEST_URI'];

        if(!in_array($path, $langs)&& $path!='/'){
            if(substr($path,-1)=='/'){
//                header('HTTP/1.1 301 Moved Permanently');
//                header('Location: '.substr($path, 0,-1));
//                exit();
            }
        }


        /**
         * service fot parent
         */
        $site_exceptions = [
            'www.psoeasy.com',
            'cialisoriginal.de',
            'cialis-tadalafil.de',
            'kamagrapreis.de',
            'levitraoriginal.de',
            'levitra-preis.de',
            'sildenafil-citrate.de',
            'sildenafil-kaufen.de',
            'viagrafurdiefrau.de',
            'krankheits-symptome.net',
            'new-pso.dev',
        ];

        $parent_site = (isset($_SERVER['HTTP_REFERER']))?$_SERVER['HTTP_REFERER']:'//';
        $parent_site = explode('/',$parent_site);
        if(!in_array( $parent_site[2], $site_exceptions)){
            session(['parent_site'=>$parent_site]);
        }else{
            if(!session()->has('parent_site')){
                session(['parent_site'=>['','','']]);
            }
        }
        //dd(session('parent_site'));

        if(isset($_GET['subject'])){
            $array = [
                'subject'=>$_GET['subject'],
                'url'=>url()->current(),
                'link'=>$_GET['link']
            ];

            $str = http_build_query($array, '', '&');
            $res = $this->api_curl_send(env('ORDERS_URL').'/save_click_from_email', $str);
            session(['emailClick'=>$res]);

        }



        /**
         * GET default language
         */
         $data['default_lang'] = env('DEFAULT_LANG');
        /**
         * Set default language as lang if lang is not set
         */
        if($lang==='not_specified'){
            $lang = $data['default_lang'];
        }

        /**
         * Check if lang is correct
         */
        $checkLang = Language::where('lang_id', $lang)->first();
        if(!$checkLang){
            abort('404');
        }

        /**
         * Get page instance
         */
        $data['pages'] = Page::where('lang', $lang)
            ->where('active', 1)
            ->get();
        $data['page'] = $data['pages']->where('seo_url', $url)->first();
        if(!$data['page']){
            abort('404');/*404 page not found*/
        }
        $realUrl = explode('/',$data['page']->real_url);

        /**
         * Get img and L
         */
        $data['img'] = new ImageController($lang);
        $data['L'] = new TranslatorController($lang, $checkLang->currency);
        $data['url'] = $url;

        /**
         * Return view
         */
        if(is_file('../resources/views/types/'.$realUrl[2].'/'.$realUrl[3].'.blade.php')){
            $view = 'types.'.$data['page']->type.'.'.$realUrl[3];
        }else{
            $view = 'types.'.$data['page']->type.'.index';
        }


        return view($view, $data);
    }


}
