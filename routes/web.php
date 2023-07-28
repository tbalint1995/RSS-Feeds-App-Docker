<?php

use App\Http\Controllers\ChannelController;
use App\Http\Controllers\UserController;
use App\Models\RssChannel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('guest.login');
})->name('guest.login');

Route::post('/login', [UserController::class, 'login'])->name('guest.login.post');



Route::get('/register', function () {
    return view('guest.register');
})->name('guest.register');

Route::post('/register', [UserController::class, 'register'])->name('guest.register.post');

 

Route::get('/profile', function () {
    return view('user.profile');
})->name('user.profile');


Route::get('/logout', function () {
    Session::flush(); 
    Auth::logout();
    return redirect()->route('home');
})->name('user.logout');

require_once(__DIR__.'/rss_channels.php');

require_once(__DIR__.'/rss_news.php');

// Route::post('/password-forgotten', [UserController::class, 'passwordForgotten'])->name('post.password-forgotten');


// Route::get('/reset-password/{token}', function (string $token) {
//     return view('reset-password', ['token' => $token]);
// })->name('password.reset');
