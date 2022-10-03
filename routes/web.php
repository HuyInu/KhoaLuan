<?php
Route::get('/', 'welcomeController@show')->name('home');

Route::post('/login','loginController@login')->name('login');
Route::get('/logout','loginController@logout')->name('logout');


Route::middleware('checklogin')->group(function(){

    Route::group(['prefix'=>'DuAnQuyHoach'],function(){
        Route::get('/','Admin\DuAnQuyHoach\DuAnQuyHoachController@show')->name('duAnQuyHoach');
        Route::post('/edit','Admin\DuAnQuyHoach\DuAnQuyHoachController@edit')->name('editDuAnQuyHoach');
        Route::post('/delete','Admin\DuAnQuyHoach\DuAnQuyHoachController@delete')->name('deleteDuAnQuyHoach');
        Route::post('/insert','Admin\DuAnQuyHoach\DuAnQuyHoachController@insert')->name('insertDuAnQuyHoach');
    });

    Route::group(['prefix'=>'user'],function(){
        Route::get('/','Admin\user\userController@show')->name('user');
        Route::post('/getNguoiDung','Admin\user\userController@getNguoiDung')->name('getNguoiDung');
        Route::post('/insert','Admin\user\userController@insert')->name('insertUser');
        Route::post('/edit','Admin\user\userController@edit')->name('edittUser');
        Route::post('/delete','Admin\user\userController@delete')->name('deletetUser');
    });
    
    Route::group(['prefix'=>'phan_quyen'],function(){
        Route::get('/','Admin\PhanQuyen\PhanQuyenController@show')->name('PhanQuyen');
    });

    

    Route::group(['prefix'=>'profile'],function(){
        Route::get('/','Admin\profile\profileController@show')->name('profile');
        Route::post('/edit','Admin\profile\profileController@editProfile')->name('editProfile');
        Route::post('/getDMXa','Admin\profile\profileController@layDuLieuXaTuHuyen')->name('getDMXa');
    });
});

Route::group(['prefix'=>'ban-do-tra-cuu-thong-tin-quy-hoach'],function(){
    Route::get('/','BanDoQuyHoach\BanDoQuyHoachController@show')->name('ban-do-quy-hoach');
});

Route::post('/changePasswork','Admin\profile\profileController@changePasswork')->name('changePasswork');

