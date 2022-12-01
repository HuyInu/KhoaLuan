<?php

namespace App\Http\Controllers\Admin\QLSuDungDat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Helper;

use App\Http\Service\QLSuDungDat\QLDuDungDatService;

class QLSuDungDatController extends Controller
{
    protected $QLDuDungDatService;

    public function __construct(QLDuDungDatService $QLDuDungDatService)
    {
        $this->QLDuDungDatService = $QLDuDungDatService;
    }

    public function show()
    {
        $SuDungDat_list = $this->QLDuDungDatService->get_All_SuDungDat();
        $DuAnQuyHoach_list = $this->QLDuDungDatService->get_All_DuAnQuyHoach();
        $DMLoaiDatQHXD_list =  $this->QLDuDungDatService->get_All_DMLoaiDatQHXD();
       
        return view('Admin.QLSuDungDat.QLSuDungDat',[
            'title'=>'Quản lý sử dụng đất | HỆ THỐNG GIS QUẢN LÝ HẠ TẦNG KỸ THUẬT ĐÔ THỊ MỸ THO',
            'SuDungDat_list' => $SuDungDat_list,
            'DuAnQuyHoach_list' => $DuAnQuyHoach_list,
            'DMLoaiDatQHXD_list' => $DMLoaiDatQHXD_list
        ]);
    }

    public function getSuDungDat(Request $req)
    {
        try{
            $SuDungDat = $this->QLDuDungDatService->get_SuDungDat_By_ID($req);

            return response()->json([
                'error' => false,
                'SuDungDat' => $SuDungDat
            ]);

        }
        catch(\Exception $err)
        {
            return response()->json([
                'error' => true,
                'message' => 'Đã xảy ra lỗi.'
            ]);
        }
    }

    public function sua(Request $req)
    {
        try{
            $data = (object)Helper::unserialize_Ajax_Data($req->data);
            $this->QLDuDungDatService->sua_SuDungDat($req,$data);
            return response()->json([
                'error' => false,
                'success' => 'Sửa thành công.'
            ]);

        }
        catch(\Exceptions $err)
        {
            return response()->json([
                'error' => true,
                'message' => 'Đã xảy ra lỗi.'
            ]);
        }
    }

    public function xoa(Request $req)
    {
        try{
            $this->QLDuDungDatService->xoa_SuDungDat($req);
            return response()->json([
                'error' => false,
                'success' => 'Xóa thành công.'
            ]);

        }
        catch(\Exception $err)
        {
            return response()->json([
                'error' => true,
                'message' => 'Đã xảy ra lỗi.'
            ]);
        }
    }
}
