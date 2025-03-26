<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Staff;
use App\Models\StDep;


class StDepController extends Controller
{

    public function index()
    {
        $staff = Staff::all();

        return view('admin.pages.stdep.index' , [
            'data' => $staff,
        ]);
    }

    public function get_staff()
    {
        return 1;
    }


    public function create()
    {

    }

    public function store(Request $request)
    {
        $input = $request->all();

//        return $request;

        $validator = Validator::make($input, [
//            'xodimlar'=>'required',

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'a');
        }

        if(!($request->xodimlar || $request->staff_boss_id)){
              return back()->with('error_not_select', 'a');
        }
        $old_boss = StDep::where('status', 1)->where('boss', 1)->where('department_id', $request->department)->first();
//        $new_boss = StDep::where('status', 1)->where('boss', 1)->where('staff_id', $request->staff_boss_id)->where('department_id', $request->department)->first();

//        return  $old_boss;
        if($request->staff_boss_id != 0){
            if ($old_boss) {
                if ($old_boss->staff_id != $request->staff_boss_id) {
                    $old_boss->status = 0;
                    $old_boss->updated_user = Auth::id();

                    $old_boss->update();

                    $StDep_new_boss = new StDep();
                    $StDep_new_boss->staff_id = $request->staff_boss_id;
                    $StDep_new_boss->department_id = $request->department;
                    $StDep_new_boss->created_user = Auth::id();

                    $StDep_new_boss->status = 1;
                    $StDep_new_boss->boss = 1;

                    $StDep_new_boss->save();
                }
            } else {
                $StDep_new_boss = new StDep();
                $StDep_new_boss->staff_id = $request->staff_boss_id;
                $StDep_new_boss->department_id = $request->department;
                $StDep_new_boss->created_user = Auth::id();

                $StDep_new_boss->status = 1;
                $StDep_new_boss->boss = 1;

                $StDep_new_boss->save();
            }
        }
        if($request->xodimlar){

            foreach ($request->xodimlar as $xodimlar){
                $st_dep_is_recorded = StDep::where('status', 1)->where('department_id', $request->department)->where('staff_id', $xodimlar)->first();
                if(! $st_dep_is_recorded){
                    $StDep_new = new StDep();

                    $StDep_new->staff_id = $xodimlar;
                    $StDep_new->department_id = $request->department;
                    $StDep_new->created_user = Auth::id();

                    $StDep_new->boss = 0;
                    $StDep_new->status = 1;

                    $StDep_new->save();

                    }
                else{
                     return back()->with('error_allready_recorded', 'a');
                }

                    }
        }



        return back()->with('success', 'a');
    }


    public function show($id)
    {
        $dep = Department::where('id', $id)->where('status', 1)->first();
        $StDep = StDep::where('department_id', $id)->where('status', 1)->pluck('staff_id');
        $this_staff = Staff::whereIn('id' , $StDep)->where('status', 1)->get();

        $boss_dep =  StDep::where('department_id', $id)->where('boss', 1)->where('status', 1)->first();

        $staff = Staff::select('id', 'first_name', 'last_name', 'middle_name')->where('status', 1)->get();
//return $boss_dep;
        if($boss_dep){
            $staff_boss = Staff::where('id', $boss_dep->staff_id)->where('status', 1)->first();
            $status = 1;
            $staff = Staff::where('id', '!=',$boss_dep->staff_id )->select('id', 'first_name', 'last_name', 'middle_name')->where('status', 1)->get();
        }
        else {
            $staff_boss = NULL;
            $status = 0;
        }
    $c = Staff::leftJoin('st_dep', function($join) {
          $join->on('staff.id', '!=', 'st_dep.staff_id');
        })
        ->where('st_dep.department_id',  $id)
        ->get([
            'staff.id',
            'staff.first_name',
            'staff.last_name',
            'staff.middle_name',
        ]);

    //return $c;

    //$staff = StDep::where('department_id', '!=', $id)->get();

        return view('admin.pages.stdep.index' , [
            'staff_all' => $staff,
//            'staff_all' => $c,
            'data' => $this_staff,
            'department' => $dep,
            'boss_dep' => $boss_dep,
            'staff_boss' => $staff_boss,
            'status' => $status,
        ]);
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
