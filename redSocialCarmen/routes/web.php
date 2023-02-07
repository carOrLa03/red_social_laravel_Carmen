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

        Route::get('form', [\App\Http\Controllers\ImageController::class, 'form'])->name('form');
        Route::post('save_images', [\App\Http\Controllers\ImageController::class, 'save_images'])->name('save_images');
        Route::get('/{id}', [\App\Http\Controllers\ImageController::class, 'showImage'])->name('showImage');

        Route::get('like/{id}', [\App\Http\Controllers\LikeController::class, 'like'])->name('like');
        Route::delete('dislike/{id}', [\App\Http\Controllers\LikeController::class, 'dislike'])->name('dislike');
//        Route::post('like', [\App\Http\Controllers\LikeController::class, 'like'])->name('like');

        Route::post('store', [\App\Http\Controllers\CommentsController::class, 'store'])->name('store');
        Route::delete('/{id}', [\App\Http\Controllers\CommentsController::class, 'destroy'])->name('destroy');



    });

    });
