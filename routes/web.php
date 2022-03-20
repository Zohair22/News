<?php

use App\Http\Controllers\Admin\AdminController;
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

// ******** Admin *******
Route::middleware('guest:admin')->group(function ()
{
    Route::get('/signIn', [AdminController::class, 'create']);
    Route::post('/signIn', [AdminController::class, 'store']);
    Route::post('/signUp', [AdminController::class, 'signup']);
});

Route::middleware('auth:admin')->group(function ()
{
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/logoutAdmin', [AdminController::class, 'logout']);
});

    Route::get('/post/{post:slug}', [PostController::class, 'view']);

// ******** User *******

//Route::middleware(['auth'])->group(function ()
//{
//    Route::get('/post/{post:slug}', [PostController::class, 'view']);
//});

Route::middleware('guest:web')->group(function ()
{
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);

    Route::get('/register', [LoginController::class, 'register']);
    Route::post('/register', [LoginController::class, 'signup']);
});

Route::middleware('auth:web')->group(function ()
{
    Route::get('/', [PostController::class, 'index']);
    Route::post('/new/comment', [CommentController::class, 'create']);
    Route::get('/delete/comment/{comment}', [CommentController::class, 'destroy']);

    Route::get('/logout', [LoginController::class, 'logout']);
});
