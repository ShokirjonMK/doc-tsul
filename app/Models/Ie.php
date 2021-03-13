<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ie extends Model
{
    protected $table='ie';

  	protected $fillable = [
        'department_id', 'srep', 'parent_id'
    ];

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
