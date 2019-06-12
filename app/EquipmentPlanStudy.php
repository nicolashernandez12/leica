<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentPlanStudy extends Model
{
    protected $table = 'equipment_plan_studies';
    protected $guarded = [];

    public function activeInput()
    {
        return $this->belongsTo('App\ActiveInput', 'id_active_input','id');
    }

    public function studyPlan()
    {
        return $this->belongsTo('App\StudyPlan', 'id_study_plan','id');
    }

}
