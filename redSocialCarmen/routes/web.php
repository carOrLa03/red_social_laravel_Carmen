<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    $images = \App\Models\Image::all();
//
//    foreach ($images as $image){
//        echo "<img src='$image->image_path' alt=''> <br>";
//        echo $image->image_path . "<br>";
//        echo $image->description . "<br>";
//        echo $image->user->name . ' '. $image->user->surname;
//        echo "<br>";
//
//        echo "<h2>Comments</h2> <br>";
//        $comments = \App\Models\Comment::all()->where('image_id', '=', $image->id);
//        $likes =count(\App\Models\Like::all()->where('image_id', '=', $image->id));
//
//        foreach ($comments as $comment){
//            echo $comment->content;
//        }
//        echo '<h3>Likes: </h3>' . $likes . '<br>';
//        echo '<hr>';
//    }
//
//
//    die();
//    return view('welcome');
//
//});

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('', [\App\Http\Controllers\WelcomeController::class, 'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::prefix('dashboard')->group(function(){
        Route::get('', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
        });
    Route::prefix('user')->group(function(){
        Route::get('show',function(){
            return view('profile.show');
        })->name('show');
        Route::get('form', [\App\Http\Controllers\ImageController::class, 'form'])->name('form');
        Route::post('save_images', [\App\Http\Controllers\ImageController::class, 'save_images'])->name('save_images');
        Route::get('showImages', [\App\Http\Controllers\ImageController::class, 'showImage'])->name('showImages');

    });
    });
