<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blooddistrict extends Model
{
    //
    protected $fillable = [
        'division_id', 'name', 'bn_name','lat','lon',
    ];
}
