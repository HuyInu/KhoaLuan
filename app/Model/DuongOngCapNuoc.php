<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\DuAnQuyHoach;
use App\Model\LoaiOngCapNuoc;

class DuongOngCapNuoc extends Model
{
    protected $table ='DUONGONGCAPNUOC';
    public $timestamps = false;

    public function DuAnQuyHoach()
    {
        return $this->belongsTo(DuAnQuyHoach::class,'LoaiDuAnQuyHoach','MaDuAn');
    }

    public function LoaiDuongOngCapNuoc()
    {
        return $this->belongsTo(LoaiOngCapNuoc::class,'LoaiOngCapNuoc','MaLoai');
    }

    //=====================================================
    public function getAll()
    {
        return $this::with(['DuAnQuyHoach' => function ($query) { $query->select('MaDuAn', 'TenDuAn');},'LoaiDuongOngCapNuoc'])->get(['OBJECTID','DuongKinh','ChieuDai','LoaiOngCapNuoc','LoaiDuAnQuyHoach']);
    }

    public function getOngCapNuoc_by_ODJECTID($ODJECTID)
    {
        return $this::with(['DuAnQuyHoach' => function ($query) { $query->select('MaDuAn', 'TenDuAn');},'LoaiDuongOngCapNuoc'])->where('OBJECTID','=',$ODJECTID)->get(['DuongKinh','ChieuDai','LoaiOngCapNuoc','LoaiDuAnQuyHoach']);
    }

    public function sua($OBJECTID, $DuongKinh, /*$ChieuDai,*/ $LoaiOngCapNuoc, $LoaiDuAnQuyHoach)
    {
        $this::where('OBJECTID','=',$OBJECTID)->update([
            'DuongKinh' => $DuongKinh,
            //'ChieuDai' => $ChieuDai,
            'LoaiOngCapNuoc' => $LoaiOngCapNuoc,
            'LoaiDuAnQuyHoach' => $LoaiDuAnQuyHoach,
        ]);
    }

    public function xoa($OBJECTID)
    {
       $this::where('OBJECTID','=',$OBJECTID)->delete();
    }
}
