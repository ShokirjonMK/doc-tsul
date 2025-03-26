<?php

namespace App\Http\Controllers\Mk;

use App\Http\Controllers\Controller;
use App\Models\Mk\Attached;
use App\Models\Mk\AttachPart;
use App\Models\Mk\Comment;
use Illuminate\Support\Facades\Auth;
use App\User;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App\Models\Mk\DocCom;
use App\Models\Mk\Files;
use App\Models\Mk\Releted;
use App\Models\Mk\Supervisor;
use Dompdf\Adapter\PDFLib;
use League\CommonMark\Block\Element\Document;


use PDF;
// use App\Models\Mk\Files;

class DocComController extends Controller
{
    public function index()
    {
        $users = User::all();

        $data = DocCom::orderBy('id', 'DESC')->get();

        //        $data = Doc::orderBy('end_date', 'DESC')->get();

        return view('mk.pages.doccom.index', [
            'data' => $data,
        ]);
    }

    public function mydoc()
    {
        $users = User::all();

        $data = AttachPart::where('user_id', Auth::id())->orderBy('end_date', 'DESC')->get();

        return view('mk.pages.doccom.mydoc', [
            'data' => $data,
        ]);
    }

    public function myshow($id)
    {
        // return $doc->document;
        $doc = DocCom::find($id);

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

            return view("mk.pages.doccom.myshow", [
                'data' => $doc,
                // 'attached_with' => $attached_with,
                'attached' => $attached,
                // 'attached_without' => $attached_without,
                'status' => 1,
            ]);
        } else {
            return redirect()->route('mk.doccom.mydoc')->with('validate', 'a');
        }
    }

    public function new()
    {
        $users = User::all();

        $data = 'sssss';

        return view('mk.pages.doccom.new', [
            'data' => $data,
            'users' => $users,
        ]);

        return view('mk.pages.doccom.new');
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
        return view('mk.pages.doccom.new', [
            'data' => $data,
            'users' => $users,
            'releted' => $releted,
            'supervisor' => $Supervisor,
        ]);

        return view('mk.pages.doccom.new');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        // return $request;
        // return $request->file('document');

        $validator = Validator::make($input, [
            'name'                 => ['required', 'max:255', 'string'],
            'number'               => ['required'],
            'end_date'             => ['required'],
            'word_all'             => ['required'],
            'type'                 => ['required'],
            'duration'             => ['required'],
            'supervisor_id'        => ['required'],
            'releted_id'           => ['required'],
            'document'             => ['required', 'max:18384'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('validate', 'a');
        }
        $new_doc_com = new DocCom();

        $new_doc_com->status = $request->status;
        $new_doc_com->name = $request->name;
        $new_doc_com->type = $request->type;
        $new_doc_com->number = $request->number;
        $new_doc_com->releted_id = $request->releted_id;
        $new_doc_com->supervisor_id = $request->supervisor_id;
        $new_doc_com->duration = $request->duration;

        $request->end_date = date('Y-m-d', strtotime($request->end_date));

        $new_doc_com->end_date = $request->end_date;
        $new_doc_com->word_all = $request->word_all;

        $new_doc_com->users = json_encode($request->users);
        $new_doc_com->created_by = Auth::id();
        if ($request->user_all == 'on') {
            $new_doc_com->user_all = 1;
        } else {
            $new_doc_com->user_all = 0;
        }

        if ($request->hasFile('document')) {
            $fileName = ('mk' . '_doc_' . time()) . '.' . $request->document->extension();
            $request->document->move(public_path('doc/comment'), $fileName);
            $new_doc_com->document = 'doc/comment/' . $fileName;
        }

        if ($new_doc_com->save()) {
            return redirect()->route('doc-com.show', $new_doc_com->id)->with('success', 'aa');
        } else {
            redirect()->back()->with('validate', 'aa');
        }
        // return $request;
    }

    public function show(DocCom $doc, $id)
    {
        $doc = DocCom::find($id);

        $comment = Comment::where('doc_com_id', $id)->where('user_id', auth()->user()->id)->first();
        $comments = Comment::where('doc_com_id', $id)->get();

        return view("mk.pages.doccom.show", [
            'data' => $doc,
            'comment' => $comment,
            'comments' => $comments
        ]);
    }

    //comment saqlash
    public function comment(Request $request)
    {
        // return $request;
        $doc_com = DocCom::find($request->id);

        if (isset($doc_com)) {
            $old_comment = Comment::where('doc_com_id', $doc_com->id)->where('user_id', auth()->user()->id)->first();
            if (isset($old_comment)) {
                $old_comment->comment = $request->comment;
                $old_comment->update();
                return redirect()->back()->with('comment', "aaa");
            } else {
                $new_comment = new Comment();
                $new_comment->doc_com_id = $doc_com->id;
                $new_comment->comment = $request->comment;
                $new_comment->user_id = auth()->user()->id;
                $new_comment->status = 1;
                $new_comment->created_by = auth()->user()->id;
                if ($new_comment->save()) {
                    return redirect()->back()->with('comment', "aaa");
                } else {
                    return redirect()->back()->with('error', "aaa");
                }
            }
        } else {
            return redirect()->back()->with('error', "aaa");
        }

        return 1;
    }

    public function allcomments($id)
    {
        $doc_com = DocCom::find($id);

        if (isset($doc_com)) {
            $comments = Comment::where('doc_com_id', $doc_com->id)->get();

            return view("mk.pages.doccom.allcomment", [
                'data' => $doc_com,
                'comments' => $comments
            ]);
        } else {
            return redirect()->back()->with('error', "aaa");
        }

        return $id;
    }


    public function edit(DocCom $doc)
    {
        //ss
    }


    public function update(Request $request, DocCom $doc)
    {
        //
    }


    public function destroy(DocCom $doc)
    {
        //
    }

    public function search(Request $request)
    {
        // return $request;

        $data = DB::table('doc_document as doc')
            ->leftJoin('doc_releted as rel', function ($join) {
                $join->on('rel.id', 'doc.releted_id');
            })
            ->leftJoin('doc_supervisor as sup', function ($join) {
                $join->on('sup.id', 'doc.supervisor_id');
            })
            ->where(function ($query) use ($request) {
                if ($request->search != '') {
                    $query->where('doc.word_all', 'LIKE', '%' . $request->search . '%');
                    $query->orWhere('doc.name', 'LIKE', '%' . $request->search . '%');
                }
            })
            ->select(
                'doc.id',
                'rel.name as releted',
                'doc.name',
                'doc.number',
                'doc.end_date',
                'doc.status',
                'doc.type',
                'doc.document',
                'doc.duration',
                'sup.name as supervisor',
            )
            ->orderBy('doc.id', 'DESC')
            ->get();
        // return $data;

        return view('mk.pages.doccom.search', [
            'data' => $data,
            'search' => $request->search,
            'status' => 1
        ]);
    }

    public function mk_search(Request $request)
    {

        $var = explode('-', $request->date_range);
        $convert_date = [];

        $convert_date['date1'] = date('Y-m-d', strtotime($var[0]));
        if (isset($var[1])) {
            $convert_date['date2'] = date('Y-m-d', strtotime($var[1]));
            $convert_date['date_status'] = 1;
        } else {
            $convert_date['date2'] = 'yoq';
            $convert_date['date_status'] = 0;
        }
        // return $request;
        // return $convert_date;
        $data = DB::table('doc_document as doc')
            ->leftJoin('doc_releted as rel', function ($join) {
                $join->on('rel.id', 'doc.releted_id');
            })
            ->leftJoin('doc_supervisor as sup', function ($join) {
                $join->on('sup.id', 'doc.supervisor_id');
            })
            ->where(function ($query) use ($request, $convert_date) {
                if ($request->name != '') {
                    $query->orWhere('doc.name', 'LIKE', '%' . $request->name . '%');
                }
                if ($request->word_all != '') {
                    $query->where('doc.word_all', 'LIKE', '%' . $request->word_all . '%');
                }
                if ($request->number != '') {
                    $query->where('doc.number', 'LIKE', '%' . $request->number . '%');
                }
                if ($request->supervisor_id != 0) {
                    $query->where('doc.supervisor_id', $request->supervisor_id);
                }
                if ($request->releted_id != 0) {
                    $query->where('doc.releted_id', $request->releted_id);
                }
                if ($request->type != 2) {
                    $query->where('doc.type', $request->type);
                }
                if ($request->duration != 2) {
                    $query->where('doc.duration', $request->duration);
                }
                if ($request->status != 2) {
                    $query->where('doc.status', $request->status);
                }
                if ($request->date_range != '') {
                    $query->where('doc.end_date', '>=', $convert_date['date1']);
                    if ($convert_date['date_status']) {
                        $query->where('doc.end_date', '<=', $convert_date['date2']);
                    }
                }
            })
            ->select(
                'doc.id',
                'rel.name as releted',
                'doc.name',
                'doc.number',
                'doc.end_date',
                'doc.status',
                'doc.type',
                'doc.document',
                'doc.duration',
                'sup.name as supervisor',

            )
            // ->orderBy('doc.id', 'DESC')
            ->orderBy('doc.number', 'DESC')
            ->get();
        // return $data;

        return view('mk.pages.doccom.search', [
            'data' => $data,
            'search' => 'Asosiy filter',
            'status' => 1
        ]);
    }
}
