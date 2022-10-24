<?php

namespace App\Http\Controllers\BanDo_HaTang_KyThuat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Service\BanDo_HaTang_KyThuat\BanDo_HaTang_KyThuatService;

class BanDo_HaTang_KyThuatController extends Controller
{
    protected $BanDo_HaTang_KyThuatService;

    public function __construct(BanDo_HaTang_KyThuatService $BanDo_HaTang_KyThuatService)
    {
        $this->BanDo_HaTang_KyThuatService = $BanDo_HaTang_KyThuatService;
    }

    public function show()
    {
        try{

            $DAQH_List = $this->BanDo_HaTang_KyThuatService->getID_Name_DAQH();
            $Huyen_Data = $this->BanDo_HaTang_KyThuatService->getAll_Huyen();
            return view('BanDoQuyHoach_HaTangKyThuat.BanDo_HaTang_KyThuat.BanDo_HaTang_KyThuat',[
                'title'=> 'Bản đồ đô thị - HỆ THỐNG GIS QUẢN LÝ HẠ TẦNG KỸ THUẬT ĐÔ THỊ MỸ THO',
                'DAQH_List' => $DAQH_List,
                'Huyen_Data' => $Huyen_Data
            ]);
        }catch(\Exception $err)
        {

        }
    }

    public function getDuongDayDien(Request $req)
    {
        try{
            $DuongDayDien_Data = $this->BanDo_HaTang_KyThuatService->getDuongDayDien($req->odjectID);
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

    public function getOngCapNuoc(Request $req)
    {
        try{
            $DuongOngNuoc_Data = $this->BanDo_HaTang_KyThuatService->getOngCapNuoc($req->odjectID);
            return response()->json([
                'error'=>false,
                'DuongOngNuoc_Data' =>$DuongOngNuoc_Data
            ]);
        }catch(\Exception $err)
        {
            return response()->json([
                'error'=>true,
                'message' =>"Đã xảy ra lỗi."
            ]);
        }
    }

    public function getTramBienAp(Request $req)
    {
        try{
            $TramBienAp_Data = $this->BanDo_HaTang_KyThuatService->getTramBienAp($req->odjectID);
            return response()->json([
                'error'=>false,
                'TramBienAp_Data' =>$TramBienAp_Data
            ]);
        }catch(\Exception $err)
        {
            return response()->json([
                'error'=>true,
                'message' =>"Đã xảy ra lỗi."
            ]);
        }
    }

    public function getNhaMayNuoc(Request $req)
    {
        try{
            $NhaMayNuoc_Data = $this->BanDo_HaTang_KyThuatService->getNhaMayNuoc($req->odjectID);
            return response()->json([
                'error'=>false,
                'NhaMayNuoc_Data' =>$NhaMayNuoc_Data
            ]);
        }catch(\Exceptions $err)
        {
            return response()->json([
                'error'=>true,
                'message' =>"Đã xảy ra lỗi."
            ]);
        }
    }
}
