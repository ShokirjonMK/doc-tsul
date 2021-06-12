<?php

namespace App\Http\Controllers\Mk;

use App\Http\Controllers\Controller;
use App\Models\Mk\Department;
use App\Models\Mk\Doc;
use App\Models\Mk\Pass;
use App\Models\Mk\Releted;
use App\Models\Mk\Supervisor;
use App\User;


use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $now_user = User::find(Auth::id());
        // return $now_user;
        if ($now_user->role == 555) {
            return redirect()->route('mk.doc.mydoc');
        }

        $users = User::where(['status' => 1])->where('role', 555)->get();
        $releted = Releted::where(['status' => 1])->get();
        $supervisor = Supervisor::where(['status' => 1])->get();

        $data = 'sssss';

        $now_user = User::find(Auth::id());
        // return $now_user;
        if ($now_user->role == 555) {
            return back()->with('validate', 'a');
        }

        $doc = Doc::all();
        $faol = Doc::where('status', 1)->count();
        $yakunlangan = Doc::where('status', 0)->count();
        $doimiy = Doc::where('duration', 0)->count();
        $muddatli = Doc::where('duration', 1)->count();
        $kengash = Doc::where('type', 0)->count();
        $buyruq = Doc::where('type', 1)->count();
        $doimiy_f = 100 * $doimiy / $doc->count();
        $faol_f = 100 * $faol / $doc->count();
        $yakunlangan_f = 100 * $yakunlangan / $doc->count();
        $buyruq_f = 100 * $buyruq / $doc->count();

        // return $doc;
        return view('mk.pages.main', [
            // 'count' => $doc->count(),
            'data' => $data,
            'buyruq' => $buyruq,
            'kengash' => $kengash,
            'muddatli' => $muddatli,
            'yakunlangan' => $yakunlangan,
            'doimiy' => $doimiy,
            'doimiy_f' => $doimiy_f,
            'yakunlangan_f' => $yakunlangan_f,
            'buyruq_f' => $buyruq_f,
            'faol_f' => $faol_f,
            'faol' => $faol,
            'users' => $users,
            'releted' => $releted,
            'supervisor' => $supervisor,
            'doc' => $doc
        ]);
    }
    public function userindex()
    {
        $user = User::where('role', 555)->get();
        return view('mk.pages.user.index', [
            'data' => $user
        ]);
    }
    public function usershow($id)
    {
        $user = User::where('id', $id)->first();
        // return $user;
        $Department = Department::where('status', 1)->get();
        return view('mk.pages.user.show', [
            'data' => $user,
            'department' => $Department,
        ]);
    }

    public function usercreate()
    {
        // $date = date("Y-m-d");
        $Department = Department::where('status', 1)->get();

        // return $nationalities;
        return view('mk.pages.user.create_', [
            'department' => $Department,
        ]);
    }

    // userstore 
    public function userstore(Request $request)
    {
        $input = $request->all();
        // return $request;

        $validator = Validator::make($input, [
            'last_name'                 => ['required', 'max:255', 'string'],
            'first_name'               => ['required'],
            'middle_name'             => ['required'],
            // 'phone'             => ['required'],
            // 'department'             => ['required'],
            // 'position'             => ['required'],

            // 'username'             => ['required'],
            // 'password'             => ['required'],

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('validate', 'a');
        }

        $new_user = new User();
        $new_user->last_name = $request->last_name;
        $new_user->first_name = $request->first_name;
        $new_user->middle_name = $request->middle_name;
        $new_user->department_id = $request->department;
        $new_user->position = $request->position;


        $password = $this->randomPassword_alpha(4) . $this->randomPassword_number(4);
        $tb = 1;
        while ($tb) {
            $ran_un = $this->randomPassword_alpha(3) . date('s') . date('i') . date('d');
            if (!User::where('username', $ran_un)->exists()) {
                $tb = 0;
            }
        }
        $username = $ran_un;


        $new_user->username = $username;
        $new_user->password = Hash::make($password);

        $new_user->role = 555;
        $new_user->status = 1;
        $new_user->save();


        $pass = new Pass();
        $pass->user_id = $new_user->id;
        $pass->username = $new_user->username;
        $pass->password = $password;
        $pass->save();

        return redirect()->route('mk.user.index')->with('success', 'Xodim qo`shildi');
    }

    public function useredit($id)
    {
        $user = User::where('id', $id)->first();
        // return $user;
        $Department = Department::where('status', 1)->get();
        return view('mk.pages.user.edit', [
            'data' => $user,
            'department' => $Department,
        ]);
    }


    public function update(Request $request, $id)
    {
        //
    }



    public function randomPassword_number($count)
    {
        $alphabet = '23456789';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < $count; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public function randomPassword_alpha($count)
    {
        $alphabet = 'abcdefghjkmnpqrstuvwxyz';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < $count; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
}
