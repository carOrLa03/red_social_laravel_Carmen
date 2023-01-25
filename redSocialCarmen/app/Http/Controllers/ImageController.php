<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
//    public function __construct(){
//        $this->middleware('auth');
//    }
    public function form(){
        return view('pages.form');
    }

    public function save_images(Request $request){
        $image_path = $request->file('image');
        $description = $request->input('description');
        $id = Auth::id();

        $image = new Image();
        $image->user_id = $id;
        $image->description = $description;

        if($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('img_red')->put($image_path_name, \Illuminate\Support\Facades\File::get($image_path));
            $image->image_path = $image_path_name;
        }

        $image->save();
        return redirect()->route('dashboard');
    }

    public function showImage(){

        return view('dashboard');
    }
}
