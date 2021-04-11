<?php

namespace App\Http\Controllers\Mk;

use App\Http\Controllers\Controller;
use App\Models\Staff;



class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('mk.pages.main');
    }



    public function getuser()
    {
        $ssss = Staff::all();

        return response()->json($ssss, 200);
    }
}
