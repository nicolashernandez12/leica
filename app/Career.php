<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $table = 'careers';
    protected $guarded = [];

    public function studyPlan()
    {
        return $this->hasMany('App\StudyPlan', 'id_career','id');
    }
}
