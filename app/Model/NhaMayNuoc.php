<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\DuAnQuyHoach;

class NhaMayNuoc extends Model
{
    protected $table = 'NHAMAYNUOC';

    public function DuAnQuyHoach()
    {
        return $this->belongsTo(DuAnQuyHoach::class,'LoaiDuAnQuyHoach','MaDuAn');
    }

    //=======================

    public function get_by_OBJECTID($OBJECTID)
    {
        return $this::with(['DuAnQuyHoach' => function ($query) { $query->select('TenDuAn');}])->where('OBJECTID','=',$OBJECTID)->get(['Ten','CongSuat','LoaiDuAnQuyHoach']);
    }
}
