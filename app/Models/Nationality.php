<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Area;

class Nationality extends Model
{
    protected $table='nationality';

    // public function area(){
    //     $area = Area::find($this->id)->get();
    //     return $area;
    // }
}
