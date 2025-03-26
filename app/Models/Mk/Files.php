<?php

namespace App\Models\Mk;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $table = 'doc_files';

    protected $fillable = [
        'file',
        'document_id'
    ];
}
