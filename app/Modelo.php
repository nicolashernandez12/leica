<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table = 'modelos';
    protected $guarded = [];

    public function trademark()
    {
        return $this->belongsTo('App\Trademark', 'id_trademark','id');
    }

    public function activeInput()
    {
        return $this->hasMany('App\ActiveInput', 'id_model','id');
    }
}
