<?php
Route::get('/', 'welcomeController@show')->name('home');

Route::post('/login','loginController@login')->name('login');
Route::get('/logout','loginController@logout')->name('logout');


Route::middleware('checklogin')->group(function(){

    
    Route::group(['prefix'=>'DuAnQuyHoach'],function(){
        Route::middleware('checkQuyenQLDAQH')->group(function(){
            Route::get('/','Admin\DuAnQuyHoach\DuAnQuyHoachController@show')->name('duAnQuyHoach');
            Route::post('/get_DAQH','Admin\DuAnQuyHoach\DuAnQuyHoachController@getDAQH')->name('getDuAnQuyHoach');
            Route::post('/edit','Admin\DuAnQuyHoach\DuAnQuyHoachController@edit')->name('editDuAnQuyHoach');
            Route::post('/delete','Admin\DuAnQuyHoach\DuAnQuyHoachController@delete')->name('deleteDuAnQuyHoach');
            Route::post('/insert','Admin\DuAnQuyHoach\DuAnQuyHoachController@insert')->name('insertDuAnQuyHoach');
        });
    });


    Route::middleware('checkQuyenQLNguoiDung')->group(function(){
        Route::group(['prefix'=>'user'],function(){
            Route::get('/','Admin\user\userController@show')->name('user');
            Route::post('/getNguoiDung','Admin\user\userController@getNguoiDung')->name('getNguoiDung');
            Route::post('/insert','Admin\user\userController@insert')->name('insertUser');
            Route::post('/edit','Admin\user\userController@edit')->name('edittUser');
            Route::post('/delete','Admin\user\userController@delete')->name('deletetUser');

            Route::post('/get_NguoiDung_Quyen','Admin\user\userController@get_NguoiDung_Quyen')->name('get_NguoiDung_Quyen');
        });
        
        Route::group(['prefix'=>'phan_quyen'],function(){
            Route::get('/','Admin\PhanQuyen\PhanQuyenController@show')->name('PhanQuyen');
            Route::post('/get_Quyen_NhomQuyen','Admin\PhanQuyen\PhanQuyenController@get_Quyen_NhomQuyen')->name('get_Quyen_NhomQuyen');
            Route::post('/get_Quyen_NguoiDung','Admin\PhanQuyen\PhanQuyenController@get_Quyen_NguoiDung')->name('get_Quyen_NguoiDung');
            Route::post('/them_NhomQuyen','Admin\PhanQuyen\PhanQuyenController@them_NhomQuyen')->name('them_NhomQuyen');
            Route::post('/sua_NhomQuyen','Admin\PhanQuyen\PhanQuyenController@sua_NhomQuyen')->name('sua_NhomQuyen');
            Route::post('/xoa_NhomQuyen','Admin\PhanQuyen\PhanQuyenController@xoa_NhomQuyen')->name('xoa_NhomQuyen');

            Route::post('/them_Quyen_Vao_Nhom','Admin\PhanQuyen\PhanQuyenController@them_NhomQuyen_Quyen')->name('them_NhomQuyen_Quyen');
            Route::post('/them_NguoiDung_Vao_NhomQuyen','Admin\PhanQuyen\PhanQuyenController@them_NhomQuyen_NguoiDung')->name('them_NhomQuyen_NguoiDung');
            Route::post('/them_Quyen_Cho_NguoiDung','Admin\PhanQuyen\PhanQuyenController@them_Quyen_Cho_NguoiDung')->name('them_Quyen_Cho_NguoiDung');
        });
    });
    

    Route::group(['prefix'=>'profile'],function(){
        Route::get('/','Admin\profile\profileController@show')->name('profile');
        Route::post('/edit','Admin\profile\profileController@editProfile')->name('editProfile');
        Route::post('/getDMXa','Admin\profile\profileController@layDuLieuXaTuHuyen')->name('getDMXa');
    });

    
    Route::group(['prefix'=>'QLDanhMuc'],function(){
        Route::middleware('checkQuyenQLDanhMuc')->group(function(){
            Route::get('/','Admin\QLDanhMuc\QLDanhMucController@show')->name('QLDanhMuc');

            Route::group(['prefix'=>'LoaiQuyHoach'],function(){
                Route::get('/','Admin\QLLoaiQuyHoach\QLLoaiQuyHoachController@show')->name('QLLoaiQuyHoach');
                Route::post('/them_LoaiQuyHoach','Admin\QLLoaiQuyHoach\QLLoaiQuyHoachController@them')->name('AddLoaiQuyHoach');
                Route::post('/get_LoaiQuyHoach','Admin\QLLoaiQuyHoach\QLLoaiQuyHoachController@getLoaiQuyHoach')->name('getLoaiQuyHoach');
                Route::post('/sua_LoaiQuyHoach','Admin\QLLoaiQuyHoach\QLLoaiQuyHoachController@sua')->name('EditLoaiQuyHoach');
                Route::post('/xoa_LoaiQuyHoach','Admin\QLLoaiQuyHoach\QLLoaiQuyHoachController@xoa')->name('DeleteLoaiQuyHoach');
            });

            Route::group(['prefix'=>'LoaiDuAn'],function(){
                Route::get('/','Admin\QLLoaiDuAn\QLLoaiDuAnController@show')->name('QLLoaiDuAn');
                Route::post('/them_LoaiDuAn','Admin\QLLoaiDuAn\QLLoaiDuAnController@them')->name('AddLoaiDuAn');
                Route::post('/get_LoaiDuAn','Admin\QLLoaiDuAn\QLLoaiDuAnController@getLoaiDuAn')->name('getLoaiDuAn');
                Route::post('/sua_LoaiDuAn','Admin\QLLoaiDuAn\QLLoaiDuAnController@sua')->name('EditLoaiDuAn');
                Route::post('/xoa_LoaiDuAn','Admin\QLLoaiDuAn\QLLoaiDuAnController@xoa')->name('DeleteLoaiDuAn');
            });
        });
    });

    Route::group(['prefix'=>'QLHaTangKyThuat'],function(){
        Route::middleware('checkQuyenQLHaTangKyThuat')->group(function(){
            Route::get('/','Admin\QLHaTangKyThuatMenu\QLHaTangKyThuatMenuController@show')->name('QLHaTangKyThuat');

            Route::group(['prefix'=>'DuongDayDien'],function(){
                Route::get('/','DuongDayDien\DuongDayDienController@show')->name('QLDuongDayDien');
                Route::post('/get_DuongDayDien','DuongDayDien\DuongDayDienController@get')->name('getDuongDayDien');
                Route::post('/sua_DuongDayDien','DuongDayDien\DuongDayDienController@sua')->name('suaDuongDayDien');
                Route::post('/xoa_DuongDayDien','DuongDayDien\DuongDayDienController@xoa')->name('xoaDuongDayDien');
            });

            Route::group(['prefix'=>'TramBienAp'],function(){
                Route::get('/','TramBienAp\TramBienApController@show')->name('QLTramBienAp');
                Route::post('/get','TramBienAp\TramBienApController@get')->name('getTramBienAp');
                Route::post('/edit','TramBienAp\TramBienApController@sua')->name('EditTramBienAp');
                Route::post('/xoa','TramBienAp\TramBienApController@xoa')->name('xoaTramBienAp');
            });
        
            Route::group(['prefix'=>'DuongCapNuoc'],function(){
                Route::get('/','DuongOngCapNuoc\DuongOngCapNuocController@show')->name('QLDuongCapNuoc');
                Route::post('/get','DuongOngCapNuoc\DuongOngCapNuocController@get')->name('getDuongCapNuoc');
                Route::post('/edit','DuongOngCapNuoc\DuongOngCapNuocController@sua')->name('EditDuongCapNuoc');
                Route::post('/xoa','DuongOngCapNuoc\DuongOngCapNuocController@xoa')->name('xoaDuongCapNuoc');
            });
        
            Route::group(['prefix'=>'NhaMayNuoc'],function(){
                Route::get('/','NhaMayNuoc\NhaMayNuocController@show')->name('QLNhaMayNuoc');
                Route::post('/get','NhaMayNuoc\NhaMayNuocController@get')->name('getNhaMayNuoc');
                Route::post('/edit','NhaMayNuoc\NhaMayNuocController@sua')->name('EditNhaMayNuoc');
                Route::post('/xoa','NhaMayNuoc\NhaMayNuocController@xoa')->name('xoaNhaMayNuoc');
            });

            Route::group(['prefix'=>'GiaoThong'],function(){
                Route::get('/','GiaoThong\GiaoThongController@show')->name('QLGiaoThong');
            });
        });
    });

    Route::group(['prefix'=>'SuDungDat'],function(){
        Route::middleware('checkQuyenSuDungDat')->group(function(){
            Route::get('/','Admin\QLSuDungDat\QLSuDungDatController@show')->name('SuDungDat');
            Route::post('/get_SuDungDat','Admin\QLSuDungDat\QLSuDungDatController@getSuDungDat')->name('getSuDungDat');
            Route::post('/sua_SuDungDat','Admin\QLSuDungDat\QLSuDungDatController@sua')->name('suaSuDungDat');
            Route::post('/xoa_SuDungDat','Admin\QLSuDungDat\QLSuDungDatController@xoa')->name('xoaSuDungDat');
        });
    });
  
});

Route::group(['prefix'=>'ban-do-tra-cuu-thong-tin-quy-hoach'],function(){
    Route::get('/','BanDoQuyHoach\BanDoQuyHoachController@show')->name('ban-do-quy-hoach');
    Route::post('/getThuaDat','BanDoQuyHoach\BanDoQuyHoachController@getThuaDat')->name('getThuaDat');
    Route::post('/timKiemThuaDat','BanDoQuyHoach\BanDoQuyHoachController@timKiemThuaDat')->name('timKiemThuaDat');
    Route::post('/getDMXa','BanDoQuyHoach\BanDoQuyHoachController@layDuLieuXaTuHuyen')->name('getDMXa_QuyHoach');
});

Route::group(['prefix'=>'ban-do-ha-tang-ky-thuat'],function(){
    Route::get('/','BanDo_HaTang_KyThuat\BanDo_HaTang_KyThuatController@show')->name('ban-do-ha-tang-ky-thuat');
    Route::post('/getDuongDayDien','BanDo_HaTang_KyThuat\BanDo_HaTang_KyThuatController@getDuongDayDien')->name('getDuongDayDien');
    Route::post('/getOngCapNuoc','BanDo_HaTang_KyThuat\BanDo_HaTang_KyThuatController@getOngCapNuoc')->name('getOngCapNuoc');
    Route::post('/getTramBienAp','BanDo_HaTang_KyThuat\BanDo_HaTang_KyThuatController@getTramBienAp')->name('getTramBienAp');
    Route::post('/getNhaMayNuoc','BanDo_HaTang_KyThuat\BanDo_HaTang_KyThuatController@getNhaMayNuoc')->name('getNhaMayNuoc');
});

Route::group(['prefix'=>'PDF'],function(){
    Route::post('/PDF_ThongTinQuyHoach','PDFConvert\PDF_ThongTinQuyHoachController@convert_HTML_to_PDF')->name('PDF_ThongTinQuyHoach');
});


Route::post('/changePasswork','Admin\profile\profileController@changePasswork')->name('changePasswork');

