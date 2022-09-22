<?php

namespace App\Http\Request\DuAnQuyHoach;

use Illuminate\Support\Facades\Validator;

class Request{
    public function validate_TenDuAn_Form($MaDuAN,$req)
    {
        return $Validator = Validator::make((array)$req,[
            'TenDuAn'=>"unique:DuAnQuyHoach,TenDuAn,$MaDuAN,MaDuAn"
        ],[
            'TenDuAn.unique'=>"Tên dự án đã tồn tại."
        ]);
    }

    public function validate_Add_Form($req)
    {
        return $Validator = Validator::make((array)$req,[
            'Add_MaDuAn'=>"unique:DuAnQuyHoach,MaDuAn",
            'Add_TenDuAn'=>"unique:DuAnQuyHoach,TenDuAn"
        ],[
            'Add_MaDuAn.unique' => "Mã dự án đã tồn tại.",
            'Add_TenDuAn.unique' => "Tên dự án đã tồn tại."
        ]);
    }
}