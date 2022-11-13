<?php

namespace App\Http\Controllers\BanDo_HaTang_KyThuat;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use Helper;

use App\Http\Service\user\userService;
use App\Http\Service\DuAnQuyHoach\DuAnQuyHoachService;
use App\Http\Service\LoaiDuongDayDien\LoaiDuongDayDienService;
use App\Http\Service\LoaiTramBienAp\LoaiTramBienApService;
use App\Http\Service\LoaiDuongCapNuoc\LoaiDuongCapNuocService;
use App\Http\Service\BanDo_HaTang_KyThuat\BanDo_HaTang_KyThuatService;


class BanDo_HaTang_KyThuatController extends Controller
{
    protected $userService;
    protected $DuAnQuyHoachService;
    protected $LoaiDuongDayDienService;
    protected $LoaiTramBienApService;
    protected $LoaiDuongCapNuocService;
    protected $BanDo_HaTang_KyThuatService;

    public function __construct(
        userService $userService,
        BanDo_HaTang_KyThuatService $BanDo_HaTang_KyThuatService, 
        DuAnQuyHoachService $DuAnQuyHoachService, 
        LoaiTramBienApService $LoaiTramBienApService,
        LoaiDuongCapNuocService $LoaiDuongCapNuocService,
        LoaiDuongDayDienService $LoaiDuongDayDienService)
    {
        $this->userService = $userService;
        $this->LoaiDuongDayDienService = $LoaiDuongDayDienService;
        $this->DuAnQuyHoachService = $DuAnQuyHoachService;
        $this->LoaiTramBienApService = $LoaiTramBienApService;
        $this->LoaiDuongCapNuocService = $LoaiDuongCapNuocService;
        $this->BanDo_HaTang_KyThuatService = $BanDo_HaTang_KyThuatService;
    }

    public function show()
    {
        try{

            $DAQH_List = $this->BanDo_HaTang_KyThuatService->getID_Name_DAQH();
            $Huyen_Data = $this->BanDo_HaTang_KyThuatService->getAll_Huyen();
            
            $LoaiDuongDayDien_list = null;
            $LoaiTramBienAp_list = null;
            $LoaiDuongCapNuoc_list =  null;

            $QuyenQLHaTangKyThuat = 0;

            if(Auth()->check() && Auth()->user()->MaLoaiNguoiDung != 1)
            {
                $NguoiDung_NhomQuyen =  $this->userService->get_NhomQUyen_NguoiDung(Auth()->user()->id)->toArray();
                $check_Quyen = Helper::check_Quyen($NguoiDung_NhomQuyen, 4);
                //dd($check_Quyen);
                if($check_Quyen)
                {
                    $LoaiDuongDayDien_list = $this->LoaiDuongDayDienService->get_all_LoaiDuongDayDien();
                    $LoaiTramBienAp_list = $this->LoaiTramBienApService->get_All_LoaiTramBienAp();
                    $LoaiDuongCapNuoc_list = $this->LoaiDuongCapNuocService->get_All_LoaiOngCapNuoc();

                    $QuyenQLHaTangKyThuat = 1;
                }
            }
            else{
                    $LoaiDuongDayDien_list = $this->LoaiDuongDayDienService->get_all_LoaiDuongDayDien();
                    $LoaiTramBienAp_list = $this->LoaiTramBienApService->get_All_LoaiTramBienAp();
                    $LoaiDuongCapNuoc_list = $this->LoaiDuongCapNuocService->get_All_LoaiOngCapNuoc();
            }
            
            
            return view('BanDoQuyHoach_HaTangKyThuat.BanDo_HaTang_KyThuat.BanDo_HaTang_KyThuat',[
                'title'=> 'Bản đồ đô thị - HỆ THỐNG GIS QUẢN LÝ HẠ TẦNG KỸ THUẬT ĐÔ THỊ MỸ THO',
                'DAQH_List' => $DAQH_List,
                'Huyen_Data' => $Huyen_Data,
                'LoaiDuongDayDien_list' => $LoaiDuongDayDien_list,
                'LoaiTramBienAp_list' => $LoaiTramBienAp_list,
                'LoaiDuongCapNuoc_list' => $LoaiDuongCapNuoc_list,
                'QuyenQLHaTangKyThuat' => $QuyenQLHaTangKyThuat
            ]);
        }catch(\Exceptions $err)
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
