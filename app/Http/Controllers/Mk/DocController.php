<?php

namespace App\Http\Controllers\Mk;

use App\Http\Controllers\Controller;
use App\Models\Mk\Doc;
use App\User;
use Illuminate\Http\Request;

class DocController extends Controller
{

    public function index()
    {
        return view('mk.pages.main');
    }


    public function new()
    {
        $users = User::all();

        $data = 'sssss';

        return view('mk.pages.doc.new', [
            'data' => $data,
            'users' => $users,
        ]);


        return view('mk.pages.doc.new');
    }

    public function create()
    {
        $users = User::all();

        $data = 'sssss';

        return view('mk.pages.doc.new', [
            'data' => $data,
            'users' => $users,
        ]);

        return view('mk.pages.doc.new');
    }


    public function store(Request $request)
    {
        //


        $dateee = date('Y-m-d', strtotime($request->sanasi));



        // return  $dateee;

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
