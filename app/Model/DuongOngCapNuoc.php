<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\DuAnQuyHoach;
use App\Model\LoaiOngCapNuoc;

class DuongOngCapNuoc extends Model
{
    protected $table ='DUONGONGCAPNUOC';

    public function DuAnQuyHoach()
    {
        return $this->belongsTo(DuAnQuyHoach::class,'LoaiDuAnQuyHoach','MaDuAn');
    }

    public function LoaiOngCapNuoc()
    {
        return $this->belongsTo(LoaiOngCapNuoc::class,'LoaiOngCapNuoc','MaLoai');
    }

    //=====================================================
    public function getOngCapNuoc_by_ODJECTID($ODJECTID)
    {
        return $this::with(['DuAnQuyHoach' => function ($query) { $query->select('TenDuAn');},'LoaiOngCapNuoc'])->where('OBJECTID','=',$ODJECTID)->get(['DuongKinh','ChieuDai','LoaiOngCapNuoc','LoaiDuAnQuyHoach']);
    }
}
