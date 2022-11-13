<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Model\CoQuan;
use App\Model\LoaiNguoiDung;
use App\Model\DMXa;
use App\Model\NhomQuyen;


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

    public function NhomQuyen()
    {
        return $this->belongsToMany(NhomQuyen::class,'NguoiDung_NhomQuyen','id','MaNhomQuyen');
    }
    //----------//
    public function getAll()
    {
        return $this::with(['LoaiNguoiDung','CoQuan'])->where('MaLoaiNguoiDung','!=',1)->orderByRaw('-MaCoQuan DESC')->get(['id','TenDangNhap','Ho','Ten','Email','GioiTinh','MaLoaiNguoiDung','MaCoQuan','DienThoai']);
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
                                    $TenDangNhap,
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

        $user->TenDangNhap = $TenDangNhap;
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

    public function get_NhomQuyen_NguoiDung($MaNguoiDung)
    {
        return $this::with('NhomQuyen','NhomQuyen.Quyen')->where('id','=',$MaNguoiDung)->get(['id','TenDangNhap']);
    }
}
