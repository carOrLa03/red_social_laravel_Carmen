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

    public function perfilAmigo(Request $request){
        $user_id = $request->input('user_id');
        $user = User::find($user_id);

        $images = Image::where('user_id', '=', $user_id)->get();
        $solicitudes = Friendship::where('sender_id', '=', $user->id)
            ->where('status', '=', 0)->get();

        return view('pages.perfilAmigo', [
            'user'=>$user,
            'images'=>$images,
            'solicitudes'=>$solicitudes
        ]);
    }

    public function sendFriend($id){

        $userYo = Auth::user(); //me traigo yo
        $friend = User::find($id); //traigo al amigo

        $images = Image::where('user_id', '=', $id)->get();
        $solicitudes = Friendship::where('sender_id', '=', $userYo->id)
            ->where('status', '=', 0)->get();
        if($userYo == $friend){
            return view('pages.perfilAmigo', ['user'=>$friend, 'images'=>$images]);
        }
        $userYo->befriend($friend); //le pido amistad al amigo y una vez pedida la amistad me redirige a mi perfil
        return view('pages.perfilAmigo', [
            'user'=>$userYo,
            'images'=>$images,
            'solicitudes'=>$solicitudes
        ]);
    }

    public function acceptFriend($id){
        $userYo = Auth::user(); //me traigo yo
        $sender = Friendship::find($id); //traemos el amigo
        $userYo->acceptFriendRequest($sender);

        $images = Image::where('user_id', '=', $id)->get();
        $solicitudes = Friendship::where('sender_id', '=', $userYo->id)
            ->where('status', '=', 0)->get();
        return view('pages.perfilAmigo', [
            'user'=>$userYo,
            'images'=>$images,
            'solicitudes'=>$solicitudes
        ]);
    }

}
