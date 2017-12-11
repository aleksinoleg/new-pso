<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'lang',
        'active',
        'real_url',
        'seo_url',
        'type',
        'page_name',
        'link_name',
        'title',
        'meta_title',
        'meta_key',
        'meta_desc',
        'short_desc',
        'long_desc',
        'category_id',
        'parent_id',
        'prod_id',
    ];



    public function prices()
    {
        return $this->hasMany('App\Dosage', 'prod_id', 'prod_id')->where('lang',$this->lang);
    }

    public function relatedProds($prod_id, $lang)
    {
        $arr = [];
        $related_prod_ids = RelatedProducts::where('prod_id_1', $prod_id)->get();
        if ($related_prod_ids->isNotEmpty()) {
            foreach ($related_prod_ids as $item) {
                $arr[] = Page::where('lang',$lang)
                    ->where('active',1)
                    ->where('prod_id', $item->prod_id_2)
                    ->first();
           }
        }
        $arr = collect($arr);
        return $arr;
    }
    public function relatedTo($prod_id, $lang)
    {
        $arr = [];
        $related_prod_ids = RelatedProducts::where('prod_id_2', $prod_id)->get();
        if ($related_prod_ids->isNotEmpty()) {
            foreach ($related_prod_ids as $item) {
                $arr[] = Page::where('lang',$lang)
                    ->where('active',1)
                    ->where('prod_id', $item->prod_id_1)
                    ->first();
            }
        }
        $arr = collect($arr);
        return $arr;
    }

    public function getRelatedProds($prod_id, $lang)
    {
        return $this->relatedProds($prod_id, $lang);
//        return $this->relatedProds($prod_id, $lang)->merge($this->relatedTo($prod_id, $lang));
    }

    public function reviews(){
        return $this->hasMany('App\Review','parent_id')->where('lang',$this->lang)->where('published',1)->latest();
    }

    public function questions(){
        return $this->hasMany('App\Question','prod_id','prod_id')->where('lang',$this->lang)->where('published',1)->latest();
    }


}
