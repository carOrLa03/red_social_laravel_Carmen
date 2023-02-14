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

Route::get('', [\App\Http\Controllers\WelcomeController::class, 'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::prefix('dashboard')->group(function(){
        Route::get('', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
        Route::get('miperfil', [\App\Http\Controllers\MiperfilController::class, 'index'])->name('miperfil');


        Route::get('users', [\App\Http\Controllers\UserController::class, 'gente'])->name('users');
        Route::post('buscador', [\App\Http\Controllers\UserController::class, 'buscador'])->name('buscador');
        Route::post('perfilAmigo', [\App\Http\Controllers\UserController::class, 'perfilAmigo'])->name('perfilAmigo');
        Route::get('sendFriend/{id}', [\App\Http\Controllers\UserController::class, 'sendFriend'])->name('sendFriend');
        Route::get('acceptFriend/{id}', [\App\Http\Controllers\UserController::class, 'acceptFriend'])->name('acceptFriend');


        Route::get('form', [\App\Http\Controllers\ImageController::class, 'form'])->name('form');
        Route::post('save_images', [\App\Http\Controllers\ImageController::class, 'save_images'])->name('save_images');
        Route::get('/{id}', [\App\Http\Controllers\ImageController::class, 'showImage'])->name('showImage');

        Route::get('like/{id}', [\App\Http\Controllers\LikeController::class, 'like'])->name('like');
        Route::get('dislike/{id}', [\App\Http\Controllers\LikeController::class, 'dislike'])->name('dislike');
//        Route::get('tieneLike/{id}', [\App\Http\Controllers\LikeController::class, 'tieneLike'])->name('tieneLike');


        Route::post('store', [\App\Http\Controllers\CommentsController::class, 'store'])->name('store');
        Route::delete('/{id}', [\App\Http\Controllers\CommentsController::class, 'destroy'])->name('destroy');



    });

    });
