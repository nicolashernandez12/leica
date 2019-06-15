<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lending extends Model
{
    protected $table = 'lendings';
    protected $guarded = [];

    public function loanRegistration()
    {
        return $this->hasMany('App\LoanRegistration', 'id_lending','id');
    }

    public function userData()
    {
        return $this->belongsTo('App\UserData', 'id_user','id');
    }

    public function liable()
    {
        return $this->belongsTo('App\Liable', 'id_liable','id');
    }
}
