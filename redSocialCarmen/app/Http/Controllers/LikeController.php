<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($id){
        $like = new Like();
        $like->user_id = Auth::id();
        $like->image_id = $id;
        $like->save();
        return redirect()->route('dashboard');

    }

    public function dislike($id){
        $user_id = Auth::id();
        $dislike = Like::where('image_id', $id)
            ->where( 'user_id', $user_id);
        $dislike->delete();
        return redirect()->route('dashboard');
    }

}
