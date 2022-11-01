<?php

namespace App\Http\Controllers\Admin\QLLoaiDuAn;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

use App\Http\Service\QLLoaiDuAn\QLLoaiDuAnService;

class QLLoaiDuAnController extends Controller
{
    protected $QLLoaiDuAnService;

    public function __construct(QLLoaiDuAnService $QLLoaiDuAnService)
    {
        $this->QLLoaiDuAnService = $QLLoaiDuAnService;
    }

    public function show()
    {
        $LoaiDuAn_list = $this->QLLoaiDuAnService->getAll_LoaiDuAn();

        return view('.Admin.QLDanhMuc.LoaiDuAn.LoaiDuAn',[
            'title' => 'Quản lý loại dự án | HỆ THỐNG GIS QUẢN LÝ HẠ TẦNG KỸ THUẬT ĐÔ THỊ MỸ THO',
            'LoaiDuAn_list'=>$LoaiDuAn_list
        ]);
    }

    public function them(Request $req)
    {
        try{
            $validator =  $this->QLLoaiDuAnService->validate($req);

            if(is_array($validator))
            {
                return response()->json([
                    'error'=>false,
                    'validateError' => $validator
                ]);
            }

            $this->QLLoaiDuAnService->them_LoaiDuAn($req);

            return response()->json([
                'error'=>false,
                'success' => 'Thêm thành công'
            ]);
        }catch(\Exception $err)
        {
            return response()->json([
                'error'=>true,
                'message' => 'Đã xảy ra lỗi'
            ]);
        }
    }

    public function getLoaiDuAn(Request $req)
    {
        try{
            $LoaiDuAn = $this->QLLoaiDuAnService->get_LoaiDuAn_By_Id($req);

            return response()->json([
                'error'=>false,
                'LoaiDuAn' => $LoaiDuAn
            ]);
        }catch(\Exception $err)
        {
            return response()->json([
                'error'=>true,
                'message' => 'Đã xảy ra lỗi'
            ]);
        }
    }

    public function sua(Request $req)
    {
        try{
            $validator =  $this->QLLoaiDuAnService->validate_Edit($req);

            if(is_array($validator))
            {
                return response()->json([
                    'error'=>false,
                    'validateError' => $validator
                ]);
            }

            $this->QLLoaiDuAnService->sua_LoaiDuAn($req);

            return response()->json([
                'error'=>false,
                'success' => 'Sửa thành công'
            ]);
        }catch(\Exception $err)
        {
            return response()->json([
                'error'=>true,
                'message' => 'Đã xảy ra lỗi'
            ]);
        }
    }

    public function xoa(Request $req)
    {
        try{
            $this->QLLoaiDuAnService->xoa_LoaiDuAn($req);

            return response()->json([
                'error'=>false,
                'success' => "Xóa thành công."
            ]);
        }catch(\Exception $err)
        {
            return response()->json([
                'error'=>true,
                'message' => 'Đã xảy ra lỗi'
            ]);
        }
    }
}
