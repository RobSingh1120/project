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
Route::post('register',        				'API\MasterController@Register');
Route::post('login', 		   				'API\MasterController@login');
Route::post('retrive', 		   				'API\MasterController@retrive');
Route::post('laboratory',      				'API\MasterController@laboratory');
Route::post('treatment',       				'API\MasterController@treatment');
Route::post('/update',         				'API\MasterController@update');
Route::post('/changepassword',         		'API\MasterController@changepassword');
Route::post('/forgetpassword',         		'API\MasterController@forgetpassword');
Route::post('/social_media',         	  	'API\MasterController@social_media');
