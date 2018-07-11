<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hospital extends Model
{
    //
    protected $fillable = [
        'location_id', 'hospital_name', 'lat','lon',
    ];
}
