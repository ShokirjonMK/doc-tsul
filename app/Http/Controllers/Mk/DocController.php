<?php

namespace App\Http\Controllers\Mk;

use App\Http\Controllers\Controller;
use App\Models\AcademicDegree;
use App\Models\Country;
use App\Models\Degree;
use App\Models\DegreeInfo;
use App\Models\DiplomType;
use App\Models\Education;
use App\Models\IshRejimi;
use App\Models\Lang;
use App\Models\Mk\Doc;
use App\Models\Nationality;
use App\Models\Partiya;
use App\Models\Region;
use App\Models\SpecialDegree;
use App\Models\Stavka;
use Illuminate\Http\Request;

class DocController extends Controller
{

    public function index()
    {
        return view('mk.pages.main');
    }


    public function new()
    {
        $data = 'sssss';

        return view('mk.pages.doc.new', [
            'data' => $data,
        ]);


        return view('mk.pages.doc.new');
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //


        return $request;
    }


    public function show(Doc $doc)
    {
        //
    }


    public function edit(Doc $doc)
    {
        //
    }


    public function update(Request $request, Doc $doc)
    {
        //
    }


    public function destroy(Doc $doc)
    {
        //
    }
}
