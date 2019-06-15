<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $table = 'maintenances';
    protected $guarded = [];


    public function userData()
    {
        return $this->belongsTo('App\UserData', 'id_user','id');
    }

    public function inventory()
    {
        return $this->belongsTo('App\Inventory', 'id_inventory','id');
    }
}
