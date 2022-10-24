<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\DuAnQuyHoach;
use App\Model\LoaiDuongDayDien;

class DuongDayDien extends Model
{
    protected $table='DUONGDAYDIEN';

    public function DuAnQuyHoach()
    {
      return $this->belongsTo(DuAnQuyHoach::class,'MaDuAnQuyHoach','MaDuAn');
    }

    public function LoaiDuongDayDien()
    {
      return $this->belongsTo(LoaiDuongDayDien::class,'LoaiDuongDien','MaLoaiDuongDayDien');
    }

    //===================================

    public function get_by_ODJECTID($ODJECTID)
    {
        return $this::with(['DuAnQuyHoach' => function ($query) { $query->select('TenDuAn');},'LoaiDuongDayDien'])->where('OBJECTID','=',$ODJECTID)->get(['Ten','LoaiDuongDien','MaDuAnQuyHoach']);
    }
}
