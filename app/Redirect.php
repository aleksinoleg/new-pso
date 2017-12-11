<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Redirect extends Model
{
    protected $fillable = [
        'lang',
        'old_url',
        'new_url',
        'status'
    ];
}
