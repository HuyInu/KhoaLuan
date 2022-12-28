<?php

namespace App\Http\Controllers\GiaoThong;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Service\GiaoThong\GiaoThongService;

class GiaoThongController extends Controller
{
    protected $GiaoThongService;
    public function __construct(GiaoThongService $GiaoThongService)
    {
        $this->GiaoThongService = $GiaoThongService;
    }

    public function show()
    {
        try{
            $GiaoThongList =  $this->GiaoThongService->getAll();
            return view('Admin.QLHaTangKyThuat.GiaoThong.QLGiaoThong',[
                'title' => 'Quản lý đường giao thông | HỆ THỐNG GIS QUẢN LÝ HẠ TẦNG KỸ THUẬT ĐÔ THỊ MỸ THO',
                'GiaoThongList' => $GiaoThongList,
            ]);
        }
        catch(\Excetion $err)
        {

        }
    }

}
