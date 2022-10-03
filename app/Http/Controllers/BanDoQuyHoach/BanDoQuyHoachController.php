<?php

namespace App\Http\Controllers\BanDoQuyHoach;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Service\BanDoQuyHoach\BanDoQuyHoachService;

class BanDoQuyHoachController extends Controller
{

    protected $BanDoQuyHoachService;

    public function __construct(BanDoQuyHoachService $BanDoQuyHoachService)
    {
        $this->BanDoQuyHoachService = $BanDoQuyHoachService;
    }
    public function show()
    {
        try{

            $DAQH_List = $this->BanDoQuyHoachService->getID_Name_DAQH();

            return view('Ban_Do_Tra_Cuu_Quy_Hoach.Ban_Do_Tra_Cuu_Quy_Hoach',[
                'title'=> 'Bản đồ đô thị - HỆ THỐNG GIS QUẢN LÝ HẠ TẦNG KỸ THUẬT ĐÔ THỊ MỸ THO',
                'DAQH_List' => $DAQH_List,
            ]);
        }catch(\Exceptions $err)
        {

        }
        
    }
}
