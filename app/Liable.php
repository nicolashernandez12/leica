<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liable extends Model
{
    protected $table = 'liables';
    protected $guarded = [];

    public function lending()
    {
        return $this->hasMany('App\Lending', 'id_liable','id');
    }

    public function user()
    {
        return $this->hasMany('App\User', 'id_liable','id');
    }

    public function position()
    {
        return $this->belongsTo('App\Position', 'id_position','id');
    }
}
