<?php

namespace App\Http\Controllers\Admin\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Helper;

use App\Http\Service\user\userService;

class userController extends Controller
{
    protected $userService;

    public function __construct(userService $userService)
    {
        $this->userService = $userService;
    }
    public function show()
    {   
        $CoQuan = $this->userService->getCoQuan();
        $LoaiNguoiDung = $this->userService->getLoaiNguoiDung();
        $NguoiDungList = $this->userService->getNguoiDung();
        return view("Admin.user.user",[
            'title'=>"Quản lý người dùng | HỆ THỐNG GIS QUẢN LÝ HẠ TẦNG KỸ THUẬT ĐÔ THỊ MỸ THO",
            'CoQuan' => $CoQuan,
            'LoaiNguoiDung' => $LoaiNguoiDung,
            'NguoiDungList' => $NguoiDungList,
        ]);
    }

    public function insert(Request $req)
    {
        try{
            $data = (object)Helper::unserialize_Ajax_Data($req->data);

            $validator = $this->userService->checkInputInsert($data);
            if(is_array($validator))
            {
                return response()->json([
                    'error'=>false,
                    'validateError'=>$validator,
                ]);
            }

            $MaNguoiDungNew = $this->userService->insert($data);

            return response()->json([
                'error'=>false,
                'success'=>"Thêm người dùng thành công",
                'MaNguoiDungNew'=>$MaNguoiDungNew
            ]);
        }
        catch(\Excrption $err)
        {
            return response()->json([
                'error'=>true,
                'message'=>"Đã xảy ra lỗi",
            ]);
        }
    }

    public function getNguoiDung(Request $req)
    {
        try{
            
            $NguoiDung = $this->userService->getNguoiDungByID($req);
            return response()->json([
                'error'=>false,
                'NguoiDung'=>$NguoiDung,
            ]);
        }
        catch(\Exception $err)
        {
            return response()->json([
                'error'=>true,
                'message'=>"Đã xảy ra lỗi",
            ]);
        }
    }

    public function edit(Request $req)
    {
        try{
            //dd($req->all());
            $data = (Object)Helper::unserialize_Ajax_Data($req->data);
            $validator = $this->userService->checkInputEdit($data,$req->MaNguoiDung);

            if(is_array($validator))
            {
                return response()->json([
                    'error'=>false,
                    'validateError'=>$validator,
                ]);
            }
            
            if(isset($data->Edit_password))
            {
                $passwordCheck = $this->userService->checkPassword($data,$req->MaNguoiDung);
                if(!$passwordCheck)
                {
                    return response()->json([
                        'error'=>false,
                        'passwordError'=>"Mật khẩu trùng với mật khẩu hiện tại",
                    ]);
                }
            }

            $this->userService->edit($data,$req->MaNguoiDung);

            return response()->json([
                'error'=>false,
                'success'=>"Sửa thành công người dùng mã $req->MaNguoiDung",
            ]);

        }catch(\Exceptions $err)
        {
            return response()->json([
                'error'=>true,
                'message'=>"Đã xảy ra lỗi",
            ]);
        }
    }

    public function delete(Request $req)
    {
        try{
            $this->userService->delete($req);

            return response()->json([
                'error'=>false,
                'success'=>"Xóa thành công người dùng mã $req->MaNguoiDung",
            ]);
        }
        catch(\Exception $err)
        {
            return response()->json([
                'error'=>true,
                'message'=>"Đã xảy ra lỗi",
            ]);
        }
    }

    public function get_NhomQuyen_NguoiDung(Request $req)
    {
        try{
            $NhomQuyen_NguoiDung = $this->userService->get_NhomQUyen_NguoiDung($req);
            
            return response()->json([
                'error'=>false,
                'NhomQuyen_NguoiDung'=>$NhomQuyen_NguoiDung,
            ]);
        }
        catch(\Exception $err)
        {
            return response()->json([
                'error'=>true,
                'message'=>"Đã xảy ra lỗi",
            ]);
        }
    }
}
