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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('busy');
});
Route::get('/delete/{id}','ClassroomController@delete');
Route::post('/busy','BusyClassroomController@show');
Route::post('/classroom','ClassroomController@select');
Route::post('/new','ClassroomController@create');