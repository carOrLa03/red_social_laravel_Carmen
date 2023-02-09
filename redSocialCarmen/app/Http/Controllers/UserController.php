<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function gente(){
        $users = User::orderBy('user_name')->get();
        return view('pages.users', ['users'=>$users]);
    }
}
