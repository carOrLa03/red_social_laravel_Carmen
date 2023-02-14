<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use Hootlex\Friendships\Models\Friendship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    //me enseña el perfil del amigo que quiero ver
    public function perfilAmigo(Request $request){
        $user_id = $request->input('user_id');
        $user = User::find($user_id);

        $images = Image::where('user_id', '=', $user_id)->get();
        return view('pages.perfilAmigo', ['user'=>$user, 'images'=>$images,]);
    }

    //solicitud de amistad del usuario autenticado, al amigo del perfil visitado
    public function sendFriend($id){

        $userYo = Auth::user(); //me traigo yo
        $friend = User::find($id); //traigo al amigo

        $images = Image::where('user_id', '=', $id)->get();

        //si el usuario autenticado es el mismo al que se le pide la solicitud
        // vuelvo a la vista del perfil del amigo visitado
        if($userYo == $friend){
            return view('pages.perfilAmigo', ['user'=>$friend, 'images'=>$images]);
        }
        //le pido amistad al amigo y una vez pedida la amistad me redirige a mi perfil
        $userYo->befriend($friend);

        return view('pages.perfilAmigo', ['user'=>$friend, 'images'=>$images,]);
    }





}
