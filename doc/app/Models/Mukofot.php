<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mukofot extends Model
{
    protected $table='mukofot';

    public function mukofot_type(){
      return $this->belongsTo('App\Models\MukofotType');
    }

}