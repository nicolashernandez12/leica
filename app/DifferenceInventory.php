<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DifferenceInventory extends Model
{
    protected $table = 'difference_inventories';
    protected $guarded = [];

    public function inventory()
    {
        return $this->belongsTo('App\Inventory', 'id_inventory','id');
    }

    public function inventoryProcess()
    {
        return $this->belongsTo('App\InventoryProcess', 'id_inventory_process','id');
    }
}
