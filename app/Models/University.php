<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $table='university';

    public function getStatus(){
        if($this->status == 0){
            return "Ochirilgan";
        }
        if($this->status == 1){
            return "Faol";
        }
        if($this->status == 2){
            return "Nofaol";
        }
        else{
            return "Nomalum";
        }
    }
}