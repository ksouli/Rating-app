<?php

use App\Http\Controllers\Ratings;
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
    return view('goodbye');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/mainpage', [Ratings:: class,'index'])->name("allratings");



Route::any('/userprofile/{userrating}', [Ratings::class,'userprofile'])->name("userprofile");

Route::get('/search', [Ratings:: class,'search'])->name("searchreasults");

Route::group(['middleware' => ['auth']], function() {
    // your routes
    Route::any('/rateuser/{userrating}', [Ratings::class,'rateuser'])->name("rateuser");
});