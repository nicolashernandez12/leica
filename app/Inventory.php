<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventories';
    protected $guarded = [];


    // Foraneas
    public function activeInput()
    {
        return $this->belongsTo('App\ActiveInput', 'id_active_input','id');
    }
    
    public function state()
    {
        return $this->belongsTo('App\State', 'id_state','id');
    }

    public function place()
    {
        return $this->belongsTo('App\Place', 'id_place','id');
    }

    //primaria
    public function loanRegistration()
    {
        return $this->hasMany('App\LoanRegistration', 'id_inventory','id');
    }

    public function shrinkage()
    {
        return $this->hasMany('App\Shrinkage', 'id_inventory','id');
    }

    public function differenceInventory()
    {
        return $this->hasMany('App\DifferenceInventory', 'id_inventory','id');
    }

    public function maintenance()
    {
        return $this->hasMany('App\Maintenance', 'id_inventory','id');
    }

}
