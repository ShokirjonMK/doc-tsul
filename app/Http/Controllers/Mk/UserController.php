<?php

namespace App\Http\Controllers\Mk;

use App\Http\Controllers\Controller;
use App\Models\Mk\Department;
use App\Models\Mk\Pass;
use App\User;


use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::where('role', 555)->get();
        return view('mk.pages.user.index', [
            'data' => $user
        ]);
    }
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        // return $user;
        $Department = Department::where('status', 1)->get();
        return view('mk.pages.user.show', [
            'data' => $user,
            'department' => $Department,
        ]);
    }

    public function create()
    {
        // $date = date("Y-m-d");
        $Department = Department::where('status', 1)->get();

        // return $nationalities;
        return view('mk.pages.user.create_', [
            'department' => $Department,
        ]);
    }

    // userstore 
    public function store(Request $request)
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
        $new_user->phone = $request->phone;


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

        return redirect()->route('user.index')->with('success', 'Xodim qo`shildi');
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        // return $user;
        $Department = Department::where('status', 1)->get();
        return view('mk.pages.user.edit', [
            'data' => $user,
            'department' => $Department,
        ]);
    }


    public function update(Request $request, $user)
    {
        // return $request;

        $userrrr = User::find($user);

        $userrrr->last_name = $request->last_name;
        $userrrr->first_name = $request->first_name;
        $userrrr->middle_name = $request->middle_name;
        $userrrr->phone = $request->phone;

        $userrrr->department_id = $request->department;
        $userrrr->position = $request->position;
        $userrrr->username = $request->username;
        if ($request->password) {
            $userrrr->password = Hash::make($request->password);
        }

        $userrrr->updated_by = Auth::user()->id;
        if ($userrrr->update()) {
            $pass = Pass::where('user_id', $userrrr->id)->first();

            $pass->user_id = $userrrr->id;
            $pass->username = $userrrr->username;
            if ($request->password) {
                $pass->password = $request->password;
            }
            $pass->updated_by = Auth::user()->id;
            $pass->update();
            return redirect()->route('user.index')->with('success', 'Ma`lumot o`zgartirildi');
        }
        return $user;
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
