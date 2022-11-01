<?php
namespace App\Http\Request\QLLoaiQuyHoach;

use Illuminate\Support\Facades\Validator;

class request{
    
    public function checkInput($req)
    {
        return $Validator = Validator::make($req,[
            'TenLoaiQuyHoach'=>"unique:LoaiQuyHoach,TenLoaiQuyHoach",
            'MaLoaiQuyHoach'=>"unique:LoaiQuyHoach,MaLoaiQuyHoach",
        ],[
            'TenLoaiQuyHoach.unique'=>"Tên loại quy hoạch đã tồn tại.",
            'MaLoaiQuyHoach.unique'=>"Mã loại quy hoạch đã tồn tại.",
        ]);
    }

    public function checkInput_Edit($req, $MaLoaiQuyHoachOld)
    {
        return $Validator = Validator::make($req,[
            'TenLoaiQuyHoach'=>"unique:LoaiQuyHoach,TenLoaiQuyHoach,$MaLoaiQuyHoachOld,MaLoaiQuyHoach",
            'MaLoaiQuyHoach'=>"unique:LoaiQuyHoach,MaLoaiQuyHoach,$MaLoaiQuyHoachOld,MaLoaiQuyHoach ",
        ],[
            'TenLoaiQuyHoach.unique'=>"Tên loại quy hoạch đã tồn tại.",
            'MaLoaiQuyHoach.unique'=>"Mã loại quy hoạch đã tồn tại.",
        ]);
    }
}