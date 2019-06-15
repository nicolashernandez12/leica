<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';
    protected $guarded = [];

    public function inventory()
    {
        return $this->hasMany('App\Inventario', 'id_state','id');
    }
}
