<?php

namespace App\Http\Controllers\Admin\QLLoaiQuyHoach;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

use App\Http\Service\QLLoaiQuyHoach\QLLoaiQuyHoachService;
/*return response()->json([
    'error'=>false,
    'validateError'=>$validate_Result,
]);*/

class QLLoaiQuyHoachController extends Controller
{
    protected $QLLoaiQuyHoachService;

    public function __construct(QLLoaiQuyHoachService $QLLoaiQuyHoachService)
    {
        $this->QLLoaiQuyHoachService = $QLLoaiQuyHoachService;
    }

    public function show()
    {   
        $LoaiQuyHoach_list = $this->QLLoaiQuyHoachService->getAll_LoaiQuyHoach();
        return view('Admin.QLDanhMuc.LoaiQuyHoach.LoaiQuyHoach',[
            'title' =>'Quản lý loại quy hoạch | HỆ THỐNG GIS QUẢN LÝ HẠ TẦNG KỸ THUẬT ĐÔ THỊ MỸ THO',
            'LoaiQuyHoach_list' => $LoaiQuyHoach_list
        ]);
    }

    public function them(Request $req)
    {   
        try{
            $validator = $this->QLLoaiQuyHoachService->validate($req);

            if(is_array($validator))
            {
                return response()->json([
                    'error'=>false,
                    'validateError'=>$validator,
                ]);
            }

            $this->QLLoaiQuyHoachService->Add_LoaiQuyHoach($req);

            return response()->json([
                'error'=>false,
                'success'=>'Thêm thành công.',
            ]);

        }
        catch(\Exception $err)
        {
            return response()->json([
                'error'=>true,
                'message'=>'Đã xảy ra lỗi',
            ]);
        }
    }

    public function getLoaiQuyHoach(Request $req)
    {   
        try{
            $LoaiQuyHoach = $this->QLLoaiQuyHoachService->get_LoaiQuyHoach_By_ID($req);

            return response()->json([
                'error'=>false,
                'LoaiQuyHoach'=>$LoaiQuyHoach,
            ]);

        }
        catch(\Exception $err)
        {
            return response()->json([
                'error'=>true,
                'message'=>'Đã xảy ra lỗi',
            ]);
        }
    }

    public function sua(Request $req)
    {   
        try{
            $validator = $this->QLLoaiQuyHoachService->validate_Edit($req);

            if(is_array($validator))
            {
                return response()->json([
                    'error'=>false,
                    'validateError'=>$validator,
                ]);
            }

            $this->QLLoaiQuyHoachService->Edit_LoaiQuyHoach_By_ID($req);

            return response()->json([
                'error'=>false,
                'success'=>'Sửa thành công.',
            ]);
        }
        catch(\Exception $err)
        {
            return response()->json([
                'error'=>true,
                'message'=>'Đã xảy ra lỗi',
            ]);
        }
    }

    public function xoa(Request $req)
    {   
        try{
            $this->QLLoaiQuyHoachService->delete_LoaiQuyHoach($req);

            return response()->json([
                'error'=>false,
                'success'=>'Xóa thành công.',
            ]);
        }
        catch(\Exceptions $err)
        {
            return response()->json([
                'error'=>true,
                'message'=>'Đã xảy ra lỗi',
            ]);
        }
    }
}
