<?php

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
    return view('welcome');
});

Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');*/

Route::get('logout', 'HomeController@logout')->name('logoutuser');

Route::get('/home', 'HomeController@view')->name('logoutuser');


Auth::routes();
Route::get('/home', 'HomeController@showdash')->name('dash');

Route::get('/useradd', 'HomeController@show')->name('useradd');
Route::get('/userlists', 'HomeController@management_data')->name('userlists');
Route::get('/save_data','HomeController@save')->name('save_data');