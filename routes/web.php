<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
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

Route::post('newsletter', NewsLetterController::class);

Route::get('/', [PostController::class, 'index']);
 
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store'])->middleware('auth');

Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::post('follow', [FollowController::class, 'store'])->middleware('auth');
Route::delete('follow/{follow}', [FollowController::class, 'destroy'])->middleware('auth');

Route::middleware(['guest'])->group( function(){    

    Route::get('register', [RegisterController::class, 'create']);
    Route::post('register', [RegisterController::class, 'store']);
    Route::get('login', [SessionController::class, 'create']);
    Route::post('login', [SessionController::class, 'store']);
});

Route::middleware(['can:admin'])->group( function(){

    Route::get('/admin/posts/create', [AdminController::class, 'create']);
    Route::post('/admin/posts', [AdminController::class, 'store']);
    Route::get('/admin/posts', [AdminController::class, 'index']);
    Route::get('/admin/posts/{post}/edit', [AdminController::class, 'edit']);
    Route::patch('/admin/posts/{post}', [AdminController::class, 'update']);
    Route::delete('/admin/posts/{post}', [AdminController::class, 'destroy']);
});
