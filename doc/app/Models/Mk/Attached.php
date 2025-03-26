<?php

namespace App\Models\Mk;

use Illuminate\Database\Eloquent\Model;

class Attached extends Model
{
    protected $table = 'doc_attached';

    protected $fillable = [
        'user_id',
        'status'
    ];

    // public function language()
    // {
    //     return $this->belongsTo('App\Models\Lang');
    // }

    // public function stdep()
    // {
    //     return $this->hasOne('App\Models\StDep')->where('staff_id', '=', $this->id)->where('status', 1);
    // }
}
