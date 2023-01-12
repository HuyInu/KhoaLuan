<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\DuAnQuyHoach;
use App\Model\DMLoaiDatQHXD;

class SuDungDat extends Model
{
    protected $table='SUDUNGDAT';
    public $timestamps = false;


    public function DuAnQuyHoach()
    {
        return $this->belongsTo(DuAnQuyHoach::class,'MaDuAnQuyHoach','MaDuAn');
    }

    public function DMLoaiDatQHXD()
    {
        return $this->belongsTo(DMLoaiDatQHXD::class,'MaLoaiDatQHXD','MaLoaiDat');
    }

    //======================================

    public function get_All()
    {
        return $this::with(['DuAnQuyHoach'  => function ($query) { $query->select('MaDuAn','TenDuAn');},'DMLoaiDatQHXD'])->get(['OBJECTID','MaLoDat','MaDuAnQuyHoach','MaLoaiDatQHXD','DienTich','HeSoSuDungDat','TangCaoXayDung','MatDoXayDung','TenLoaiDatTheoDA']);
    }

    public function get_By_ID($OBJECTID)
    {
        return $this::where('OBJECTID','=',$OBJECTID)->get(['OBJECTID','MaLoDat','MaDuAnQuyHoach','MaLoaiDatQHXD','DienTich','HeSoSuDungDat','TangCaoXayDung','MatDoXayDung','TenLoaiDatTheoDA']);
    }

    public function sua($OBJECTID, $MaDuAnQuyHoach, $MaLoaiDatQHXD/*,$DienTich*/,$HeSoSuDungDat,$TangCaoXayDung,$MatDoXayDung,$TenLoaiDatTheoDA)
    {
        $this::where('OBJECTID','=',$OBJECTID)->update([
            'MaDuAnQuyHoach' => $MaDuAnQuyHoach,
            'MaLoaiDatQHXD' => $MaLoaiDatQHXD,
            //'DienTich' => $DienTich,
            'HeSoSuDungDat' => $HeSoSuDungDat,
            'TangCaoXayDung' => $TangCaoXayDung,
            'MatDoXayDung' => $MatDoXayDung,
            'TenLoaiDatTheoDA' => $TenLoaiDatTheoDA,
        ]);
    }

    public function xoa($OBJECTID)
    {
        $this::where('OBJECTID','=',$OBJECTID)->delete();
    }
}
