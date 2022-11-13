<?php

namespace App\Http\Controllers\DuongOngCapNuoc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Helper;

use App\Http\Service\DuAnQuyHoach\DuAnQuyHoachService;
use App\Http\Service\LoaiDuongCapNuoc\LoaiDuongCapNuocService;
use App\Http\Service\DuongOngCapNuoc\DuongOngCapNuocService;

class DuongOngCapNuocController extends Controller
{
    protected $DuAnQuyHoachService;
    protected $LoaiDuongCapNuocService;
    protected $DuongOngCapNuocService;
    public function __construct(DuongOngCapNuocService $DuongOngCapNuocService,
                                DuAnQuyHoachService  $DuAnQuyHoachService,
                                LoaiDuongCapNuocService $LoaiDuongCapNuocService) 
    {
        $this->DuAnQuyHoachService = $DuAnQuyHoachService;
        $this->LoaiDuongCapNuocService = $LoaiDuongCapNuocService;
        $this->DuongOngCapNuocService = $DuongOngCapNuocService;
    }

    public function show()
    {
        try{
            $DAQH_List = $this->DuAnQuyHoachService->getID_Name_DAQH();
            $LoaiDuongCapNuoc_list = $this->LoaiDuongCapNuocService->get_All_LoaiOngCapNuoc();

            $DuongCapOngNuoc = $this->DuongOngCapNuocService->get_All_DuongCapNuoc();
           
            return view('Admin.QLHaTangKyThuat.CapNuoc.DuongCapNuoc.QLDuongCapNuoc',[
                'title' => 'Quản lý đường cấp nước | HỆ THỐNG GIS QUẢN LÝ HẠ TẦNG KỸ THUẬT ĐÔ THỊ MỸ THO',
                'DAQH_List' => $DAQH_List,
                'LoaiDuongCapNuoc_list' => $LoaiDuongCapNuoc_list,
                'DuongCapOngNuoc' => $DuongCapOngNuoc,
            ]);
        }
        catch(\Excetion $err)
        {

        }
    }

    public function get(Request $req)
    {
        try{
            $DuongCapNuoc_Data =  $this->DuongOngCapNuocService->get_DuongCapNuoc_By_Id($req);

            return response()->json([
                'error' =>false,
                'DuongCapNuoc_Data' => $DuongCapNuoc_Data
            ]);
        }catch(\Exception $err)
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
            $this->DuongOngCapNuocService->edit_DuongOngNuoc($req, $data);

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
            $this->DuongOngCapNuocService->xoa_DuongCapNuoc($req);

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
