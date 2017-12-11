<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosage extends Model
{
    protected $fillable = [
        'lang',
        'prod_id',
        'affProdId',
        'dosage',
        'amount',
        'price'
    ];
}
