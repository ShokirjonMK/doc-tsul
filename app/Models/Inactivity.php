<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inactivity extends Model
{
    protected $table='inactivity';

    public function inactivity_type(){
        return $this->belongsTo('App\Models\InactivityType');
    }
    public function staff(){
        return $this->belongsTo('App\Models\Staff');
    }

}

