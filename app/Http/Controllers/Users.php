<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Users extends Controller
{
    //

    public function index(){
        $users = User::paginate(5);
        $numUsers = User::all()->count();
        return view('superAdmin.users', ['users'=>$users, 'userCount' => $numUsers]);
    }

    public function show(){

    }

    public function makeAdmin($user_id){

        $user = User::find($user_id);
        $admin = 2;
        $normal = 3;

        if($user)
        {
            if($user->user_type == 3)
            {
                $user->user_type = $admin;
                $user->save();
                return Redirect::route('users')->with('admin', $user->firstname . ' is now an Admin!');
            }

            if($user->user_type = 2)
            {
                $user->user_type = $normal;
                $user->save();
                return Redirect::route('users')->with('normal', $user->firstname . ' is now a regular user!');
            }
        }

        return Redirect::route('users')->with('error', 'User not found!');
    }
}
