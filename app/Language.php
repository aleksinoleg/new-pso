<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'lang_id',
        'lang_name',
        'currency',
        'active'
    ];
}
