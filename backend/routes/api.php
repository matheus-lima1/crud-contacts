<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/login','Api\\AuthController@login');
Route::get('/me','Api\\AuthController@me');
Route::post('/register','Api\\AuthController@register');


Route::get('/','Api\\HomeController@index');
Route::get('/users','Api\\HomeController@users');
Route::resource('/contacts','Api\\ContactController');