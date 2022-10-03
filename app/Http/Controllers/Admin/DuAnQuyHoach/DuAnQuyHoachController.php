<?php

namespace App\Http\Controllers\Admin\DuAnQuyHoach;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

use App\Http\Service\DuAnQuyHoach\DuAnQuyHoachService;

class DuAnQuyHoachController extends Controller
{
    protected $DuAnQuyHoachService;

    public function __construct(DuAnQuyHoachService $DuAnQuyHoachService)
    {
        $this->DuAnQuyHoachService = $DuAnQuyHoachService;
    }

    public function show()
    {
        $dataLoaiQuyHoach = $this->DuAnQuyHoachService->getLoaiQuyHoach();
        $dataTienDoDuAn = $this->DuAnQuyHoachService->getTienDoDuAn_AscByName();
        $dataLoaiDuAn = $this->DuAnQuyHoachService->getLoaiDuAn_AscByName();
        $dataDuAnQuyHoach = $this->DuAnQuyHoachService->getAllDuAnQuyHoach();

        return view("Admin.DuAnQuyHoach.DuAnQuyHoach",[
            'dataLoaiQuyHoach'=> $dataLoaiQuyHoach,
            'dataTienDoDuAn'=>$dataTienDoDuAn,
            'dataLoaiDuAn' => $dataLoaiDuAn,
            'dataDuAnQuyHoach' => $dataDuAnQuyHoach,
            'title'=> 'Dự án quy hoạch - HỆ THỐNG GIS QUẢN LÝ HẠ TẦNG KỸ THUẬT ĐÔ THỊ MỸ THO'
        ]);
    }

    public function edit(Request $req)
    {
        $data = (object)$this->DuAnQuyHoachService->unserialize_Ajax_Data($req->data);
        try{
            $validate_Result = $this->DuAnQuyHoachService->validate_Infor_Form($req->MaDuAn,$data);

            if(is_array($validate_Result))
            {
                return response()->json([
                    'error'=>false,
                    'validateError'=>$validate_Result,
                ]);
            }
            
            $this->DuAnQuyHoachService->update_DuAnQuyHoach($req->MaDuAn,$data);

            return response()->json([
                'error'=>false,
                'success'=>'Sửa thành công',
            ]);
        }catch(\Exceptions $err)
        {
            return response()->json([
                'error'=>true,
                'message'=>'Đã xảy ra lỗi.',
            ]);
        }
    }

    public function delete(Request $req)
    {
        try{
            $this->DuAnQuyHoachService->delete_DuAnQuyHoach($req->MaDuAn);

            return response()->json([
                'error'=>false,
                'success'=>'Xóa thành công',
            ]);
        }catch(\Exception $err)
        {
            return response()->json([
                'error'=>true,
                'message'=>'Đã xảy ra lỗi.',
            ]);
        }
    }

    public function insert(Request $req)
    {
        try{
            $data = (object)$this->DuAnQuyHoachService->unserialize_Ajax_Data($req->data);
            //dd($data);

            $validator = $this->DuAnQuyHoachService->check_Add_Form_input($data);

            if(is_array($validator))
            {
                return response()->json([
                    'error'=>false,
                    'validateError'=>$validator,
                ]);
            }

            $this->DuAnQuyHoachService->insert_DuAnQuyHoach($data);

            return response()->json([
                'error'=>false,
                'success'=>'Thêm thành công',
            ]);

        }catch(\Exception $err)
        {
            return response()->json([
                'error'=>true,
                'message'=>'Đã xảy ra lỗi.',
            ]);
        }
    }
}
