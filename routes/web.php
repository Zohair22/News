<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
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

git add .
git commit -m "existing file"
git push

*/
Route::middleware('guest')->group(function ()
{
    Route::get('/login', [LoginController::class, 'create']);
    Route::post('/login', [LoginController::class, 'store']);

    Route::get('/register', [LoginController::class, 'register']);
    Route::post('/register', [LoginController::class, 'signup']);
});



Route::get('/', [PostController::class, 'index']);
Route::get('/post/{post:slug}', [PostController::class, 'view']);
Route::post('/new/comment', [CommentController::class, 'create']);

Route::get('/delete/comment/{comment}', [CommentController::class, 'destroy']);

Route::middleware('auth')->group(function ()
{
    Route::get('/logout', [LoginController::class, 'logout']);
});
