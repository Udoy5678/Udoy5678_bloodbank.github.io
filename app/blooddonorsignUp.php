<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blooddonorsignUp extends Model
{
    //
    protected $fillable = [
        'firstname','lastname', 'username','email','password','gender','birthday','division','district','location','hospital','phonenum',
    ];
/*
    public function bloodlocation()
{
    return $this->belongsTo('App\bloodlocation');
}

public function hospital_newblood_donor()
{
    return $this->hasMany('App\hospital_newblood_donor');
}
*/
}
