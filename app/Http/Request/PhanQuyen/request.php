<?php

namespace App\Http\Request\PhanQuyen;
use Illuminate\Support\Facades\Validator;
class request
{
    public function validate($req)
    {
        return $Validator = Validator::make($req->all(),[
            'TenNhomQuyen'=>"unique:NhomQuyen,TenNhomQuyen",
        ],[
            'TenNhomQuyen.unique'=>"Nhóm quyền đã tồn tại.",
        ]);
    }
}