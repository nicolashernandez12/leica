<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaceSoftware extends Model
{
    protected $table = 'place_software';
    protected $guarded = [];

    public function place()
    {
        return $this->belongsTo('App\Place', 'id_place','id');
    }


    public function software()
    {
        return $this->belongsTo('App\Software', 'id_software','id');
    }
}
