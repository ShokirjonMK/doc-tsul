<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\University;
use App\Models\Education;


class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $univss = University::where('status', '!=', 0)->get();
// return $univss;
        return view("admin.pages.university.index",[
            'data' => $univss,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

            'name'=>'required',
            'name_short'=>'required',

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'a');
        }

        $univ_new = new University();

        $univ_new->name = $request->name;
        $univ_new->name_short = $request->name_short;
        $univ_new->status = $request->status;

        $uni = University::orderBy('u_code', 'DESC')->first();

        $univ_new->u_code = $uni->u_code+1;
//        return $uni;

        if($univ_new->save()){
            return back()->with('success', 'A');
        }
        else{
            return back()->with('error', 'A');
        }

        return  $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $univ_edit =  University::where('id', $request->id)->first();
        $univ_edit->status = $request->status;
        $univ_edit->name = $request->name;
        $univ_edit->name_short = $request->name_short;


        if($univ_edit->update()){
            return back()->with('success', 'A');
        }
        else{
            return back()->with('error', 'A');
        }
//       return $request;
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
        $education = Education::where("university_id", $id)->first();
        if(! isset($education)) {
            $univ_delete = University::where('id', $id)->first();
            $univ_delete->status = 0;

            if ($univ_delete->update()) {
                return back()->with('success', 'A');
            } else {
                return back()->with('error', 'A');
            }
        }
         else{
            return back()->with('error', 'A');
        }
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
}
