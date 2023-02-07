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

//    public function like(Request $request){
//        $like = new Like();
//        $like->user_id = Auth::id();
//        $like->image_id = $request->input('image_id');
//        $saved = $like->save();
//
//        $data['success'] = $saved;
//        return redirect()->route('dashboard', ['data'=>$data]);
//
//    }
    public function dislike(){}
}
