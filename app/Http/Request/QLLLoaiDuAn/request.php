<?php
namespace App\Http\Request\QLLLoaiDuAn;

use Illuminate\Support\Facades\Validator;

class request{
    
    public function checkInput($req)
    {
        return $Validator = Validator::make($req,[
            'TenLoaiDuAn'=>"unique:LoaiDuAn,TenLoaiDuAn",
            'MaLoaiDuAn'=>"unique:LoaiDuAn,MaLoaiDuAn",
        ],[
            'TenLoaiDuAn.unique'=>"Tên loại quy hoạch đã tồn tại.",
            'MaLoaiDuAn.unique'=>"Mã loại quy hoạch đã tồn tại.",
        ]);
    }

    public function checkInput_Edit($req, $MaLoaiDuAnOld)
    {
        return $Validator = Validator::make($req,[
            'TenLoaiDuAn'=>"unique:LoaiDuAn,TenLoaiDuAn,$MaLoaiDuAnOld,MaLoaiDuAn",
            'MaLoaiDuAn'=>"unique:LoaiDuAn,MaLoaiDuAn,$MaLoaiDuAnOld,MaLoaiDuAn ",
        ],[
            'TenLoaiDuAn.unique'=>"Tên loại quy hoạch đã tồn tại.",
            'MaLoaiDuAn.unique'=>"Mã loại quy hoạch đã tồn tại.",
        ]);
    }
}