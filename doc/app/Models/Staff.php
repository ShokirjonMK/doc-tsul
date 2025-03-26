<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table='staff';

    protected $fillable = [
         'first_name', 'midlle_name', 'last_name', 'begin_at', 'region_id', 'area_id', 'address', 'phone', 'phone_home', 'birthday', 'passport_seria', 'passport_number', 'passport_image', 'diplom', 'diplom_number', 'diplom_ilova', 'diplom_type_id', 'militry_id', 'inps', 'inn', 'biography', 'familiy_info', 'image', 'resume', 'forma_025', 'judge_info'
    ];

    public function fio(){
    	return $this->last_name.' '.$this->first_name.' '.$this->middle_name;
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
    public function ish_rejimi(){
        return $this->belongsTo('App\Models\IshRejimi');
    }
    public function stavka(){
        return $this->belongsTo('App\Models\Stavka');
    }
    public function nationality(){
        return $this->belongsTo('App\Models\Nationality');
    }
    public function academic_degree(){
        return $this->belongsTo('App\Models\AcademicDegree');
    }
    public function degree(){
        return $this->belongsTo('App\Models\Degree');
    }
    public function degree_info(){
        return $this->belongsTo('App\Models\DegreeInfo');
    }
    public function special_degree(){
        return $this->belongsTo('App\Models\SpecialDegree');
    }
    public function relative(){
        return $this->belongsTo('App\Models\Relatives');
    }
    public function partiya(){
        return $this->belongsTo('App\Models\Partiya');
    }
    public function language(){
        return $this->belongsTo('App\Models\Lang');
    }

    public function stdep(){
         return $this->hasOne('App\Models\StDep')->where('staff_id','=', $this->id)->where('status', 1);
    }


}
