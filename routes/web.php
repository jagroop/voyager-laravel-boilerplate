<?php
Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes(['verify' => true, 'register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
