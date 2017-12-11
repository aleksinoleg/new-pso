<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'parent_id',
        'lang',
        'title',
        'name',
        'rate',
        'comment',
        'age',
        'gender',
        'published',
        'created_at',
    ];
}
