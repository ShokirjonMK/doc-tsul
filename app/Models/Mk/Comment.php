<?php

namespace App\Models\Mk;

use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    protected $table = 'doc_comment';


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
