<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeInventory extends Model
{
    protected $table = 'type_inventories';
    protected $guarded = [];

    public function inventory()
    {
        return $this->hasMany('App\InventoryProcess', 'id_type_inventory','id');
    }
}
