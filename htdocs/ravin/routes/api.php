<?php

use Illuminate\Http\Request;
use App\User;
use App\user_profile;
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
Route::post('register', 'API\MasterController@Register');
Route::post('/login', 'API\MasterController@login');
Route::post('/update', 'API\MasterController@update');
Route::post('/logout', 'API\MasterController@logout');