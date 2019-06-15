<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoftwarePlanStudy extends Model
{
    protected $table = 'software_plan_studies';
    protected $guarded = [];

    public function studyPlan()
    {
        return $this->belongsTo('App\StudyPlan', 'id_study_plan','id');
    }


    public function software()
    {
        return $this->belongsTo('App\Software', 'id_software','id');
    }

}
