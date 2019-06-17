<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = [];

    public function activeInput()
    {
        return $this->hasMany('App\ActiveInput', 'id_category','id');
    }
}
