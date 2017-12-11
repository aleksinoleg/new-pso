<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalStoreEmail extends Model
{
    protected $table = 'local_store_emails';
    protected $fillable = [
        'country',
        'city',
        'email'
    ];
    
}
