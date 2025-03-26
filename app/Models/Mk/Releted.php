<?php

namespace App\Models\Mk;

use Illuminate\Database\Eloquent\Model;

class Releted extends Model
{
    protected $table = 'doc_releted';

    protected $fillable = [
        'name',
        'description',
        'status'
    ];
}
