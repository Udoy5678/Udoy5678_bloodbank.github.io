<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bloodlocation extends Model
{
    //
    protected $fillable = [
        'district_id', 'name', 'bn_name','lat','lon',
    ];
    public function blooddonorsignup()
    {

        return $this->hasMany('App\blooddonorsignUp');
    }

}
