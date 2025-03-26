<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Area;

class Region extends Model
{
    protected $table='region';

    // public function area(){
    //     $area = Area::find($this->id)->get();
    //     return $area;
    // }
}
