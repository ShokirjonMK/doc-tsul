<?php

namespace App\Http\Controllers\Mk;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Mk\Doc;
use App\Models\Mk\Files;
use League\CommonMark\Block\Element\Document;

// use App\Models\Mk\Files;


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
            'name'                 => ['required', 'max:255', 'string'],
            'number'               => ['required'],
            'end_date'             => ['required'],
            // 'users'                => ['required'],
            'word_all'             => ['required'],
            'document'             => 'required|mimes:pdf|max:5000',
        ]);

        /*       if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('validate', 'a');
        }

        */
        // return $request->file('document');
        $new_doc = new Doc();

        $new_doc->status = $request->status;
        $new_doc->name = $request->name;
        $new_doc->number = $request->number;

        $request->end_date = date('Y-m-d', strtotime($request->end_date));

        $new_doc->end_date = $request->end_date;
        $new_doc->word_all = $request->word_all;
        $new_doc->users = $request->users;
        $new_doc->created_by = Auth::id();

        // if ($request->file('document')) {
        //     $new_doc->document = 'data:application/pdf;base64,' . base64_encode(file_get_contents($request->file('document')));
        // }

        if ($request->hasFile('document')) {
            $fileName = time() . '.' . $request->document->extension();
            $request->document->move(public_path('doc/document'), $fileName);
        }

        // if (is_array($request->users)) {
        //     foreach ($$request->users as $key => $value) {
        //     }
        // }

        $end_date = date('Y-m-d', strtotime($request->end_date));

        if ($new_doc->save()) {
            if ($request->file('document')) {
                $new_file = new Files();
                // $new_file->file = 'data:application/pdf;base64,' . base64_encode(file_get_contents($request->file('document')));

                $new_file->file = 'data:application/pdf;base64,' . base64_encode(file_get_contents($request->file('document')));

                $new_file->document_id = $new_doc->id;
                $new_file->status = $request->status;
                $new_file->created_by = Auth::id();
                $new_file->save();
            }
            return $new_file->file;

            $sss = [];
            if (is_array($request->users)) {
                foreach ($request->users as $key => $value) {
                    $sss['val'] = $value;
                    $sss['key'] = $key;
                }
            }

            return $sss;
        }


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
