<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    protected $table = 'priorities';
    protected $guarded = [];

    public function maintenancePlan()
    {
        return $this->hasMany('App\MaintenancePlan', 'id_priority','id');
    }
}
