<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Model\CoQuan;
use App\Model\LoaiNguoiDung;
use App\Model\DMXa;
use App\Model\Quyen;


class NguoiDung extends Authenticatable
{
    use Notifiable;
    protected $table='NguoiDung';
    public $timestamps = false;

    public function CoQuan()
    {
        return $this->belongsTo(CoQuan::class,'MaCoQuan','MaCoQuan');
    }

    public function LoaiNguoiDung()
    {
        return $this->belongsTo(LoaiNguoiDung::class,'MaLoaiNguoiDung','MaLoai');
    }

    public function DMXa()
    {
        return $this->belongsTo(DMXa::class,'MaXa','MaXa');
    }

    public function Quyen()
    {
        return $this->belongsToMany(Quyen::class,'NguoiDung_Quyen','id','MaQuyen');
    }
    //----------//
    public function getAll()
    {
        return $this::with(['LoaiNguoiDung','CoQuan'])->where('MaLoaiNguoiDung','!=',1)->get(['id','TenDangNhap','Ho','Ten','Email','GioiTinh','MaLoaiNguoiDung','MaCoQuan','DienThoai']);
    }

    public function getNguoiDung_CoQuan()
    {

    }

    public function getByID($id)
    {
        return $this::find($id);
    }
    public function getUserPassword($id)
    {
        $user = $this::find($id);
        return $user->password;
    }
    public function them(
                        $TenDangNhap = null,
                        $Ho = null,
                        $Ten = null,
                        $Email = null,
                        $DienThoai = null,
                        $MaCoQuan = null,
                        $MaXa = null,
                        $GioiTinh = null,
                        $DiaChi = null,
                        $password = null,
                        $MaLoaiNguoiDung = null
                        )
    {
        $user = new $this;
        $user->TenDangNhap = $TenDangNhap;
        $user->Ho = $Ho;
        $user->Ten = $Ten;
        $user->Email = $Email;
        $user->DienThoai = $DienThoai;
        $user->MaCoQuan = $MaCoQuan;
        $user->MaXa = $MaXa;
        $user->GioiTinh = $GioiTinh;  
        $user->DiaChi = $DiaChi;
        $user->password = $password;
        $user->MaLoaiNguoiDung = $MaLoaiNguoiDung;
        $user->save();

        return $user->id;
    }

    public function updateNguoiDung($userId,
                                    $TenDangNhap=null,
                                    $Ho,
                                    $Ten,
                                    $Email,
                                    $DienThoai,
                                    $MaCoQuan,
                                    $MaXa,
                                    $GioiTinh,
                                    $DiaChi,
                                    $MaLoaiNguoiDung,
                                    $password=null)
    {
        $user = $this::find($userId);
        if($TenDangNhap != null)
        {
            $user->TenDangNhap = $TenDangNhap;
        }
       
        $user->Ho = $Ho;
        $user->Ten = $Ten;
        $user->Email = $Email;
        $user->DienThoai = $DienThoai;
        $user->MaCoQuan = $MaCoQuan;
        $user->MaXa = $MaXa;
        $user->GioiTinh = $GioiTinh;  
        $user->DiaChi = $DiaChi;

        if($MaLoaiNguoiDung){
            $user->MaLoaiNguoiDung = $MaLoaiNguoiDung;
        }
        if($password)
        {
            $user->password = $password;
        }
        $user->save();
    }

    public function updatePassword($newPassword,$userId)
    {
        $this::where('id','=',$userId)->update([
            'password' =>Hash::make($newPassword)
        ]);
    }

    public function xoa($userId)
    {
        $user = $this::find($userId);
        $user->delete();
    }

    public function get_NguoiDung_Quyen($MaNguoiDung)
    {
        return $this::with('Quyen')->where('id','=',$MaNguoiDung)->get(['id','TenDangNhap']);
    }

    public function get_Quyen_by_NguoiDung($MaNguoiDung)
    {
        return $this::with(['Quyen'])->where('id','=',$MaNguoiDung)->get();
    }

    public function them_Quyen_Cho_NguoiDung($MaNguoiDung,$QuyenIDArray)
    {
        $NguoiDung = $this::find($MaNguoiDung);
        $NguoiDung->Quyen()->sync($QuyenIDArray);
    }
}
