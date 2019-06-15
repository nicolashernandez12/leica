<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaintenancePlan extends Model
{
    protected $table = 'maintenance_plans';
    protected $guarded = [];

    public function priority()
    {
        return $this->belongsTo('App\Priority', 'id_priority','id');
    }

    public function frequency()
    {
        return $this->belongsTo('App\Frequency', 'id_frequency','id');
    }

    public function activeInput()
    {
        return $this->hasMany('App\ActiveInput', 'id_maintenance_plan','id');
    }

}
