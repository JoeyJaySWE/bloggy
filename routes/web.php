<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CreatePostController;
use App\Http\Controllers\EditPostController;
use App\Http\Controllers\DeletePostController;
use App\Http\Controllers\ViewPostsController;

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

//Route::view('/', 'index');
Route::get('/', ViewPostsController::class);

/*Route::get('/', ViewPostsController::class, function () {
    return view('/', 'index');
});*/

Route::get('login', function () {
    return view('login');
})->name('login')->middleware('guest');

Route::post('login', LoginController::class);

Route::get('dashboard', DashboardController::class)->middleware('auth');

Route::post('posts', CreatePostController::class)->middleware('auth');

Route::delete('posts/{post}/delete', DeletePostController::class)->middleware('auth');

Route::patch('posts/{post}/edit', EditPostController::class)->middleware('auth');

Route::get('logout', LogoutController::class);


//Route::get('/login')->name('login')->middleware('guest');
/* Route::view('/', 'index')->name('login')->middleware('guest');
Route::get('home', function () {
    return view('home');
}); */
