<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Structure;

class Structure extends Model
{
    protected $table='structure';

  	protected $fillable = [
        'name', 'description', 'parent_id', 'count', 'status'
    ];


    public function parent(){
    	$structure = Structure::where('id',$this->id)->first();
    	// return $structure;

    	if($structure->parent_id > 0 ){
	    	$ss = Structure::find($structure->parent_id)->first();
	    	return $ss->name;
    	}
    	else return "...";
	}

	public function status(){
    	$structure = Structure::where('id',$this->id)->first();

		if($structure->status == 1){
			return "Faol";
		}
		else{
			return "Nofaol";
		}
	}
}
