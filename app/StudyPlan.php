<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyPlan extends Model
{
    protected $table = 'study_plans';
    protected $guarded = [];

    public function career()
    {
        return $this->belongsTo('App\Career', 'id_career', 'id');
    }

    public function equipment()
    {
        return $this->hasMany(EquipmentPlanStudy::class, 'id_study_plan', 'id');
    }

    public function softwarePlanStudy()
    {
        return $this->hasMany('App\SoftwarePlanStudy', 'id_study_plan','id');
    }


}
