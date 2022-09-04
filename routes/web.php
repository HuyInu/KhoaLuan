<?php


Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::group(['prefix'=>'DuAnQuyHoach'],function(){
    Route::get('/','Admin\DuAnQuyHoach\DuAnQuyHoachController@show');
});

Route::group(['prefix'=>'user'],function(){
    Route::get('/','Admin\user\userController@show');
});
