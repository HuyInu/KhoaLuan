<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\LoaiDuAn;
use App\Model\TienDoDuAn;
use App\Model\LoaiQuyHoach;

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
    //-------

    public function getAll()
    {
        return $this::with(['LoaiQuyHoach'])->get();
    }

    public function getID_Name()
    {
        return $this::all(['MaDuAn','TenDuAn']);
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
