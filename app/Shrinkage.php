<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shrinkage extends Model
{
    protected $table = 'shrinkages';
    protected $guarded = [];

    public function inventory()
    {
        return $this->belongsTo('App\Inventory', 'id_inventory','id');
    }

    public function typeShrinkage()
    {
        return $this->belongsTo('App\TypeShrinkage', 'id_type_shrinkage','id');
    }
}
