<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public $lang;

    public $instance;

    public function __construct($lang)
    {
        $this->lang = $lang;
        if(!$this->instance){
            $this->instance = Image::where('lang', $this->lang)
                ->orderBy('old_name')
                ->get();
        }
    }

    public function __($phrase, $class = '', $addCode = ''){

        foreach ($this->instance as $key=>$value){
            if($value->old_name == $phrase){
                return '<img class="'.$class.'" src="/img/'.$this->lang.'/'.$value->new_name.'" alt="'.$value->alt.'" '.$addCode.'>';
            }
        }
        $arr = [
            'lang'=>$this->lang,
            'old_name'=>$phrase,
            'new_name'=>$phrase,
            'alt'=>substr($phrase, 0 ,-4)
        ];
        $check = Image::where('lang', $this->lang)
            ->where('old_name', $phrase)
            ->first();
        if(!isset($check)){
            Image::create($arr);
        }
        return '<img class="'.$class.'" src="/img/'.$this->lang.'/'.$arr['new_name'].'" alt="'.$arr['alt'].'" '.$addCode.'>';
    }
}
