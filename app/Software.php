<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    protected $table = 'software';
    protected $guarded = [];

    public function softwareType()
    {
        return $this->belongsTo('App\SoftwareType', 'id_software_type','id');
    }


    public function softwarePlanStudy()
    {
        return $this->hasMany('App\SoftwarePlanStudy', 'id_software','id');
    }

    public function placeSoftware()
    {
        return $this->hasMany('App\PlaceSoftware', 'id_software','id');
    }

}
