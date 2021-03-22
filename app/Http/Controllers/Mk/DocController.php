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
        //
    }


    public function new()
    {

        $date = date("Y-m-d");
        //        $date18 = strtotime("-18 year", strtotime($date));

        $yesterday = date("Y-m-d", strtotime("-1 day", strtotime($date)));
        $maxdateofbirth = date("Y-m-d", strtotime("-18 year", strtotime($date)));
        $mindateofbirth = date("Y-m-d", strtotime("-80 year", strtotime($date)));
        $minpassportdate = date("Y-m-d", strtotime("-10 year", strtotime($date)));
        $education = Education::where('status', 1)->get();
        $regions = Region::where('status', 1)->get();
        $ish_rejimi = IshRejimi::where('status', 1)->get();
        $partiya = Partiya::where('status', 1)->get();
        $country = Country::all();
        $nationalities = Nationality::where('status', 1)->get();
        $diplom_types = DiplomType::where('status', 1)->get();
        $degree_info = DegreeInfo::where('status', 1)->get();
        $stavka = Stavka::where('status', 1)->get();
        $academic_degree = AcademicDegree::where('status', 1)->get();
        $degree = Degree::where('status', 1)->get();
        $special_degree = SpecialDegree::where('status', 1)->get();
        $language = Lang::where('status', 1)->get();
        // return $nationalities;
        return view('mk.pages.new', [
            'education' => $education,
            'regions' => $regions,
            'countries' => $country,
            'stavka' => $stavka,
            'partiya' => $partiya,
            'academic_degree' => $academic_degree,
            'ish_rejimi' => $ish_rejimi,
            'degree_info' => $degree_info,
            'special_degrees' => $special_degree,
            'degree' => $degree,
            'nationalities' => $nationalities,
            'diplom_types' => $diplom_types,
            'today' => $date,
            'language' => $language,
            'yesterday' => $yesterday,
            'date18' => $maxdateofbirth,
            'date80' => $mindateofbirth,
            'minpassportdate' => $minpassportdate,

        ]);


        return view('mk.pages.new');
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
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
