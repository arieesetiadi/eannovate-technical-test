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
Route::post('/login', 'AuthController@login')->name('login');
Route::get('/logout', 'AuthController@logout')->name('logout');

// Routes-group for authenticated user (admin)
Route::middleware('auth')->group(function () {
    Route::view('/', 'admin.dashboard')->name('dashboard');

    // Students Routes
    Route::post('/student/destroy-many', 'StudentController@destroyMany')->name('student.destroy-many');
    Route::resource('/student', 'StudentController');

    // Class Routes
    Route::prefix('/class')->group(function () {
        Route::get('/', 'ClassController@index')->name('class.index-page');
        Route::post('/', 'ClassController@store')->name('class.store-page');
        Route::get('/create', 'ClassController@create')->name('class.create-page');
        Route::get('/{id}/edit', 'ClassController@edit')->name('class.edit-page');
        Route::delete('/{id}', 'ClassController@destroy')->name('class.destroy-page');
    });
});
