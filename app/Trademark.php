<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trademark extends Model
{
    protected $table = 'trademarks';
    protected $guarded = [];

    public function modelo()
    {
        return $this->hasMany('App\Modelo', 'id_trademark','id');
    }
}
