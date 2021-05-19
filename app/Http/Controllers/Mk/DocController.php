<?php

namespace App\Http\Controllers\Mk;

use App\Http\Controllers\Controller;
use App\Models\Mk\Attached;
use App\Models\Mk\AttachPart;
use Illuminate\Support\Facades\Auth;
use App\User;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Mk\Doc;
use App\Models\Mk\Files;
use App\Models\Mk\Releted;
use App\Models\Mk\Supervisor;
use Dompdf\Adapter\PDFLib;
use League\CommonMark\Block\Element\Document;


use PDF;
// use App\Models\Mk\Files;


class DocController extends Controller
{

    public function index()
    {
        $users = User::all();

        $data = Doc::orderBy('end_date', 'DESC')->get();

        return view('mk.pages.doc.index', [
            'data' => $data,
        ]);
    }
    public function mydoc()
    {
        $users = User::all();

        $data = AttachPart::where('user_id', Auth::id())->orderBy('end_date', 'DESC')->get();


        return view('mk.pages.doc.mydoc', [
            'data' => $data,
        ]);
    }
    public function myshow($id)
    {
        // return $doc->document;
        $doc = Doc::find($id);

        $attached = AttachPart::where(['document_id' => $id])
            ->where('user_id', Auth::id())
            // ->where(['with_file' => 1])
            ->first();

        // $attached_without = AttachPart::where(['document_id' => $id])
        //     ->where(['with_file' => 0])->get();

        // $attached = AttachPart::where(['document_id' => $id])
        //     ->where('user_id', Auth::id())
        //     ->orderBy('end_date')
        //     // ->orderBy('user_id', 'desc')
        //     ->get();
        if ($attached) {


            return view("mk.pages.doc.myshow", [
                'data' => $doc,
                // 'attached_with' => $attached_with,
                'attached' => $attached,
                // 'attached_without' => $attached_without,
                'status' => 1,
            ]);
        } else {
            return redirect()->route('mk.doc.mydoc')->with('validate', 'a');
        }
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
        $users = User::where(['status' => 1])->where('role', 555)->get();
        $releted = Releted::where(['status' => 1])->get();
        $Supervisor = Supervisor::where(['status' => 1])->get();

        $data = 'sssss';

        $now_user = User::find(Auth::id());
        // return $now_user;
        if ($now_user->role == 555) {
            return back()->with('validate', 'a');
        }
        return view('mk.pages.doc.new', [
            'data' => $data,
            'users' => $users,
            'releted' => $releted,
            'supervisor' => $Supervisor,
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
            'type'                 => ['required'],
            'duration'                 => ['required'],
            'supervisor_id'                 => ['required'],
            'releted_id'                 => ['required'],
            // 'supervisor_id'                 => ['required'],


            'document'             => 'required|mimes:pdf|max:5000',
        ]);

        // return $request;

        // return $request->user;
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('validate', 'a');
        }

        $new_doc = new Doc();

        $new_doc->status = $request->status;
        $new_doc->name = $request->name;
        $new_doc->type = $request->type;
        $new_doc->number = $request->number;
        $new_doc->releted_id = $request->releted_id;
        $new_doc->supervisor_id = $request->supervisor_id;
        $new_doc->duration = $request->duration;

        $request->end_date = date('Y-m-d', strtotime($request->end_date));

        $new_doc->end_date = $request->end_date;
        $new_doc->word_all = $request->word_all;

        $new_doc->users = json_encode($request->users);
        $new_doc->created_by = Auth::id();
        if ($request->user_all == 'on') {
            $new_doc->user_all = 1;
        } else {
            $new_doc->user_all = 0;
        }

        // if ($request->file('document')) {
        //     $new_doc->document = 'data:application/pdf;base64,' . base64_encode(file_get_contents($request->file('document')));
        // }

        if ($request->hasFile('document')) {
            $pdf_word_all = PDF::loadHTML($request->word_all);
            $fileName = base64_encode(time() . $request->name) . '_' . time() . '.' . $request->document->extension();

            $pdf_word_all->save('doc/generatedpdf/' . $fileName);

            $request->document->move(public_path('doc/document'), $fileName);
            $new_doc->document = 'doc/document/' . $fileName;
            $new_doc->generatedpdf = 'doc/generatedpdf/' . $fileName;
        }

        // if (is_array($request->users)) {
        //     foreach ($$request->users as $key => $value) {
        //     }
        // }

        // $end_date = date('Y-m-d', strtotime($request->end_date));

        if ($new_doc->save()) {
            // if ($request->file('document')) {
            //     $new_file = new Files();
            //     $new_file->file = 'data:application/pdf;base64,' . base64_encode(file_get_contents($request->file('document')));
            //     $new_file->document_id = $new_doc->id;
            //     $new_file->status = $request->status;
            //     $new_file->created_by = Auth::id();
            //     $new_file->save();
            // }
            // return $new_file->file;

            // $sss = [];
            if (is_array($request->users)) {
                foreach ($request->users as $key => $value) {
                    // $sss['val'][] = $value;
                    // $sss['key'][] = $key;
                    $new_attached = new Attached();
                    $new_attached->document_id = $new_doc->id;
                    $new_attached->user_id = $value;
                    $new_attached->end_date = $request->end_date;
                    $new_attached->status = $request->status;
                    $new_attached->created_by = Auth::id();
                    $new_attached->save();
                }
            }
            if (is_array($request->users) && is_array($request->user)) {

                $rrrr = array_diff($request->users, $request->user);

                if (is_array($rrrr)) {
                    foreach ($rrrr as $key => $value) {
                        // $sss['val'][] = $value;
                        // $sss['key'][] = $key;
                        $new_attach_part = new AttachPart();

                        $new_attach_part->user_id = $value;
                        $new_attach_part->document_id = $new_doc->id;
                        $new_attach_part->end_date = $request->end_date;
                        $new_attach_part->with_file = 0;
                        $new_attach_part->status = $request->status;
                        $new_attach_part->created_by = Auth::id();
                        $new_attach_part->save();
                    }
                }
            }

            // return $sss;


            if (is_array($request->user)) {
                foreach ($request->user as $key => $user_id) {
                    $new_attach_part = new AttachPart();
                    $new_attach_part->user_id = $user_id;
                    $new_attach_part->with_file = 1;
                    $new_attach_part->document_id = $new_doc->id;
                    $new_attach_part->word = $request->word[$key];
                    if ($request->sana[$key] != null) {
                        $new_attach_part->end_date = date('Y-m-d', strtotime($request->sana[$key]));
                    } else {
                        $new_attach_part->end_date = date('Y-m-d', strtotime($request->end_date));
                    }
                    $new_attach_part->status = $request->status;
                    $new_attach_part->created_by = Auth::id();

                    if ($new_attach_part->word) {
                        $pdf = PDF::loadHTML($new_attach_part->word);
                        $fileName = $user_id . '_' . $new_doc->id . '_' .  $new_attach_part->end_date . '_' . time() . '.pdf';
                        $new_attach_part->document = 'doc/sub_document/' . $fileName;
                        $pdf->save('doc/sub_document/' . $fileName);
                    }

                    $new_attach_part->save();
                    // return $pdf->download('invoice.pdf');
                }
            }

            if ($new_doc->user_all == 1) {
                $users = User::select('id')->get();



                foreach ($users as $key => $user) {
                    $is_aldeady_recorded = AttachPart::where(['document_id' => $new_doc->id])
                        ->where(['user_id' => $user->id])
                        ->where(['with_file' => 1])
                        ->where(['status' => $request->status])
                        ->first();

                    if (!$is_aldeady_recorded) {

                        $new_attach_part = new AttachPart();
                        $new_attach_part->user_id = $user->id;
                        $new_attach_part->document_id = $new_doc->id;
                        $new_attach_part->end_date = $request->end_date;
                        $new_attach_part->with_file = 0;
                        $new_attach_part->status = $request->status;
                        $new_attach_part->created_by = Auth::id();
                        $new_attach_part->save();
                    }
                }
            }
            // return $sss;
        }
        return redirect()->route('doc.show', $new_doc->id)->with('success', 'aa');
        // return $request;
    }


    public function show(Doc $doc)
    {
        // return $doc->document;
        // $dd = Doc::find('id', $doc);

        // return $dd;

        $attached_with = AttachPart::where(['document_id' => $doc->id])
            ->where(['with_file' => 1])->get();

        $attached_without = AttachPart::where(['document_id' => $doc->id])
            ->where(['with_file' => 0])->get();

        $attached = AttachPart::where(['document_id' => $doc->id])
            ->orderBy('end_date')
            // ->orderBy('user_id', 'desc')
            ->get();

        return view("mk.pages.doc.show", [
            'data' => $doc,
            'attached' => $attached,
            'attached_with' => $attached_with,
            'attached_without' => $attached_without,
            'status' => 1,
        ]);
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
