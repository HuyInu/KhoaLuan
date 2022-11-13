<?php

namespace App\Http\Controllers\Admin\QLHaTangKyThuatMenu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QLHaTangKyThuatMenuController extends Controller
{
    public function show()
    {
        return view('Admin.QLHaTangKyThuat.MenuDanhMuc.menu',[
            'title' => 'Quản lý hạ tầng kỹ thuật | HỆ THỐNG GIS QUẢN LÝ HẠ TẦNG KỸ THUẬT ĐÔ THỊ MỸ THO'
        ]);
    }
}
