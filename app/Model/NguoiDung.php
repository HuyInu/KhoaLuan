<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Model\CoQuan;
use App\Model\LoaiNguoiDung;
use App\Model\DMXa;


class NguoiDung extends Authenticatable
{
    use Notifiable;
    protected $table='NguoiDung';
    public $timestamps = false;

    public function CoQuan()
    {
        return $this->belongTo(CoQuan::class,'MaCoQuan','MaCoQuan');
    }

    public function LoaiNguoiDung()
    {
        return $this->belongTo(LoaiNguoiDung::class,'MaLoaiNguoiDung','MaLoai');
    }

    public function DMXa()
    {
        return $this->belongTo(DMXa::class,'MaXa','MaXa');
    }
    //----------//
    public function updateNguoiDung($userId,$TenDangNhap, $Ho,$Ten,$Email,$DienThoai,$MaCoQuan,$MaXa,$GioiTinh,$DiaChi)
    {
        $user = $this::find(1);

        $user->TenDangNhap = $TenDangNhap;
        $user->Ho = $Ho;
        $user->Ten = $Ten;
        $user->Email = $Email;
        $user->DienThoai = $DienThoai;
        $user->MaCoQuan = $MaCoQuan;
        $user->MaXa = $MaXa;
        $user->GioiTinh = $GioiTinh;  
        $user->DiaChi = $DiaChi;
        $user->save();
    }

    public function updatePassword($newPassword,$userId)
    {
        $this::where('id','=',$userId)->update([
            'password' =>Hash::make($newPassword)
        ]);
    }

}
