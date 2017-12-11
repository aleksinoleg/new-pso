<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = [
        'lang',
        'prod_id',
        'name',
        'value',
    ];
}
