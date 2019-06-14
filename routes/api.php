<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'v1', 'middleware' => ['json', 'api']], function () {
    Route::post('auth/login', 'AuthController@login')->name('login');    
    Route::post('auth/refresh', 'AuthController@refresh')->name('refresh');    
    Route::post('auth/register', 'AuthController@register')->name('register');    
    Route::post('auth/facebook', 'AuthController@facebook')->name('facebook');    
    Route::post('auth/google', 'AuthController@google')->name('google');    
    Route::post('forgot/password', 'ForgotPasswordController')->name('forgot.password');

    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::get('user', 'AuthController@getAuthUser')->name('user');
        Route::post('profile_update', 'AuthController@updateProfile')->name('profile_update');    
        Route::post('device_details', 'UserController@updateDeviceToken')->name('device_details');

        // Route::post('cards', 'UserController@addCard')->name('add_card');
        // Route::get('cards', 'UserController@cards')->name('fetch_card');
    });
});
