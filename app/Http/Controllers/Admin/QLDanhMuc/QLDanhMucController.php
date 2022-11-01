<?php

namespace App\Http\Controllers\Admin\QLDanhMuc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QLDanhMucController extends Controller
{
    public function show()
    {
        return view('Admin.QLDanhMuc.MenuDanhMuc.menu',[
            'title' => 'Quản lý danh mục | HỆ THỐNG GIS QUẢN LÝ HẠ TẦNG KỸ THUẬT ĐÔ THỊ MỸ THO'
        ]);
    }
}
