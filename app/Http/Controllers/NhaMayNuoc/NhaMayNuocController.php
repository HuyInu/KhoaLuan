<?php

namespace App\Http\Controllers\NhaMayNuoc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Helper;

use App\Http\Service\DuAnQuyHoach\DuAnQuyHoachService;
use App\Http\Service\NhaMayNuoc\NhaMayNuocService;

class NhaMayNuocController extends Controller
{
    protected $NhaMayNuocService;
    public function __construct(NhaMayNuocService $NhaMayNuocService,
                                DuAnQuyHoachService  $DuAnQuyHoachService)
    {
        $this->DuAnQuyHoachService = $DuAnQuyHoachService;
        $this->NhaMayNuocService = $NhaMayNuocService;
    }

    public function show()
    {
        try{
            $DAQH_List = $this->DuAnQuyHoachService->getID_Name_DAQH();
            $NhaMayNuoc_list = $this->NhaMayNuocService->get_All_NhaMayNuoc();

            return view('Admin.QLHaTangKyThuat.CapNuoc.NhaMayNuoc.QLNhaMayNuoc',[
                'title' => 'Quản lý nhà máy nước | HỆ THỐNG GIS QUẢN LÝ HẠ TẦNG KỸ THUẬT ĐÔ THỊ MỸ THO',
                'DAQH_List' => $DAQH_List,
                'NhaMayNuoc_list' => $NhaMayNuoc_list
            ]);
        }catch(\Exception $err)
        {

        }
        
    }

    public function get(Request $req)
    {
        try{
            $NhaMayNuoc_Data = $this->NhaMayNuocService->get_NhaMayNuoc_By_Id($req);

            return response()->json([
                'error' =>false,
                'NhaMayNuoc_Data' => $NhaMayNuoc_Data
            ]);
        }catch(\Exceptions $err)
        {
            return response()->json([
                'error' =>true,
                'message' =>'Đã xảy ra lỗi'
            ]);
        }
        
    }

    public function sua(Request $req)
    {
        try{
            $data = (object)Helper::unserialize_Ajax_Data($req->data);
            $this->NhaMayNuocService->edit_NhaMayNuoc($req, $data);

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

            $this->NhaMayNuocService->xoa_NhaMayNuoc($req);

            return response()->json([
                'error' =>false,
                'success' =>'Xóa thành công'
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
