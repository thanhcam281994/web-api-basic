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


Route::post('auth/login', 'Auth\AuthController@login');

Route::group(['middleware' => 'jwt_auth'], function () {
    Route::get('auth/user', 'Api\UserController@show');
    Route::put('users/{email}', 'Api\UserController@update');
    Route::post('auth/logout', 'Auth\AuthController@logout');
//    Route::get('auth/refresh', 'Auth\AuthController@refresh');
});
