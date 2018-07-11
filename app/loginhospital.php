<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loginhospital extends Model
{
    //
    protected $fillable = [
        'name', 'password', 'email',
    ];
}
