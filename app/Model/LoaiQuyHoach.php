<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\DuAnQuyHoach;

class LoaiQuyHoach extends Model
{
    protected $table = 'LoaiQuyHoach';
    public $timestamps = false;

    public function DuAnQuyHoach()
    {
        return $this->hasMany(DuAnQuyHoach::class,'MaLoaiQuyHoach','MaLoaiQuyHoach');
    }

    //-------
    public function getAll()
    {
        return $this::all();
    }

    public function them($MaLoaiQuyHoach, $TenLoaiQuyHoach)
    {
        $LoaiQuyHoach = new $this;

        $LoaiQuyHoach->MaLoaiQuyHoach = $MaLoaiQuyHoach;
        $LoaiQuyHoach->TenLoaiQuyHoach = $TenLoaiQuyHoach;

        $LoaiQuyHoach->save();
    }

    public function get_By_Id($MaLoaiQuyHoach)
    {
        return $this::where('MaLoaiQuyHoach','=',$MaLoaiQuyHoach)->get();
    }

    public function sua($MaLoaiQuyHoachOld, $MaLoaiQuyHoach, $TenLoaiQuyHoach)
    {
        $this::where('MaLoaiQuyHoach','=',$MaLoaiQuyHoachOld)->update([
            'MaLoaiQuyHoach' =>$MaLoaiQuyHoach,
            'TenLoaiQuyHoach' =>$TenLoaiQuyHoach
        ]);
    }

    public function xoa($MaLoaiQuyHoach)
    {
        $this::where('MaLoaiQuyHoach','=',$MaLoaiQuyHoach)->delete();
    }
}
