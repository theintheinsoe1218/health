<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Appointment extends Model
{
    protected $fillable = [
        'user_id','age', 'gender', 'symtoms','appoint_date','token_no'
    ];

    public function user($value='')
    {
        return $this->belongsTo('App\User');
    }

    public function treatment(){
        return $this->hasOne('App\Treatment');
    }
}
