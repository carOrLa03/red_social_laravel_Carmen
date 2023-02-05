<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MiperfilController extends Controller
{
    //
    public function index(){
        $user_id = Auth::id();
        $images = Image::all()->where('user_id', '=', $user_id);

        return view('pages.miperfil', ['images'=>$images]);
    }
}
