<?php

namespace App\Models\Mk;

use App\User;
use App\Models\Mk\Doc;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

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

    public function user()
    {
        return $this->belongsTo(User::class,  $this->user_id, 'id');
    }

    public function userget()
    {
        return $this->hasOne('App\User', 'id', $this->user_id);
    }
    public function doc()
    {
        return $this->belongsTo(Doc::class, 'document_id');
    }

    public function getuserfio()
    {
        $user = User::find($this->user_id);
        if ($user->last_name) {
            $fio = $user->last_name . $user->first_name;
        } else {
            $fio = $user->username;
        }
        return $fio;
    }
}
