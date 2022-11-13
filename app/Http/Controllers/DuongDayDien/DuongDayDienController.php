<?php

namespace App\Http\Controllers\DuongDayDien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\jsonRespones;
use Helper;

use App\Http\Service\DuongDayDIen\DuongDayDienService;

use App\Http\Service\DuAnQuyHoach\DuAnQuyHoachService;
use App\Http\Service\LoaiDuongDayDien\LoaiDuongDayDienService;

class DuongDayDienController extends Controller
{
    protected $DuongDayDienService;

    protected $DuAnQuyHoachService;
    protected $LoaiDuongDayDienService;
    public function __construct(DuongDayDienService $DuongDayDienService,
                                DuAnQuyHoachService $DuAnQuyHoachService,
                                LoaiDuongDayDienService $LoaiDuongDayDienService)
    {
        $this->DuongDayDienService = $DuongDayDienService;

        $this->DuAnQuyHoachService = $DuAnQuyHoachService;
        $this->LoaiDuongDayDienService = $LoaiDuongDayDienService;
    }

    public function show()
    {
        $DuongDayDien_List = $this->DuongDayDienService->get_All_DuongDayDien();

        $LoaiDuongDayDien_list = $this->LoaiDuongDayDienService->get_all_LoaiDuongDayDien();
        $DAQH_List = $this->DuAnQuyHoachService->getID_Name_DAQH();

        return view('Admin.QLHaTangKyThuat.CapDien.DuongDayDien.QLDuongDayDien',[
            'title' => 'Quản lý đường dây điện | HỆ THỐNG GIS QUẢN LÝ HẠ TẦNG KỸ THUẬT ĐÔ THỊ MỸ THO',
            'DuongDayDien_List' => $DuongDayDien_List,
            'LoaiDuongDayDien_list' => $LoaiDuongDayDien_list,
            'DAQH_List' => $DAQH_List,
        ]);
    }

    public function get(Request $req)
    {
        try{
            $DuongDayDien_Data = $this->DuongDayDienService->getDuongDayDien($req);
            return response()->json([
                'error'=>false,
                'DuongDayDien_Data' =>$DuongDayDien_Data
            ]);
        }catch(\Exception $err)
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
            $this->DuongDayDienService->edit_DuongDayDien($req,$data);
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
            $this->DuongDayDienService->xoa_DuongDayDien($req);
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
