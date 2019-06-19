<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'places';
    protected $guarded = [];

    public function inventory()
    {
        return $this->hasMany('App\Inventory', 'id_place','id');
    }

    public function placeSoftware()
    {
        return $this->hasMany('App\PlaceSoftware', 'id_place','id');
    }
}

