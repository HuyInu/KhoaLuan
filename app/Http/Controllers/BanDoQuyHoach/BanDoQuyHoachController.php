<?php

namespace App\Http\Controllers\BanDoQuyHoach;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

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

            $Huyen_Data = $this->BanDoQuyHoachService->getAll_Huyen();

            $DAQH_List = $this->BanDoQuyHoachService->getID_Name_DAQH();
            return view('BanDoQuyHoach_HaTangKyThuat.Ban_Do_Tra_Cuu_Quy_Hoach.Ban_Do_Tra_Cuu_Quy_Hoach',[
                'title'=> 'Bản đồ đô thị - HỆ THỐNG GIS QUẢN LÝ HẠ TẦNG KỸ THUẬT ĐÔ THỊ MỸ THO',
                'DAQH_List' => $DAQH_List,
                'Huyen_Data' => $Huyen_Data
            ]);
        }catch(\Exception $err)
        {

        }
        
    }

    public function getThuaDat(Request $req)
    {
        try{
            $ThuaDat = $this->BanDoQuyHoachService->getThuaDat($req->odjectID);

            $SuDungDat = $this->BanDoQuyHoachService->getSuDungDat($req->odjectID, $req->MaDuAn);
            //$SuDungDat->THUADATSHAPE = json_encode($SuDungDat->THUADATSHAPE);
            return response()->json([
                'error'=>false,
                'ThuaDat' =>$ThuaDat,
                'SuDungDat' => $SuDungDat
            ]);
        }
        catch(\Exception $err)
        {
            return response()->json([
                'error'=>true,
                'message' =>"Đã xảy ra lỗi."
            ]);
        }
    }

    public function timKiemThuaDat(Request $req)
    {
        try{//dd($req->MaDuAn);
            $ThuaDat = $this->BanDoQuyHoachService->getThuaDat_By_MaXa_SoTo_SoThua($req->MaXa, $req->SoTo, $req->SoThua);

            $SuDungDat = $this->BanDoQuyHoachService->timKiemSuDungDat($req->MaXa, $req->SoTo, $req->SoThua, $req->MaDuAn);

            return response()->json([
                'error'=>false,
                'ThuaDat' =>$ThuaDat,
                'SuDungDat' => $SuDungDat
            ]);
        }
        catch(\Exception $err)
        {
            return response()->json([
                'error'=>true,
                'message' =>"Đã xảy ra lỗi."
            ]);
        }
    }

    function layDuLieuXaTuHuyen(Request $req)
    {
        try{
            $duLieuDMXa = $this->BanDoQuyHoachService->layDuLieuXaTuHuyen($req->MaHuyen);

            return response()->json([
                'error'=>false,
                'duLieuDMXa'=>$duLieuDMXa,
            ]);
        }
        catch(\Exception $err)
        {
            return response()->json([
                'error'=>true,
                'message'=>'Đã xảy ra lỗi'
            ]);
        }
    }
}
