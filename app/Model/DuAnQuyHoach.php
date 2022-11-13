<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\LoaiDuAn;
use App\Model\TienDoDuAn;
use App\Model\LoaiQuyHoach;
use App\Model\DuongDayDien;
use App\Model\DuongOngCapNuoc;
use App\Model\TramBienAp;
use App\Model\NhaMayNuoc;
use App\Model\SuDungDat;


class DuAnQuyHoach extends Model
{
    protected $table = 'DuAnQuyHoach';
    public $timestamps = false;

    public function LoaiDuAn()
    {
        return $this->belongsTo(LoaiDuAn::class,'MaCoQuan','MaCoQuan');
    }

    public function TienDoDuAn()
    {
        return $this->belongsTo(TienDoDuAn::class,'MaTienDoDuAn','id');
    }

    public function LoaiQuyHoach()
    {
        return $this->belongsTo(LoaiQuyHoach::class,'MaLoaiQuyHoach','MaLoaiQuyHoach');
    }

    public function DuongDayDien()
    {
        return $this->hasMany(DuongDayDien::class,'MaDuAnQuyHoach','MaDuAn');
    }

    public function DuongOngCapNuoc()
    {
        return $this->hasMany(DuongOngCapNuoc::class,'LoaiDuAnQuyHoach','MaDuAn');
    }

    public function TramBienAp()
    {
        return $this->hasMany(TramBienAp::class,'MaDuAnQuyHoach','MaDuAn');
    }

    public function NhaMayNuoc()
    {
        return $this->hasMany(NhaMayNuoc::class,'LoaiDuAnQuyHoach','MaDuAn');
    }

    public function SuDungDat()
    {
        return $this->hasMany(SuDungDat::class,'MaDuAnQuyHoach','MaDuAn');
    }
    //-------

    public function getAll()
    {
        return $this::with(['LoaiQuyHoach'])->get();
    }

    public function getID_Name()
    {
        return $this::all(['MaDuAn','TenDuAn']);
    }

    public function get_by_OBJECTID($MaDuAn)
    {
        return $this::where('MaDuAn','=',$MaDuAn)->get();
    }


    public function edit($MaDuAn,
                        $TenDuAn,
                        $TinhTrangPheDuyet,
                        $NgayKyQuyetDinh,
                        $SoQuyetDinhPheDuyet,
                        $QuyMoDanSo,
                        $TyLeBanVe,$DienTich,
                        $ThoiGianXinPheDuyet,
                        $ThoiGianQuyHoach,
                        $ThoiGianLayYKien,
                        $ThoiGianCongBo,
                        $DonViQuanLy,
                        $DonViCapNhat,
                        $MaLoaiDuAn,
                        $MaTienDoDuAn,
                        $MaLoaiQuyHoach
                        )
    {
        $this::where('MaDuAn','=',$MaDuAn)->update(['TenDuAn'=>$TenDuAn,
                                                    'TinhTrangPheDuyet'=>$TinhTrangPheDuyet,
                                                    'NgayKyQuyetDinh'=>$NgayKyQuyetDinh,
                                                    'SoQuyetDinhPheDuyet'=>$SoQuyetDinhPheDuyet,
                                                    'QuyMoDanSo'=>$QuyMoDanSo,
                                                    'TyLeBanVe'=>$TyLeBanVe,
                                                    'DienTich'=>$DienTich,
                                                    'ThoiGianXinPheDuyet'=>$ThoiGianXinPheDuyet,
                                                    'ThoiGianQuyHoach'=>$ThoiGianQuyHoach,
                                                    'ThoiGianLayYKien'=>$ThoiGianLayYKien,
                                                    'ThoiGianCongBo'=>$ThoiGianCongBo,
                                                    'DonViQuanLy'=>$DonViQuanLy,
                                                    'DonViCapNhat'=>$DonViCapNhat,
                                                    'MaLoaiDuAn'=>$MaLoaiDuAn,
                                                    'MaTienDoDuAn'=>$MaTienDoDuAn,
                                                    'MaLoaiQuyHoach'=>$MaLoaiQuyHoach
                                                ]);
    }

    public function xoa($MaDuAn){
        $this::where('MaDuAn','=',$MaDuAn)->delete();
    }

    public function create($MaDuAn,
                        $TenDuAn,
                        $TinhTrangPheDuyet,
                        $NgayKyQuyetDinh,
                        $SoQuyetDinhPheDuyet,
                        $QuyMoDanSo,
                        $TyLeBanVe,$DienTich,
                        $ThoiGianXinPheDuyet,
                        $ThoiGianQuyHoach,
                        $ThoiGianLayYKien,
                        $ThoiGianCongBo,
                        $DonViQuanLy,
                        $DonViCapNhat,
                        $MaLoaiDuAn,
                        $MaTienDoDuAn,
                        $MaLoaiQuyHoach)
    {
        $this::insert([
                    'MaDuAn' => $MaDuAn,
                    'TenDuAn'=>$TenDuAn,
                    'TinhTrangPheDuyet'=>$TinhTrangPheDuyet,
                    'NgayKyQuyetDinh'=>$NgayKyQuyetDinh,
                    'SoQuyetDinhPheDuyet'=>$SoQuyetDinhPheDuyet,
                    'QuyMoDanSo'=>$QuyMoDanSo,
                    'TyLeBanVe'=>$TyLeBanVe,
                    'DienTich'=>$DienTich,
                    'ThoiGianXinPheDuyet'=>$ThoiGianXinPheDuyet,
                    'ThoiGianQuyHoach'=>$ThoiGianQuyHoach,
                    'ThoiGianLayYKien'=>$ThoiGianLayYKien,
                    'ThoiGianCongBo'=>$ThoiGianCongBo,
                    'DonViQuanLy'=>$DonViQuanLy,
                    'DonViCapNhat'=>$DonViCapNhat,
                    'MaLoaiDuAn'=>$MaLoaiDuAn,
                    'MaTienDoDuAn'=>$MaTienDoDuAn,
                    'MaLoaiQuyHoach'=>$MaLoaiQuyHoach
                ]);
    }
}
