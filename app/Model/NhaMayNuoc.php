<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\DuAnQuyHoach;

class NhaMayNuoc extends Model
{
    protected $table = 'NHAMAYNUOC';
    public $timestamps = false;

    public function DuAnQuyHoach()
    {
        return $this->belongsTo(DuAnQuyHoach::class,'LoaiDuAnQuyHoach','MaDuAn');
    }

    //=======================
    public function get_All()
    {
        return $this::with(['DuAnQuyHoach' => function ($query) { $query->select('MaDuAn','TenDuAn');}])->get(['OBJECTID','Ten','CongSuat','LoaiDuAnQuyHoach']);
    }

    public function get_by_OBJECTID($OBJECTID)
    {
        return $this::with(['DuAnQuyHoach' => function ($query) { $query->select('MaDuAn','TenDuAn');}])->where('OBJECTID','=',$OBJECTID)->get(['Ten','CongSuat','LoaiDuAnQuyHoach']);
    }

    public function sua($OBJECTID, $Ten, $CongSuat, $LoaiDuAnQuyHoach)
    {
        $this::where('OBJECTID','=',$OBJECTID)->update([
            'Ten' => $Ten,
            'CongSuat' => $CongSuat,
            'LoaiDuAnQuyHoach' => $LoaiDuAnQuyHoach,
        ]);
    }

    public function xoa($OBJECTID)
    {
        $this::where('OBJECTID','=',$OBJECTID)->delete();
    }
}
