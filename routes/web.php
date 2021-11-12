<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('frontend.index');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/my-profile', [App\Http\Controllers\Frontend\UserController::class, 'myProfile']);
Route::post('/my-profile-update', [App\Http\Controllers\Frontend\UserController::class, 'profileUpdate']);

Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
