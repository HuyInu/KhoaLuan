<?php

namespace App\Http\Controllers\TramBienAp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Helper;

use App\Http\Service\DuAnQuyHoach\DuAnQuyHoachService;
use App\Http\Service\LoaiTramBienAp\LoaiTramBienApService;
use App\Http\Service\TramBienAp\TramBienApService;

class TramBienApController extends Controller
{
    protected $DuAnQuyHoachService;
    protected $LoaiTramBienApService;
    protected $TramBienApService;
    public function __construct(TramBienApService $TramBienApService, 
                                DuAnQuyHoachService $DuAnQuyHoachService,
                                LoaiTramBienApService $LoaiTramBienApService)
    {
        $this->DuAnQuyHoachService = $DuAnQuyHoachService;
        $this->LoaiTramBienApService = $LoaiTramBienApService;
        $this->TramBienApService = $TramBienApService;
    }

    public function show()
    {
        $DAQH_List = $this->DuAnQuyHoachService->getID_Name_DAQH();
        $LoaiTramBienAp_list = $this->LoaiTramBienApService->get_All_LoaiTramBienAp();

        $TramBienAp_List =  $this->TramBienApService->get_All_TramBienAp();

        return view('Admin.QLHaTangKyThuat.CapDien.TramBienAp.QLTramBienAp',[
            'title' => 'Quản lý trạm biến áp | HỆ THỐNG GIS QUẢN LÝ HẠ TẦNG KỸ THUẬT ĐÔ THỊ MỸ THO',
            'DAQH_List' => $DAQH_List,
            'LoaiTramBienAp_list' => $LoaiTramBienAp_list,
            'TramBienAp_List' => $TramBienAp_List,
        ]);
        
    }

    public function get(Request $req)
    {
        try{
            $TramBienAp_Data = $this->TramBienApService->getTramBienAp_ById($req);
            return response()->json([
                'error'=>false,
                'TramBienAp_Data' =>$TramBienAp_Data
            ]);
        }catch(\Exceptions $err)
        {
            return response()->json([
                'error'=>true,
                'message' =>"Đã xảy ra lỗi."
            ]);
        }
    }

    public function sua(Request $req)
    {
        try{
            $data = (object)Helper::unserialize_Ajax_Data($req->data);
            $this->TramBienApService->edit_TramBienAp($req, $data);
            return response()->json([
                'error' =>false,
                'success' =>'Sửa thành công'
            ]);
        }catch(\Exception $err)
        {
            return response()->json([
                'error' =>true,
                'message' =>'Đã xảy ra lỗi'
            ]);
        }
    }

    public function xoa(Request $req)
    {
        try{

            $this->TramBienApService->xoa_TramBienAp($req);
            return response()->json([
                'error' =>false,
                'success' =>'Sửa thành công'
            ]);
        }catch(\Exception $err)
        {
            return response()->json([
                'error' =>true,
                'message' =>'Đã xảy ra lỗi'
            ]);
        }
    }
}
