<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanRegistration extends Model
{
    protected $table = 'loan_registrations';
    protected $guarded = [];

    public function inventory()
    {
        return $this->belongsTo('App\Inventory', 'id_inventory','id');
    }

    public function lending()
    {
        return $this->belongsTo('App\Lending', 'id_lending','id');
    }
}

