<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Teacher;
use App\Models\Staff;
use App\Models\Degree;



class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


     public function index()
    {

        $shatat_count = Department::all()->sum('count_workers');
//return $count;

         $all_teacher = Teacher::count();
         $all_staff = Staff::count();

         $busy_shatat = Staff::all()->sum('stavka.name');
         $free_shtat = $shatat_count - $busy_shatat;

         $inner_shtat = Staff::where('status', 1)->where('ish_rejimi_id', 2)->where('status', 1)->count();
         $outer_shtat = Staff::where('status', 1)->where('ish_rejimi_id', 3)->count();

         $prof_count = Staff::where('status', 1)->where('degree_id', 3)->count();
         $dot_count = Staff::where('status', 1)->where('degree_id', 2)->count();
         $cond_count = Staff::where('status', 1)->where('academic_degree_id', 2)->count();
         $doc_count = Staff::where('status', 1)->where('academic_degree_id', 3)->count();
         $darajasiz_count = Staff::where('status', 1)->where('academic_degree_id', 1)->count();
         $darajasiz_count1 = Staff::where('status', 1)->where('degree_id', 1)->count();
         $adliya_count = Staff::where('status', 1)->where('special_degree_id', 8)->count();
         $unvonli_count = Staff::where('status', 1)->where('special_degree_id','>', 1)->count();
         $unvonsiz_count = Staff::where('status', 1)->where('special_degree_id', 1)->count();

         if($shatat_count>0){
             $jami_xodimlar = 100 * $all_staff/$shatat_count;
             $free_shtat_f = 100 * $free_shtat/$shatat_count;
             $inner_shtat_f = 100 * $inner_shtat/$shatat_count;
             $outer_shtat_f = 100 * $outer_shtat/$shatat_count;

         }
         if($all_staff>0){
             $teacher_xodimlar = 100 * $all_teacher/$all_staff;
         }
         
//return $free_shtat_f;

    	return view("admin.index",[
            'shatat_count' => $shatat_count,
            'free_shtat' => $free_shtat,
            'darajasiz_count' => $darajasiz_count,
            'darajasiz_count1' => $darajasiz_count1,
            'inner_shtat' => $inner_shtat,
            'prof_count' => $prof_count,
            'unvonli_count' => $unvonli_count,
            'unvonsiz_count' => $unvonsiz_count,
            'adliya_count' => $adliya_count,
            'outer_shtat' => $outer_shtat,
            'all_staff' => $all_staff,
            'dot_count' => $dot_count,
            'cond_count' => $cond_count,
            'doc_count' => $doc_count,
            'all_teacher' => $all_teacher,
            'jami_xodimlar' => round( $jami_xodimlar, 0),
            'teacher_xodimlar' => round( $teacher_xodimlar, 0),
            'free_shtat_f' => round( $free_shtat_f, 0),
            'inner_shtat_f' => round( $inner_shtat_f, 0),
            'outer_shtat_f' => round( $outer_shtat_f, 0),

        ]);
    }


    public function getuser(){
        $ssss = Staff::all();

        return response()->json($ssss, 200);
    }



}
