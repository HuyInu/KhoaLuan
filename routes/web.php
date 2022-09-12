<?php


Route::get('/', 'welcomeController@show')->name('home');

Route::post('/login','loginController@login')->name('login');
Route::get('/logout','loginController@logout')->name('logout');

Route::middleware('checklogin')->group(function(){
    Route::group(['prefix'=>'DuAnQuyHoach'],function(){
        Route::get('/','Admin\DuAnQuyHoach\DuAnQuyHoachController@show');
    });

    Route::group(['prefix'=>'user'],function(){
        Route::get('/','Admin\user\userController@show');
    });


    Route::group(['prefix'=>'profile'],function(){
        Route::get('/','Admin\profile\profileController@show')->name('profile');
    });
});
