<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserUpload extends Model
{
    protected $fillable = [
        'user','name','description','category','image'
    ];
}
