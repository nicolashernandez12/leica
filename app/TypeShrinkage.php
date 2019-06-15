<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeShrinkage extends Model
{
    protected $table = 'type_shrinkages';
    protected $guarded = [];

    public function inventory()
    {
        return $this->hasMany('App\Shrinkage', 'id_type_shrinkage','id');
    }
}
