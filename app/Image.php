<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'new_name',
        'old_name',
        'alt',
        'lang'
    ];
}
