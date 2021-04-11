<?php

namespace App\Http\Controllers\Mk;

use App\Http\Controllers\Controller;
use App\Models\Mk\Doc;
use App\User;
use Dotenv\Validator;
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
        $input = $request->all();

        $validator = Validator::make($input, [

            'name'               => ['required', 'max:255', 'string'],
            'raqami'                => ['required'],
            'sanasi'               => ['required'],
            'users'                => ['required'],
            'word_all'                  => ['required'],
            'document'              => 'required|mimes:pdf|max:5000',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'a');
        }

        $new_doc = new Doc();

        $new_doc->name = $request->name;
        $new_doc->number = $request->number;
        $new_doc->end_date = $request->end_date;
        $new_doc->word = $request->word_all;


        if ($request->file('document')) {
            $new_doc->document = 'data:application/pdf;base64,' . base64_encode(file_get_contents($request->file('document')));
        }

        $path_name = '';
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $name = $this->randomPassword_alpha(10) . date('-m-d');
            $ext = $file->getClientOriginalExtension();
            $full_name = $name . '.' . $ext;
            $path_name = '/documents/' . $full_name;
            $file->move($this->files_saving_path() . '/documents/', $full_name);
        }
        $new_doc->document = $path_name;



        $new_doc->name = $request->name;
        $new_doc->name = $request->name;


        $dateee = date('Y-m-d', strtotime($request->sanasi));

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
