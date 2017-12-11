<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalStore extends Model
{
    protected $table = 'local_stores';
    protected $fillable = [
        'country',
        'city',
        'value'
    ];
}
