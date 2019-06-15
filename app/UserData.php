<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $table = 'users';
    protected $guarded = [];

    public function lending()
    {
        return $this->hasMany('App\Lending', 'id_user','id');
    }

    public function maintenance()
    {
        return $this->hasMany('App\Maintenance', 'id_user','id');
    }
    
    public function liable()
    {
        return $this->belongsTo('App\Liable', 'id_liable','id');
    }

}
