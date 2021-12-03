<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'login']);
});


//Route::middleware('guest')->group(function ()
//{
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get('/', [PostController::class, 'index']);
    Route::get('/post/{post:slug}', [PostController::class, 'view']);
//});
