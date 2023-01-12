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

// Auth Routes
Route::view('/login', 'login')->middleware('guest')->name('login');
Route::post('/login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout');

Route::get('/', function () {
    return view('admin.dashboard');
})->middleware('auth');
