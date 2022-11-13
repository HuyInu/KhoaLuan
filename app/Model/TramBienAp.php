<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\DuAnQuyHoach;
use App\Model\LoaiTramBienAp;

class TramBienAp extends Model
{
    protected $table='TRAMBIENAP';
    public $timestamps = false;

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
        return $this::with(['DuAnQuyHoach' => function ($query) { $query->select('MaDuAn','TenDuAn');},'LoaiTramBienAp'])->where('OBJECTID','=',$ODJECTID)->get(['Ten','MaLoaiTramBienAp','MaDuAnQuyHoach']);
    }

    public function get_All()
    {
        return $this::with(['DuAnQuyHoach' => function ($query) { $query->select('MaDuAn','TenDuAn');},'LoaiTramBienAp'])->get(['OBJECTID', 'Ten','MaLoaiTramBienAp','MaDuAnQuyHoach']);
    }

    public function sua($OBJECTID, $Ten, $MaLoaiTramBienAp, $MaDuAnQuyHoach)
    {
        $this::where('OBJECTID','=',$OBJECTID)->update([
            'Ten' => $Ten,
            'MaLoaiTramBienAp' => $MaLoaiTramBienAp,
            'MaDuAnQuyHoach' => $MaDuAnQuyHoach
        ]);
    }

    public function xoa($OBJECTID)
    {
        $this::where('OBJECTID','=',$OBJECTID)->delete();
    }
}
