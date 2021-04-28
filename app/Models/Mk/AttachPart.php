<?php

namespace App\Models\Mk;

use Illuminate\Database\Eloquent\Model;

class AttachPart extends Model
{
    protected $table = 'doc_attach_part';

    protected $fillable = [
        'user_id',
        'document_id',
        'name',
        'date',
        'word',
        'end_date',
        'file',
        'status'
    ];

    // public function language()
    // {
    //     return $this->belongsTo('App\Models\Lang');
    // }

    public function userget()
    {
        return $this->hasOne('App\User', 'foreign_key', $this->user_id);
        // return $this->hasOne('App\User')->where('id', '=', );
    }
}
