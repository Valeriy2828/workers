<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|Route::get('/', function () {
    return view('welcome');
});
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MainController@index')->name('Main');
Route::get('/index/{department}', 'MainController@index')->name('departmentIndex');

