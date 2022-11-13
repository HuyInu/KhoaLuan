<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\DuAnQuyHoach;
use App\Model\LoaiDuongDayDien;

class DuongDayDien extends Model
{
    protected $table='DUONGDAYDIEN';
    public $timestamps = false;

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
        return $this::with(['DuAnQuyHoach' => function ($query) { $query->select('MaDuAn','TenDuAn');},'LoaiDuongDayDien'])->where('OBJECTID','=',$ODJECTID)->get(['Ten','LoaiDuongDien','MaDuAnQuyHoach']);
    }

    public function get_All()
    {
      return $this::with(['DuAnQuyHoach' => function($query){$query->select('MaDuAn','TenDuAn');}, 'LoaiDuongDayDien'])->get(['OBJECTID','LoaiDuongDien', 'Ten', 'MaDuAnQuyHoach']);
    }

    public function sua($OBJECTID, $LoaiDuongDien, $Ten, $MaDuAnQuyHoach)
    {
      $this::where('OBJECTID','=',$OBJECTID)->update([
        'LoaiDuongDien' => $LoaiDuongDien,
        'Ten' => $Ten,
        'MaDuAnQuyHoach' => $MaDuAnQuyHoach,
      ]);
    }

    public function xoa($OBJECTID)
    {
      $this::where('OBJECTID','=',$OBJECTID)->delete();
    }
}
