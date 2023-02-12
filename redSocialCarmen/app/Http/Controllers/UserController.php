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

    public function buscador( Request $request){

        $nombre = $request->input('buscar');
        $users = User::where('name','LIKE','%'.$nombre.'%')
            ->orwhere('surname','LIKE','%'.$nombre.'%')
            ->orwhere('user_name','LIKE','%'.$nombre.'%')->get();
        if($users->isEmpty()){
            return $this->gente();
        }
        return view('pages.users', ['users'=>$users]);

    }
}
