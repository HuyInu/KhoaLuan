<?php

namespace App\Http\Controllers\BanDoQuyHoach;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BanDoQuyHoachController extends Controller
{
    public function show()
    {
        return view('Ban_Do_Tra_Cuu_Quy_Hoach.Ban_Do_Tra_Cuu_Quy_Hoach',[
            'title'=> 'Bản đồ đô thị - HỆ THỐNG GIS QUẢN LÝ HẠ TẦNG KỸ THUẬT ĐÔ THỊ MỸ THO'
        ]);
    }
}
