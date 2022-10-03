<?php

namespace App\Http\Controllers\Admin\PhanQuyen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Service\PhanQuyen\PhanQuyenService;

class PhanQuyenController extends Controller
{
    protected $PhanQuyenService;
    public function __construct(PhanQuyenService $PhanQuyenService)
    {
        $this->PhanQuyenService = $PhanQuyenService;
    }
    public function show()
    {
        $NguoiDung_list = $this->PhanQuyenService->getAll_NguoiDung();
        $NhomQuyen_list = $this->PhanQuyenService->getAll_NhomQuyen();
        return view('Admin.PhanQuyen.PhanQuyen',[
            'NguoiDung_list'=>$NguoiDung_list,
            'NhomQuyen_list'=>$NhomQuyen_list,
            'title'=>"Phân quyền | HỆ THỐNG GIS QUẢN LÝ HẠ TẦNG KỸ THUẬT ĐÔ THỊ MỸ THO"
        ]);
    }
}
