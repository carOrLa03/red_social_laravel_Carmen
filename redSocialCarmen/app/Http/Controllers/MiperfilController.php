<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use Carbon\Carbon;
use Hootlex\Friendships\Models\Friendship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MiperfilController extends Controller
{
    //
    public function index(){
        $user= Auth::user();
        $images = Image::all()->where('user_id', '=', $user->id);
        $solicitudesPendientes = $user->getPendingFriendships();
        $amigos = [];

        //recorro el array de solicitudes para buscar el id del usuario y traerme su id y su nombre
        foreach ($solicitudesPendientes as $solicitud){
            $amigo = User::find($solicitud->recipient_id, ['id','name']);
            array_push($amigos, $amigo);

        }
        return view('pages.miperfil', ['user'=>$user, 'images'=>$images, 'solicitudes'=>$amigos ]);
    }

    public function acceptFriend($id)
    {
        $userYo = Auth::user(); //me traigo yo
        $sender = User::find($id); //traemos el amigo con el que quiero amistad
        $userYo->acceptFriendRequest($sender);

        return $this->index();
    }

    public function cancelFriend($id){
        $userYo = Auth::user(); //me traigo yo
        $sender = User::find($id); //traemos el amigo con el que no quiero nada
        $userYo->denyFriendRequest($sender);

        return $this->index();
    }
}
