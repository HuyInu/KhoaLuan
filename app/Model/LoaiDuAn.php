<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\DuAnQuyHoach;

class LoaiDuAn extends Model
{
    protected $table = 'LoaiDuAn';
    public $timestamps = false;

    public function DuAnQuyHoach()
    {
        return $this->hasMany(DuAnQuyHoach::class,'MaLoaiDuAn','MaLoaiDuAn');
    }
    //----------

    public function sort_by_TenLoaiDuAn_Asc()
    {
        return $this::orderBy('TenLoaiDuAn','Asc')->whereNotIn('MaloaiDuAn',['K'])->get();
    }

    public function get_By_Id($MaLoaiDuAn)
    {
        return $this::where('MaLoaiDuAn','=',$MaLoaiDuAn)->whereNotIn('MaloaiDuAn',['K'])->get();
    }

    public function them($MaLoaiDuAn, $TenLoaiDuAn)
    {
        $this::insert([
            'MaLoaiDuAn'=>$MaLoaiDuAn,
            'TenLoaiDuAn' => $TenLoaiDuAn
        ]);
    }

    public function sua($MaLoaiDuAnOld, $MaLoaiDuAn, $TenLoaiDuAn)
    {
        $this::where('MaLoaiDuAn','=',$MaLoaiDuAnOld)->update([
            'MaLoaiDuAn'=>$MaLoaiDuAn,
            'TenLoaiDuAn' => $TenLoaiDuAn
        ]);
    }

    public function xoa($MaLoaiDuAn)
    {
        $this::where('MaLoaiDuAn','=',$MaLoaiDuAn)->delete();
    }
}
