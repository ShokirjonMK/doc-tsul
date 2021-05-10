<?php

namespace App\Models\Mk;

use Illuminate\Database\Eloquent\Model;

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

    // public function getStatus()
    // {

    //     // return date("Y-m-d", strtotime("+1 day"));
    //     $doc = Doc::find($this->id)->first();
    //     if ($doc->status == 0) {
    //         return 'Nofaol';
    //     }
    //     if ($doc->status == 1) {
    //         return 'Faol';
    //     }
    // }


    // public function getHolati()
    // {

    //     // return date("Y-m-d", strtotime("+1 day"));
    //     $doc = Doc::find($this->id)->first();
    //     // return $doc->end_date;


    //     if ($doc->status == 0) {
    //         return 'table-secondary';
    //     }
    //     if ($doc->end_date == date("Y-m-d")) {
    //         return 'table-danger';
    //     }

    //     if ($doc->end_date == date("Y-m-d", strtotime("+1 day"))) {
    //         return 'table-warning';
    //     }
    //     if ($doc->end_date > date("Y-m-d")) {
    //         return 'table-info';
    //     }
    //     return $doc;
    // }

    // public function stdep()
    // {
    //     return $this->hasOne('App\Models\StDep')->where('staff_id', '=', $this->id)->where('status', 1);
    // }
}
