<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Ie;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = date("Y-m-d");
        $department = Department::where('status', '!=', 0)->get();
        // return $structure;
        return view("admin.pages.department.index", [
            'data' => $department,
            'status' => 0,
            'date' => $date,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        //        return $request;

        $validator = Validator::make($input, [
            'name' => 'required',
            //            'description'=>'required',
            'status' => 'required',
            'order_name' => 'required',
            'order_date' => 'required',
            'order_file' => 'required',
            'count_workers' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'a');
        }

        $department = new Department();

        $department->name = $request->name;
        //        $department->description = $request->description;
        $department->parent_id = $request->parent_id;
        $department->count_workers = $request->count_workers;
        $department->status = $request->status;
        $department->order_name = $request->order_name;
        $department->order_date = $request->order_date;

        if ($request->file('order_file')) {
            $department->order_file = 'data:application/pdf;base64,' . base64_encode(file_get_contents($request->file('order_file')));
        }
        // return  $department->order_file;
        $department->created_user = Auth::id();

        if ($department->save()) {
            $ie = Ie::where('department_id', $request->parent_id)->get();
            $ie_count = Ie::where('department_id', $request->parent_id)->count();
            foreach ($ie as $value) {
                $new_ie = new Ie();
                $new_ie->department_id = $department->id;
                $new_ie->step = $value->step;
                $new_ie->parent_id = $value->parent_id;
                $new_ie->status = $value->status;
                $new_ie->created_user = Auth::id();
                $new_ie->save();
            }
            $ie_count++;
            $last_ie = new Ie();
            $last_ie->department_id = $department->id;
            $last_ie->step = $ie_count;
            $last_ie->parent_id = $department->parent_id;
            $last_ie->status = $department->status;
            $last_ie->created_user = Auth::id();
            $last_ie->save();

            return back()->with('success', 'a');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        $ie = Ie::where('parent_id', $department->id)->orderBy('step', "DESC")->pluck('department_id');
        $dd = Department::whereIn('id', $ie)->get();
        $date = date("Y-m-d");
        return view("admin.pages.department.index", [
            'date' => $date,
            'data' => $dd,
            'status' => 1,
            'department_show' => $department
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $dd = Department::where('id', $request->id)->first();

        $ie_check = Ie::where('department_id', $dd->id)->get();

        if ($request->parent_id != $dd->parent_id) {
            $ie_delete = Ie::where('department_id', $dd->id)->get();
            foreach ($ie_delete as $del) {
                $del->status = 2;
                $del->update();
            }
            $ie = Ie::where('department_id', $dd->parent_id)->get();

            $ie_count_for = 0;
            foreach ($ie as $value) {
                $new_ie = new Ie();
                $new_ie->department_id = $dd->id;
                $new_ie->step = $value->step;
                $new_ie->parent_id = $value->parent_id;
                $new_ie->status = $request->status;
                $new_ie->created_user = Auth::id();
                $new_ie->updated_user = Auth::id();
                $new_ie->save();
                $ie_count_for++;
            }

            $ie_count_for++;

            $last_ie = new Ie();
            $last_ie->department_id = $dd->id;
            $last_ie->step = $ie_count_for;
            $last_ie->parent_id = $request->parent_id;
            $last_ie->status = $request->status;
            $last_ie->created_user = Auth::id();
            $last_ie->updated_user = Auth::id();
            $last_ie->save();

            // $ie_show = Ie::where('department_id', $dd->id)->get();
            // return $ie_show;
        } else {
            $ie_status = Ie::where('department_id', $dd->id)->get();
            foreach ($ie_status as $st) {
                $st->status = $request->status;
                $st->updated_user = Auth::id();
                $st->update();
            }
        }

        // return $request;
        $dd->name = $request->name;
        $dd->description = $request->description;
        $dd->parent_id = $request->parent_id;
        $dd->count_workers = $request->count_workers;
        $dd->status = $request->status;
        $dd->updated_user = Auth::id();

        $dd->order_name = $request->order_name;
        $dd->order_date = $request->order_date;

        if ($request->file('order_file')) {
            $dd->order_file = 'data:application/pdf;base64,' . base64_encode(file_get_contents($request->file('order_file')));
        }

        $dd->update();

        return back()->with('success', 'a');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        return redirect()->back()->with('error', 'a');

        $department->status = 0;
        $department->updated_user = Auth::id();

        $ie_delete = Ie::where('department_id', $department->id)->get();
        foreach ($ie_delete as $del) {
            $del->status = 0;
            $del->updated_user = Auth::id();

            $del->update();
        }
        $department->save();
        return back()->with('success', 'A');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($department)
    {
        $dep = Department::where('id', $department);
        //return 1;
        return redirect()->back()->with('error', 'a');

        //        return $dep;
        $dep->status = 0;
        $dep->update();

        return back()->with('success', 'A');
    }
}
