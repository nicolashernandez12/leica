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
        return $this->hasOne(EquipmentPlanStudy::class, 'id_study_plan', 'id');
    }

    public function actives()
    {
        return $this->belongsToMany(ActiveInput::class, 'actives_by_study_plans');
    }

    public function softwares()
    {
        return $this->belongsToMany(Software::class, 'software_by_study_plans');
    }


}
