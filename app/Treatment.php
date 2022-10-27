<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $fillable = [
        'appointment_id', 'occur', 'allergic','date'
    ];

    public function appointment($value='')
    {
        return $this->hasOne('App\Appointment');
    }
}
