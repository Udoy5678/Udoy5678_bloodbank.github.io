<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hospital_newblood_donor extends Model
{
    //
    protected $fillable = [
        'firstname','lastname', 'username','email','password','gender','birthday','division','district','location','hospital',
    ];
    public function blooddonorsignUp()
    {
        return $this->belongsTo('App\ blooddonorsignUp');
    }
}
