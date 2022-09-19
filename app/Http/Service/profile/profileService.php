<?php
namespace App\Http\Service\profile;

use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

use App\Http\Request\profile\profileRequest;
use App\Model\NguoiDung;
use App\Model\DMHuyen;
use App\Model\DMXa;
use App\Model\CoQuan;
use App\Model\PasswordReset;

class profileService{

    protected $DMHuyen;
    protected $DMXa;
    protected $profileRequest;
    protected $PasswordReset;
    protected $NguoiDung;
    protected $CoQuan;
    
    public function __construct(DMHuyen $DMHuyen,
                                profileRequest $profileRequest,
                                PasswordReset $PasswordReset,
                                NguoiDung $NguoiDung,
                                DMXa $DMXa,
                                CoQuan $CoQuan)
    {
        $this->DMHuyen = $DMHuyen;
        $this->DMXa = $DMXa;
        $this->profileRequest = $profileRequest;
        $this->PasswordReset = $PasswordReset;
        $this->NguoiDung = $NguoiDung;
        $this->CoQuan = $CoQuan;
    }

    public function setNullInput($value, $input)
    {
        if($input == $value)
        {
            return null;
        }
        else
        {
            return $input;
        }
    }

    public function updateProfile($userId,$req)
    {
        try{
            $req->MaCoQuan = $this->setNullInput('0',$req->MaCoQuan);
            $req->MaXa = $this->setNullInput('0',$req->MaXa);
            $req->GioiTinh = $this->setNullInput('None',$req->GioiTinh);

            $this->NguoiDung->updateNguoiDung($userId,
                                            (string)$req->TenDangNhap,
                                            (string) $req->Ho,
                                            (string)$req->Ten,
                                            (string)$req->Email,
                                            (string)$req->DienThoai,
                                            $req->MaCoQuan,
                                            $req->MaXa,
                                            $req->GioiTinh,
                                            (string)$req->DiaChi);
            return true;
        }
        catch(\Exception $err)
        {
            return false;
        }
    }

    public function layDuLieuHuyen()
    {
        return $this->DMHuyen->getAllDMHuyen();
    }

    public function layDuLieuXaTuHuyen($req)
    {
        try
        {
            return $data = DMXa::where('MaHuyen','=',$req->MaHuyen)->get(['MaXa','TenXa']);
        }catch(\Exception $err)
        {
            return false;
        }      
    }

    function getXaById($MaXa)
    {
        return $this->DMXa->getXaById($MaXa)->toArray();
    }

    function getXaByMaHuyen($MaHuyen)
    {
        return $this->DMXa->getXaByMaHuyen($MaHuyen)->toArray();
    }

    function getCoQuan()
    {
        return $this->CoQuan->getCoQuan();
    }

    public function checkOldPassword($req)
    {
        if(!Hash::check($req->passwordOld, Auth::user()->password)){
            return false;
        }
        
            return true;
    }

    public function changePassword($req,$userId)
    {
        $this->NguoiDung->updatePassword($req->passwordNew_confirm,$userId);
    }
}