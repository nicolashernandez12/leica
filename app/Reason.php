<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reason extends Model
{
    protected $table = 'reasons';
    protected $guarded = [];

    public function maintenancePlan()
    {
        return $this->hasMany('App\MaintenancePlan', 'id_reason','id');
    }
}
