<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryProcess extends Model
{
    protected $table = 'inventory_processes';
    protected $guarded = [];

    public function differenceInventory()
    {
        return $this->hasMany('App\DifferenceInventory', 'id_inventory_process','id');
    }

    public function typeInventory()
    {
        return $this->belongsTo('App\TypeInventory', 'id_type_inventory','id');
    }
}
