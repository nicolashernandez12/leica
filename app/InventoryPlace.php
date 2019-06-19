<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryPlace extends Model
{
    protected $fillable = ['id_place', 'name_active[]','quantity'];
}
