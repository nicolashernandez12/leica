<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frequency extends Model
{
    protected $table = 'frequencies';
    protected $guarded = [];

    public function maintenancePlan()
    {
        return $this->hasMany('App\MaintenancePlan', 'id_frequency','id');
    }
}
