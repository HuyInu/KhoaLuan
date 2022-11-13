<?php

namespace App\Http\Controllers\Admin\profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Helper;

use App\Http\Service\profile\profileService;
use App\Http\Service\xa\xaService;

use App\Model\NguoiDung;
use App\Model\DMHuyen;

class profileController extends Controller
{
    protected $profileService;

    public function __construct(profileService $profileService)
    {
        $this->profileService = $profileService;
    }
    public function show()
    {
        $userInfo = Auth::user();
        $avatarSrc = null;
        switch ($userInfo['MaLoaiNguoiDung']) {
            case 1:
                $avatarSrc = '/image/admin.jpg';
                break;
            case 2:
                $avatarSrc = '/image/user-default.jpg';
                break;
            case 3:
                $avatarSrc = '/image/user-default.jpg';
                break;
        }
        
        $duLieuHuyen = $this->profileService->layDuLieuHuyen();
        if(isset($userInfo->MaXa))
        {
            $XaById = $this->profileService->getXaById($userInfo['MaXa']);
            
            $MaHuyen = $XaById[0]['MaHuyen'];
            $duLieuMDXa = $this->profileService->getXaByMaHuyen($MaHuyen);
        }
        else
        {
            $MaHuyen = 0;
            $duLieuMDXa = 0;
        }
        $duLieuCoQuan = $this->profileService->getCoQuan();

        return view('Admin.profile.profile',[
            'avatar'=>$avatarSrc,
            'userInfor'=>$userInfo,
            'duLieuHuyen' => $duLieuHuyen,
            'duLieuXa'=>$duLieuMDXa,
            'duLieuCoQuan' =>  $duLieuCoQuan,
            'MaHuyen' =>$MaHuyen,
            'title'=>"Thông tin cá nhân | HỆ THỐNG GIS QUẢN LÝ HẠ TẦNG KỸ THUẬT ĐÔ THỊ MỸ THO"
        ]);
    }
    
    public function editProfile(Request $req)
    {
        $user = Auth::user();
        $data = (object)Helper::unserialize_Ajax_Data($req->data);
        $Validator = Validator::make((array)$data,[
            'Email'=>"unique:NguoiDung,Email,$user->id,id"
        ]);

        if($Validator->passes())
        {
            $result = $this->profileService->updateProfile($user->id,$data);
            if($result === true)
            {
                return response()->json([
                    'error'=>false,
                    'validate'=>true,
                    'success'=>true
                ]);
            }
            else
            {
                return response()->json([
                    'error'=>true,
                ]);
            }
        }
        else
        {
            return response()->json([
                'error'=>false,
                'validate'=>false,
                'message' => 'Email đã được dùng.'
            ]);
        }
    }

    function layDuLieuXaTuHuyen(Request $req)
    {
        try{
            $duLieuDMXa = $this->profileService->layDuLieuXaTuHuyen($req);

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

    public function changePasswork(Request $req)
    {
        try{
            $data = (object)$req->all();
            $checkOldPassword = $this->profileService->checkOldPassword($data);
            if(!$checkOldPassword)
            {
                return response()->json([
                    'error'=>false,
                    'OldPassworkCheck'=>"Mật khẩu cũ không tồn tại"
                ]);
            }

            $this->profileService->changePassword($data,Auth::user()->id);

            return response()->json([
                'error'=>false,
                'success'=>"Đổi mật khẩu thành công."
            ]);

        }catch(\Excdeption $err)
        {
            return response()->json([
                'error'=>true,
                'message'=>"Xảy ra lỗi"
            ]);
        }

    }
}

