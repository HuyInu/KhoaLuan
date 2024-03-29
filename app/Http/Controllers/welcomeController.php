<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\NguoiDung;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Http\Service\user\userService;

class welcomeController extends Controller
{
    protected $userService;

    public function __construct(userService $userService)
    {
        $this->userService = $userService;
    }

    public function show()
    { 
        $QuyenQLDAQH = 0;
        $QuyenQLDanhMuc = 0;
        $QuyenQLSuDungDat = 0;
        $QuyenQLHaTangKyThuat = 0;
        $QuyenQLNguoiDung = 0;

       // $NhomQuyen = $this->userService->get_NhomQUyen_NguoiDung(Auth()->user()->id)->toArray();
            //dd($NhomQuyen);
        if(Auth()->check() && Auth()->user()->MaLoaiNguoiDung != 1)
        {
            $NguoiDung_Quyen = $this->userService->get_NguoiDung_Quyen(Auth()->user()->id)->toArray();
            //dd($NguoiDung_Quyen);
            $Quyen = $NguoiDung_Quyen[0]['quyen'];

            foreach ($Quyen as $Quyen_item) {
                if($Quyen_item['MaQuyen'] == 1)
                {
                    $QuyenQLDAQH = 1;
                    $QuyenQLDanhMuc = 1;
                    $QuyenQLSuDungDat = 1;
                    $QuyenQLHaTangKyThuat = 1;
                    $QuyenQLNguoiDung = 1;
                }
            } 
        }
       
        return view('welcome',[
            'QuyenQLDAQH' => $QuyenQLDAQH,
            'QuyenQLDanhMuc' => $QuyenQLDanhMuc,
            'QuyenQLSuDungDat' => $QuyenQLSuDungDat,
            'QuyenQLHaTangKyThuat' => $QuyenQLHaTangKyThuat,
            'QuyenQLNguoiDung' => $QuyenQLNguoiDung
        ]);    
    }
}
