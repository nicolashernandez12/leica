<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    protected $table = 'software';
    protected $guarded = [];

    public function softwareType()
    {
        return $this->belongsTo('App\SoftwareType', 'id_software_type','id');
    }

    public function inventory()
    {
        return $this->belongsTo('App\Inventory', 'id_inventory','id');
    }

}
