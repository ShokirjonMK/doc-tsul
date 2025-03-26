<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QualificationInfo extends Model
{
    protected $table='qualification_info';

     public function staff(){
        return $this->belongsTo('App\Models\Staff');
    }

}

