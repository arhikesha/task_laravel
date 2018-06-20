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


Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=> 'auth'],function() {
    Route::get('/task', 'TaskController@index');

    Route::get('task/edit/{id}', 'TaskController@edit')->name('task/edit');

    Route::post('task/create', 'TaskController@create')->name('task/create');

    Route::get('task/delete/{id}', 'TaskController@delete')->name('task/delete');
});