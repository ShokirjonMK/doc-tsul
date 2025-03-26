<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StDep extends Model
{
    protected $table='st_dep';


    public function staff(){
        return $this->belongsTo('App\Models\Staff');
    }
       public function department(){

//        return  $this->department_id;
         return $this->belongsTo('App\Models\Department')->where('id',$this->department_id)->where('status', 1);
    }
}
