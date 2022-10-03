<?php
namespace App\Http\Request\user;

use Illuminate\Support\Facades\Validator;

class request{
    
    public function checkInputInsert($req)
    {
        return $Validator = Validator::make((array)$req,[
            'DienThoai'=>"unique:NguoiDung,DienThoai",
            'TenDangNhap'=>"unique:NguoiDung,TenDangNhap",
            'Email'=>"unique:NguoiDung,Email",
        ],[
            'DienThoai.unique'=>"Số điện thoại đã tồn tại.",
            'TenDangNhap.unique'=>"Tên đăng nhập đã tồn tại.",
            'Email.unique'=>"Email đã tồn tại."
        ]);
    }

    public function checkInputEdits($req,$id)
    {
        return $Validator = Validator::make((array)$req,[
            'Edit_DienThoai'=>"unique:NguoiDung,DienThoai,$id,id",
            'Edit_TenDangNhap'=>"unique:NguoiDung,TenDangNhap,$id,id",
            'Edit_Email'=>"unique:NguoiDung,Email,$id,id",
        ],[
            'Edit_DienThoai.unique'=>"Số điện thoại đã tồn tại.",
            'Edit_TenDangNhap.unique'=>"Tên đăng nhập đã tồn tại.",
            'Edit_Email.unique'=>"Email đã tồn tại."
        ]);
    }

}