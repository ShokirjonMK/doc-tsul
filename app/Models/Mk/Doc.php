<?php

namespace App\Models\Mk;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mk\Supervisor;
use App\Models\Mk\Releted;

class Doc extends Model
{
    protected $table = 'doc_document';

    protected $fillable = [
        'name',
        'number',
        'date',
        'file',
        'word',
        'ilova',
        'end_date',
        'status'
    ];

    public function releted()
    {
        return $this->belongsTo(Releted::class, 'releted_id');
    }
    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class, 'supervisor_id');
    }

    public function getType()
    {
        if ($this->type == 1) {
            return "Buyruq";
        } elseif ($this->type == 0) {
            return "Kengash qarori";
        }
    }
    public function getDuration()
    {
        if ($this->duration == 1) {
            return "Davomiy";
        } elseif ($this->duration == 0) {
            return "Muddatli";
        }
    }
}
