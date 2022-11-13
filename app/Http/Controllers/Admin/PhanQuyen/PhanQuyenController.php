<?php

namespace App\Http\Controllers\Admin\PhanQuyen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

use App\Http\Service\PhanQuyen\PhanQuyenService;

class PhanQuyenController extends Controller
{
    protected $PhanQuyenService;
    public function __construct(PhanQuyenService $PhanQuyenService)
    {
        $this->PhanQuyenService = $PhanQuyenService;
    }
    public function show()
    {
        $NguoiDung_list = $this->PhanQuyenService->getAll_NguoiDung();
        $NhomQuyen_list = $this->PhanQuyenService->getAll_NhomQuyen();
        $Quyen_list = $this->PhanQuyenService->getAll_Quyen();
        
        return view('Admin.PhanQuyen.PhanQuyen',[
            'NguoiDung_list'=>$NguoiDung_list,
            'NhomQuyen_list'=>$NhomQuyen_list,
            'Quyen_list'=>$Quyen_list,
            'title'=>"Phân quyền | HỆ THỐNG GIS QUẢN LÝ HẠ TẦNG KỸ THUẬT ĐÔ THỊ MỸ THO"
        ]);
    }

    public function get_Quyen_NhomQuyen(Request $req)
    {
        try{
            $Quyen = $this->PhanQuyenService->get_Quyen_By_NhomQuyen($req);
            $IDNguoiDung = $this->PhanQuyenService->get_ID_NguoiDung_by_NhomQuyen($req);
            
            return response()->json([
                'error'=>false,
                'Quyen'=>$Quyen,
                'IDNguoiDung'=>$IDNguoiDung
            ]);
        }catch(\Exception $err)
        {
            return response()->json([
                'error'=>true,
                'message'=>'Đã xảy ra lỗi.',
            ]);
        }
    }

    public function them_NhomQuyen(Request $req)
    {
        try{
            $validator = $this->PhanQuyenService->validate($req);

            if(is_array($validator))
            {
                return response()->json([
                    'error'=>false,
                    'Validate_error'=>$validator,
                ]);
            }

            $MaNhomQuyenNew =  $this->PhanQuyenService->them_NhomQuyen($req);

            return response()->json([
                'error'=>false,
                'MaNhomQuyenNew'=>$MaNhomQuyenNew,
                'success'=>"Thêm nhóm quyền thành công",
            ]);

        }catch(\Exception $err)
        {
            return response()->json([
                'error'=>true,
                'message'=>'Đã xảy ra lỗi.',
            ]);
        }
    }

    public function sua_NhomQuyen(Request $req)
    {
        try{
            $validator = $this->PhanQuyenService->validate($req);

            if(is_array($validator))
            {
                return response()->json([
                    'error'=>false,
                    'Validate_error'=>$validator,
                ]);
            }

            $this->PhanQuyenService->sua_NhomQuyen($req);

            return response()->json([
                'error'=>false,
                'success'=>"Sửa thành công",
            ]);
        }
        catch(\Exception $err)
        {
            return response()->json([
                'error'=>true,
                'message'=>'Đã xảy ra lỗi.',
            ]);
        }
    }

    public function xoa_NhomQuyen(Request $req)
    {
        try{
            $this->PhanQuyenService->xoa_NhomQuyen($req);

            return response()->json([
                'error'=>false,
                'success'=>"Xóa thành công",
            ]);
        }
        catch(\Exception $err)
        {
            return response()->json([
                'error'=>true,
                'message'=>'Đã xảy ra lỗi.',
            ]);
        }
    }

    public function them_NhomQuyen_Quyen(request $req)
    {
        try{
            $this->PhanQuyenService->them_NhomQuyen_Quyen($req);

            return response()->json([
                'error'=>false,
                'success'=>"Cập nhật nhóm quyền thành công",
            ]);
        }
        catch(\Exception $err)
        {
            return response()->json([
                'error'=>true,
                'message'=>'Đã xảy ra lỗi.',
            ]);
        }
    }

    public function them_NhomQuyen_NguoiDung(Request $req)
    {
        try{
            $this->PhanQuyenService->them_NhomQuyen_NguoiDung($req);

            return response()->json([
                'error'=>false,
                'success'=>"Phân nhóm quyền thành công",
            ]);
        }
        catch(\Exceptions $err)
        {
            return response()->json([
                'error'=>true,
                'message'=>'Đã xảy ra lỗi.',
            ]);
        }
    }
}
