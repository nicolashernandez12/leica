<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'positions';
    protected $guarded = [];

    public function inventory()
    {
        return $this->hasMany('App\Liable', 'id_position','id');
    }
}
