<?php

namespace App\Models\Mk;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    protected $table = 'doc_supervisor';

    protected $fillable = [
        'name',
        'description',
        'user_id',
        'status'
    ];
}
