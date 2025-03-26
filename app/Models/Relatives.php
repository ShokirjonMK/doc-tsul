<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relatives extends Model
{
    protected $table='relatives';


    public function relatives_type(){
        return $this->belongsTo('App\Models\RelativesType');
    }

     public function region(){
    	return $this->belongsTo('App\Models\Region');
    }
    public function area(){
    	return $this->belongsTo('App\Models\Area');
    }
    public function country(){
        return $this->belongsTo('App\Models\Country');
    }
}

