<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'published',
        'lang',
        'prod_id',
        'name',
        'email',
        'title',
        'age',
        'question',
        'answer',
    ];

    public function product(){
        return $this->belongsTo('App\Page','prod_id', 'prod_id');
    }
}
