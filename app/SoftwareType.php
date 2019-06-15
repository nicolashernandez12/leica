<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoftwareType extends Model
{
    protected $table = 'software_types';
    protected $guarded = [];

    public function inventory()
    {
        return $this->hasMany('App\Software', 'id_software_type','id');
    }
}
