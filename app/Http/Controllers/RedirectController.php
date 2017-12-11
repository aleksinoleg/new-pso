<?php

namespace App\Http\Controllers;

use App\Redirect;
use Illuminate\Http\Request;

use App\Http\Requests;

class RedirectController extends Controller
{
    public static function createRedirect($lang, $old_url, $new_url, $status){
        $arr = [
            'lang'=>$lang,
            'old_url'=>$old_url,
            'new_url'=>$new_url,
            'status'=>$status,
        ];
        Redirect::create($arr);
    }
    public static function returnRedirects($lang, $old){
        $redirect = Redirect::where('lang', $lang)
            ->where('old_url', $old)
            ->first();
        if (isset($redirect)){
            header('HTTP/1.1 '.$redirect->status.' Moved Permanently');
            header('Location: '.$redirect->new_url);
            exit();
        }else{
            return false;
        }

    }
}
