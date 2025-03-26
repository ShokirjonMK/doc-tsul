<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table='education';


    public function diplom_types(){
        return $this->belongsTo('App\Models\DilpomType');
    }

    public function university(){
        return $this->belongsTo('App\Models\University');
    }

}

