<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Mobile Routes
Route::prefix('/mobile')->group(function () {
    // Login Route
    Route::post('/login', 'API\AuthController@login');

    // Student Routes
    Route::prefix('/student')->group(function () {
        Route::get('/');
    });
});

// Class API Routes
Route::prefix('/class')->group(function () {
    Route::get('/', 'API\ClassController@index');
    Route::post('/', 'API\ClassController@store');
    Route::put('/', 'API\ClassController@update');
    Route::delete('/{id}', 'API\ClassController@destroy');
});
