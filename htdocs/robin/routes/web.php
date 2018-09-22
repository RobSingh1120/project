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


Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', 'HomeController@logout')->name('logout');
/*Route::get('/hello/{name}', 'hello@show');
Route::get('/viaan/{name}', 'firstcontroller@show');*/

Route::get('/robin', function () {
    return view('AddUser');
      });
Route::get('/robin','firstcontroller@index');

Route::post('/abc/','firstcontroller@save')->name('abc');
 
Route::get('/view', 'firstcontroller@show')->name('view');

Route::DELETE('/delete/{id}', 'firstcontroller@destroy')->name('data.destroy');

Route::get('/viewdata/{id}', 'firstcontroller@viewuser')->name('viewdata');

Route::get('/edit/{id}', 'firstcontroller@edituser')->name('editdata');

Route::post('/update/{id}', 'firstcontroller@edit1')->name('update');

Route::get('searche', 'firstcontroller@searchname')->name('searche');

/*
Route::get('/home', 'doctorcontroller@show')->name('dashboard');
Route::get('/usermanagement', 'doctorcontroller@management_data')->name('manage_data');*/


Route::get('/home', 'doctorcontroller@showdash')->name('dashb');
Route::get('/usermanagement', 'doctorcontroller@management_data')->name('usermanagement');
Route::DELETE('/destroy/{id}', 'doctorcontroller@destroy');
Route::get('/viewdata_management/{id}', 'doctorcontroller@viewuser');
Route::get('/userstatus/{id}', 'doctorcontroller@viewstatus');
Route::get('searcher', 'doctorcontroller@searchname')->name('user_search');
 Route::get('/approves/{id}','doctorcontroller@approved');
