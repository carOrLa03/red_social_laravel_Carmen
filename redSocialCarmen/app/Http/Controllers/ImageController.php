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
        $user = \Auth::user();
        $id = Auth::id();

        $image = new Image();
        $image->user_id = $id;
        $image->description = $description;

        if($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            Storage::disk('image')->put($image_path_name, File::get($image_path));
        }

        $image->save();
        return redirect()->route('pages.showImages');
    }

    public function showImage(){
        return view('pages.showImages');
    }
}
