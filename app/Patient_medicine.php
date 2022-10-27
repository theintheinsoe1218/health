<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient_medicine extends Model
{
    protected $fillable = [
        'appointment_id', 'medicine_id', 'amount'
    ];

    public function medicine($value='')
    {
        return $this->hasMany('App\Medicine');
    }
}
