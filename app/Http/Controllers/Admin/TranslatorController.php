<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Translator;
use Illuminate\Http\Request;

class TranslatorController extends Controller
{
    public $lang;
    public $currency;
    public $instance;

    public function __construct($lang, $currency='€')
    {
        $this->lang = $lang;
        $this->currency = $currency;
        if(!$this->instance){
            $this->instance = Translator::where('lang', $this->lang)
                ->orderBy('phrase')
                ->get();
        }
    }

    public function __($phrase){
        foreach ($this->instance as $key=>$value){
            if($value->phrase == $phrase){
                return $value->value;
            }
        }
        $arr = [
            'lang'=>$this->lang,
            'phrase'=>$phrase,
            'value'=>$phrase
        ];
        Translator::create($arr);
        return $phrase;
    }
}
