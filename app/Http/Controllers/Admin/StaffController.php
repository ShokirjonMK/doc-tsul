<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\QualificationInfo;
use Illuminate\Validation\Rule;
use App\Models\InactivityType;
use App\Models\AcademicDegree;
use App\Models\SpecialDegree;
use App\Models\RelativesType;
use Illuminate\Http\Request;
use App\Models\Nationality;
use App\Models\MukofotType;
use App\Models\WorkPlaces;
use App\Models\University;
use App\Models\Inactivity;
use App\Models\DiplomType;
use App\Models\DegreeInfo;
use App\Models\Department;
use App\Models\Education;
use App\Models\IshRejimi;
use App\Models\Relatives;
use App\Models\Country;
use App\Models\Mukofot;
use App\Models\Partiya;
use App\Models\Region;
use App\Models\Stavka;
use App\Models\Degree;
use App\Models\StDep;
use App\Models\Staff;
use App\Models\Area;
use App\Models\Lang;
use PDF;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::all();
        return view('admin.pages.staff.index', [
            'data' => $staff,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //        ini_set("memory_limit", "100M");
        //        ini_set('post_max_size', '50M');
        //        ini_set('upload_max_filesize', '50M');
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
        return view('admin.pages.staff.create', [
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //        ini_set('post_max_size' , '1000');
        //        ini_set('upload_max_filesize' , '1000');
        //        ini_set('max_file_size' , '1000');
        // return Input::all();

        //         return $request;

        //        return    $request->server('CONTENT_LENGTH');

        $input = $request->all();

        $validator = Validator::make($input, [

            'first_name'               => ['required', 'max:70', 'string'],
            'last_name'                => ['required', 'max:70', 'string'],
            //            'middle_name'              => ['required' , 'max:70' , 'string'],
            'country_id'               => ['required'],
            'region_id'                => ['required'],
            'area_id'                  => ['required'],
            'address'                  => ['required', 'string'],
            'birthday'                 => ['required', 'date'],
            //            'birthday'                 => ['required|date|before:25 years ago'],
            'nationality_id'           => ['required'],
            'phone'                    => ['required'],
            //            'phone_home'               => ['required'],
            'passport_seria'           => ['required', 'max:2', 'string'],
            'passport_number'          => ['required'],
            'passport_jshshir'         => ['required'],
            'passport_given_by'        => ['required'],
            'passport_issued_date'     => ['required'],
            'passport_expiration_date' => ['required'],
            //            'passport_image'           => ['required' , 'image' ],
            'stavka_id'                => ['required'],
            'ish_rejimi_id'            => ['required'],
            'degree_info_id'           => ['required'],
            'degree_id'                => ['required'],
            'gender'                   => ['required'],
            'special_degree_id'        => ['required'],
            'partiya_id'               => ['required'],
            //            'image'                    => 'required|mimes:jpeg,bmp,png|max:5000',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'a');
        }

        $staff = new Staff();
        $staff->first_name = $request->first_name;
        $staff->last_name = $request->last_name;
        $staff->middle_name = $request->middle_name;
        $staff->country_id = $request->country_id;
        $staff->region_id = $request->region_id;
        $staff->area_id = $request->area_id;
        $staff->address = $request->address;
        $staff->phone = $request->phone;
        $staff->special_degree_id = $request->special_degree_id;
        $staff->phone1 = $request->phone1;
        $staff->phone_home = $request->phone_home;
        $staff->birthday = $request->birthday;
        $staff->nationality_id = $request->nationality_id;
        $staff->gender = $request->gender;
        $staff->table_number = $request->table_number;
        $staff->passport_seria = $request->passport_seria;
        $staff->passport_number = $request->passport_number;
        $staff->passport_jshshir = $request->passport_jshshir;
        $staff->passport_given_by = $request->passport_given_by;
        $staff->passport_issued_date = $request->passport_issued_date;
        $staff->passport_expiration_date = $request->passport_expiration_date;
        $staff->created_user = Auth::id();

        $staff->ish_rejimi_id = $request->ish_rejimi_id;
        $staff->stavka_id = $request->stavka_id;
        $staff->degree_info_id = $request->degree_info_id;
        $staff->academic_degree_id = $request->academic_degree_id;
        $staff->degree_id = $request->degree_id;

        $staff->partiya_id = $request->partiya_id;
        $staff->deputat = $request->deputat;
        $staff->lang_id = json_encode($request->lang);

        if ($request->file('image')) {
            $staff->image = 'data:image/png;base64,' . base64_encode(file_get_contents($request->file('image')));
        }
        if ($request->file('passport_image')) {
            $staff->passport_image = 'data:image/png;base64,' . base64_encode(file_get_contents($request->file('passport_image')));
        }
        if ($request->file('passport_pdf')) {
            $staff->passport_pdf = 'data:application/pdf;base64,' . base64_encode(file_get_contents($request->file('passport_pdf')));
        }

        //         $staff->diplom_copy = 'data:image/png;base64,'.base64_encode(file_get_contents($request->file('diplom_copy')));
        //         $staff->diplom_ilova_copy = 'data:image/png;base64,'.base64_encode(file_get_contents($request->file('diplom_ilova_copy')));
        $staff->save();

        return redirect()->route('staff.index', $staff->id)->with('success', 'Xodim qo`shildi');
        //        return redirect()->route('staff.show', $staff->id)->with('success' , 'Xodim qo`shildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return "asdad";
        $staff = Staff::find($id);
        $regions = Region::where('status', 1)->get();
        $relative = Relatives::where('staff_id', $id)->get();
        $universty = University::where('status', 1)->get();
        $diplom_type = DiplomType::where('status', 1)->get();
        $mukofot_type = MukofotType::where('status', 1)->get();

        $education = Education::where('staff_id', $id)->get();
        $work_places = WorkPlaces::where('staff_id', $id)->get();
        $inactivities = Inactivity::where('staff_id', $id)->get();
        $qualification_info = QualificationInfo::where('staff_id', $id)->get();
        $mukofot_staff = Mukofot::where('staff_id', $id)->where('status', 1)->get();

        $inactivity_types = InactivityType::where('status', 1)->get();

        $department = Department::select('id', 'name', 'count_workers')->get();
        $is_worker_now = StDep::where('staff_id', $id)->where('status', 1)->get();
        $st_dep = StDep::groupBy('department_id')->count();
        //
        //$stdeppppp = DB::table('st_dep')
        //                 ->select('department_id', DB::raw('count(*) as total'))
        //                 ->groupBy('department_id')
        //                 ->get();
        //
        //$c = Department::leftJoin('st_dep', function($join) {
        //      $join->on('st_dep.department_id', '=', 'department.id');
        //    })
        //    ->where('orders.department_id')
        //    ->get();


        $country = Country::all();

        $RelarivesType = RelativesType::where('status', 1)->get();
        //return  $mukofot_staff;
        return view('admin.pages.staff.show', [
            'data' => $staff,
            'st_dep' => $st_dep,
            'regions' => $regions,
            'relative' => $relative,
            'countries' => $country,
            'education' => $education,
            'department' => $department,
            'universities' => $universty,
            'work_places' => $work_places,
            'diplom_types' => $diplom_type,
            'mukofot_type' => $mukofot_type,
            'inactivities' => $inactivities,
            'RelarivesType' => $RelarivesType,
            'is_worker_now_all' => $is_worker_now,
            'mukofot_staff' => $mukofot_staff,
            'inactivity_types' => $inactivity_types,
            'qualification_info' => $qualification_info,
        ]);
    }

    public function inactivity(Request $request)
    {
        //        return $request;
        $input = $request->all();

        $validator = Validator::make($input, [
            'name'                    => ['required'],
            'description'             => ['required'],
            'date'                    => ['required'],
            'inactivity_type_id'          => ['required'],

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'a');
        }

        $inactivityNew = new Inactivity();

        $inactivityNew->staff_id = $request->id;
        $inactivityNew->name = $request->name;
        $inactivityNew->date = $request->date;
        $inactivityNew->description = $request->description;
        $inactivityNew->inactivity_type_id = $request->inactivity_type_id;
        $inactivityNew->status = 1;

        if ($request->file('in_file')) {
            $inactivityNew->file = 'data:application/pdf;base64,' . base64_encode(file_get_contents($request->file('in_file')));
        }

        if ($inactivityNew->save()) {
            return redirect()->back()->with('success', 'a');
        } else {
            return redirect()->back()->with('error', 'a');
        }
    }

    public function qualification(Request $request)
    {
        //        return $request;
        $input = $request->all();

        $validator = Validator::make($input, [
            'name'                    => ['required'],
            'description'             => ['required'],
            'start_date'              => ['required'],
            'end_date'                => ['required'],

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'a');
        }

        $qualification_info_New = new QualificationInfo();

        $qualification_info_New->staff_id = $request->id;
        $qualification_info_New->name = $request->name;
        $qualification_info_New->description = $request->description;
        $qualification_info_New->start_date = $request->start_date;
        $qualification_info_New->end_date = $request->end_date;
        $qualification_info_New->status = 1;

        if ($qualification_info_New->save()) {
            return redirect()->back()->with('success', 'a');
        } else {
            return redirect()->back()->with('error', 'a');
        }
    }

    public function workplace(Request $request)
    {
        //        return $request;
        $input = $request->all();

        $validator = Validator::make($input, [
            'start_time'          => ['required'],
            'end_time'            => ['required'],
            'workplace'           => ['required', 'max:255', 'string'],
            'position'            => ['required', 'max:255', 'string'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'a');
        }

        $work_place = new WorkPlaces();

        $work_place->staff_id = $request->id;
        $work_place->name = $request->workplace;
        $work_place->position = $request->position;
        $work_place->start_time = $request->start_time;
        $work_place->end_time = $request->end_time;
        $work_place->status = 1;

        if ($work_place->save()) {
            return redirect()->back()->with('success', 'a');
        } else {
            return redirect()->back()->with('error', 'a');
        }
    }

    public function diplom(Request $request)
    {
        //        return $request;
        $input = $request->all();

        $validator = Validator::make($input, [

            'university_id'               => ['required'],
            'specialization'        => ['required', 'max:255', 'string'],
            'diplom_seria'             => ['required', 'max:7', 'string'],

        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'a');
        }

        $diploma = new Education();

        $diploma->staff_id = $request->id;
        $diploma->university_id = $request->university_id;
        $diploma->specialization = $request->specialization;
        $diploma->diplom_seria = $request->diplom_seria;
        $diploma->diplom_number = $request->diplom_number;
        $diploma->diplom_issued_date = $request->diplom_issued_date;

        $diploma->diplom_type_id = $request->diplom_type_id;
        $diploma->status = 1;

        if ($request->file('diplom_ilova_copy')) {
            $diploma->diplom_ilova_copy = 'data:application/pdf;base64,' . base64_encode(file_get_contents($request->file('diplom_ilova_copy')));
        }

        if ($request->file('diplom_copy')) {
            $diploma->diplom_copy = 'data:application/pdf;base64,' . base64_encode(file_get_contents($request->file('diplom_copy')));
        }

        if ($diploma->save()) {
            return redirect()->back()->with('success', 'a');
        } else {
            return redirect()->back()->with('error', 'a');
        }
    }


    public function relative(Request $request)
    {
        //        return $request;

        $RelarivesType = RelativesType::where('id', $request->RelativesType)->get();

        $input = $request->all();

        $validator = Validator::make($input, [

            'RelativesType'    => ['required', 'max:255', 'string'],
            'full_name'        => ['required', 'max:255', 'string'],
            'work'             => ['required'],
            'birthday'         => ['required'],
            'address'          => ['required'],

        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'a');
        }

        $relatives = new Relatives();

        $relatives->staff_id = $request->id;
        $relatives->relatives_type_id = $request->RelativesType;
        $relatives->full_name = $request->full_name;
        $relatives->birthday = $request->birthday;
        $relatives->address = $request->address;
        $relatives->work_rank = $request->work;
        $relatives->birth_address = $request->birth_address;
        $relatives->country_id = $request->country_id;
        $relatives->region_id = $request->region_id;
        $relatives->area_id = $request->area_id;
        $relatives->created_user = Auth::id();

        if ($relatives->save()) {
            return redirect()->back()->with('success', 'a');
        } else {
            return redirect()->back()->with('error', 'a');
        }
    }

    public function mukofot(Request $request)
    {
        //        return $request;

        $input = $request->all();

        $validator = Validator::make($input, [

            'mukofot_type_id'       => ['required'],
            'name'                  => ['required', 'max:255', 'string'],
            'date'                  => ['required'],
            'id'                    => ['required'],

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'a');
        }

        $mukofot = new Mukofot();

        $mukofot->staff_id = $request->id;
        $mukofot->mukofot_type_id = $request->mukofot_type_id;
        $mukofot->date = $request->date;
        $mukofot->name = $request->name;
        $mukofot->description = $request->description;
        $mukofot->status = 1;

        if ($mukofot->save()) {
            return redirect()->back()->with('success', 'a');
        } else {
            return redirect()->back()->with('error', 'a');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = Staff::find($id);
        $staff->lang_id = json_decode($staff->lang_id);
        $education = Education::where('status', 1)->get();
        $regions = Region::where('status', 1)->get();
        $area = Area::where('status', 1)->get();
        $ish_rejimi = IshRejimi::where('status', 1)->get();
        $country = Country::all();
        $nationalities = Nationality::where('status', 1)->get();
        $diplom_types = DiplomType::where('status', 1)->get();
        $degree_info = DegreeInfo::where('status', 1)->get();
        $stavka = Stavka::where('status', 1)->get();
        $partiya = Partiya::where('status', 1)->get();

        $academic_degree = AcademicDegree::where('status', 1)->get();
        $degree = Degree::where('status', 1)->get();
        $special_degree = SpecialDegree::where('status', 1)->get();
        $language = Lang::where('status', 1)->get();

        // return $nationalities;
        return view('admin.pages.staff.edit', [
            'education' => $education,
            'regions' => $regions,
            'areas' => $area,
            'countries' => $country,
            'stavka' => $stavka,
            'partiya' => $partiya,
            'academic_degree' => $academic_degree,
            'ish_rejimi' => $ish_rejimi,
            'degree_info' => $degree_info,
            'degree' => $degree,
            'language' => $language,
            'nationalities' => $nationalities,
            'diplom_types' => $diplom_types,
            'special_degrees' => $special_degree,
            'data' => $staff,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //        return $id;
        //        return $request;

        $input = $request->all();

        $validator = Validator::make($input, [

            'first_name'               => ['required', 'max:255', 'string'],
            'last_name'                => ['required', 'max:255', 'string'],
            'middle_name'              => ['required', 'max:255', 'string'],
            'country_id'               => ['required'],
            'region_id'                => ['required'],
            'area_id'                  => ['required'],
            'address'                  => ['required', 'string'],
            'birthday'                 => ['required', 'date'],
            'nationality_id'           => ['required'],
            'phone'                    => ['required'],
            //            'phone_home'               => ['required'],
            'passport_seria'           => ['required'],
            'passport_number'          => ['required'],
            'passport_jshshir'         => ['required'],
            'passport_given_by'        => ['required'],
            'passport_issued_date'     => ['required'],
            'passport_expiration_date' => ['required'],
            //            'passport_image'           => ['required' , 'image' ],
            'stavka_id'                => ['required'],
            'ish_rejimi_id'            => ['required'],
            'degree_info_id'           => ['required'],
            'gender'                   => ['required'],
            //            'image'                    => 'required|mimes:jpeg,bmp,png|max:5000',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'a');
        }

        $staff = Staff::find($id);
        $staff->first_name = $request->first_name;
        $staff->last_name = $request->last_name;
        $staff->middle_name = $request->middle_name;
        $staff->country_id = $request->country_id;
        $staff->region_id = $request->region_id;
        $staff->area_id = $request->area_id;
        $staff->address = $request->address;
        $staff->phone = $request->phone;
        $staff->phone1 = $request->phone1;
        $staff->phone_home = $request->phone_home;
        $staff->birthday = $request->birthday;
        $staff->nationality_id = $request->nationality_id;
        $staff->gender = $request->gender;
        $staff->table_number = $request->table_number;
        $staff->passport_seria = $request->passport_seria;
        $staff->passport_number = $request->passport_number;
        $staff->passport_jshshir = $request->passport_jshshir;
        $staff->passport_given_by = $request->passport_given_by;
        $staff->passport_issued_date = $request->passport_issued_date;
        $staff->passport_expiration_date = $request->passport_expiration_date;
        $staff->special_degree_id = $request->special_degree_id;

        $staff->ish_rejimi_id = $request->ish_rejimi_id;
        $staff->stavka_id = $request->stavka_id;
        $staff->degree_info_id = $request->degree_info_id;
        $staff->academic_degree_id = $request->academic_degree_id;
        $staff->degree_id = $request->degree_id;
        $staff->updated_user = Auth::id();


        $staff->partiya_id = $request->partiya_id;
        $staff->deputat = $request->deputat;
        $staff->lang_id = json_encode($request->lang);

        if ($request->file('image')) {
            $staff->image = 'data:image/png;base64,' . base64_encode(file_get_contents($request->file('image')));
        }
        if ($request->file('passport_image')) {
            $staff->passport_image = 'data:image/png;base64,' . base64_encode(file_get_contents($request->file('passport_image')));
        }
        if ($request->file('passport_pdf')) {
            $staff->passport_pdf = 'data:application/pdf;base64,' . base64_encode(file_get_contents($request->file('passport_pdf')));
        }
        //         $staff->diplom_ilova_copy = 'data:image/png;base64,'.base64_encode(file_get_contents($request->file('diplom_ilova_copy')));
        $staff->update();
        return redirect()->route('staff.index', $staff->id)->with('success', 'A');

        //        return redirect()->back()->with('success' , 'A');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function pdf_for_staff($id)
    {

        $staff = Staff::find($id);
        $staff->lang_id = json_decode($staff->lang_id);

        $relarive = Relatives::where('staff_id', $id)->where('status', 1)->get();
        $education = Education::where('staff_id', $id)->where('status', 1)->get();
        $workplaces = WorkPlaces::where('staff_id', $id)->where('status', 1)->get();
        $mukofot_all = Mukofot::where('staff_id', $id)->where('status', 1)->get();


        return PDF::loadView('admin.pages.staff.resume', [
            'data' => $staff,
            'relative' => $relarive,
            'education' => $education,

            'workplaces' => $workplaces,
            'mukofot_all' => $mukofot_all,
        ])->download($staff->last_name . $staff->first_name . '.pdf');
    }

    public function get_staff(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'id'                    => ['required'],
            'position'              => ['required', 'max:255', 'string'],
            'start_date'            => ['required'],
            'start_order'           => ['required'],
            'department_id'         => ['required'],


        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'a');
        }

        $st_dep = new StDep();

        if ($request->boss == "on") {
            $st_dep->boss = 1;
        } else {
            $st_dep->boss = 0;
        }

        $st_dep->staff_id = $request->id;
        $st_dep->position = $request->position;
        $st_dep->description = $request->description;
        $st_dep->department_id = $request->department_id;
        $st_dep->start_date = $request->start_date;
        $st_dep->created_user = Auth::id();;
        $st_dep->status = 1;

        if ($request->file('start_order')) {
            $st_dep->start_order = 'data:application/pdf;base64,' . base64_encode(file_get_contents($request->file('start_order')));
        }

        if ($st_dep->save()) {
            return redirect()->back()->with('success', 'a');
        } else {
            return redirect()->back()->with('error', 'a');
        }
    }

    public function fire_staff(Request $request)
    {
        $input = $request->all();
        //return $request;
        $validator = Validator::make($input, [
            'id'                  => ['required'],
            'end_date'            => ['required'],
            'end_order'           => ['required'],
            'department_id'       => ['required'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'a');
        }

        $st_dep = StDep::where([
            ['staff_id', '=', $request->id],
            ['department_id', '=', $request->department_id],
        ])->first();

        $st_dep->description_end = $request->description_end;
        $st_dep->department_id = $request->department_id;
        $st_dep->end_date = $request->end_date;
        $st_dep->updated_user = Auth::id();
        $st_dep->status = 0;

        if ($request->file('end_order')) {
            $st_dep->end_order = 'data:application/pdf;base64,' . base64_encode(file_get_contents($request->file('end_order')));
        }

        if ($st_dep->update()) {

            $work_place = new WorkPlaces();

            $work_place->staff_id = $request->id;
            $work_place->name = "TDYU " . $st_dep->department->name;
            $work_place->position = $st_dep->position;
            $work_place->start_time = $st_dep->start_date;
            $work_place->end_time = $st_dep->end_date;
            $work_place->created_user = Auth::id();
            $work_place->status = 1;

            if ($work_place->save()) {
                return redirect()->back()->with('success', 'a');
            } else {
                return redirect()->back()->with('error', 'a');
            }
        } else {
            return redirect()->back()->with('error', 'a');
        }
    }
}
