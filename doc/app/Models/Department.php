<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
   protected $table='department';

	protected $fillable = [
        'name', 'description',  'count_workers', 'status'
    ];


    public function parent(){
    	$department = Department::where('id',$this->id)->first();
    	// return $department;

    	if($department->parent_id > 0 ){
	    	$ss = Department::where('id', $department->parent_id)->first();
	    	return $ss->name;
    	}
    	else return "...";
	}

	public function status(){
		if($this->status == 1){
			return "Faol";
		}
		elseif($this->status == 2){
			return "Nofaol";
		}
		elseif($this->status == 0){
			return "O'chirilgan";
		}
	}
}
