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
        Route::get('/','Admin\user\userController@show');
    });


    Route::group(['prefix'=>'profile'],function(){
        Route::get('/','Admin\profile\profileController@show')->name('profile');
        Route::post('/edit','Admin\profile\profileController@editProfile')->name('editProfile');
        Route::post('/getDMXa','Admin\profile\profileController@layDuLieuXaTuHuyen')->name('getDMXa');
    });
});

Route::get('/ban-do-tra-cuu-thong-tin-quy-hoach','BanDoQuyHoach\BanDoQuyHoachController@show')->name('ban-do-quy-hoach');

Route::post('/changePasswork','Admin\profile\profileController@changePasswork')->name('changePasswork');
