<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActiveInput extends Model
{
    protected $table = 'active_inputs';
    protected $guarded = [];


    public function inventory()
    {
        return $this->hasMany('App\Inventory', 'id_active_input','id');
    }

    public function model()
    {
        return $this->belongsTo('App\Modelo', 'id_model','id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'id_category','id');
    }

    public function maintenancePlan()
    {
        return $this->belongsTo('App\MaintenancePlan', 'id_maintenance_plan','id');
    }
}
