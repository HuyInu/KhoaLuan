<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\DuAnQuyHoach;
use App\Model\LoaiTramBienAp;

class TramBienAp extends Model
{
    protected $table='TRAMBIENAP';

    public function DuAnQuyHoach()
    {
        return $this->belongsTo(DuAnQuyHoach::class,'MaDuAnQuyHoach','MaDuAn');
    }

    public function LoaiTramBienAp()
    {
        return $this->belongsTo(LoaiTramBienAp::class,'MaLoaiTramBienAp','MaLoaiTramBienAp');
    }

    //==================================

    public function get_by_ODJECTID($ODJECTID)
    {
        return $this::with(['DuAnQuyHoach' => function ($query) { $query->select('TenDuAn');},'LoaiTramBienAp'])->where('OBJECTID','=',$ODJECTID)->get(['Ten','MaLoaiTramBienAp','MaDuAnQuyHoach']);
    }
}
