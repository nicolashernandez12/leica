<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';
    protected $guarded = [];

    public function inventarios()
    {
        return $this->hasMany('App\Inventario', 'cod_estado');
    }

}
