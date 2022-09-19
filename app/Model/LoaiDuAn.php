<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\DuAnQuyHoach;

class LoaiDuAn extends Model
{
    protected $table = 'LoaiDuAn';

    public function DuAnQuyHoach()
    {
        return $this->hasMany(DuAnQuyHoach::class,'MaLoaiDuAn','MaLoaiDuAn');
    }
    //----------

    public function sort_by_TenLoaiDuAn_Asc()
    {
        return $this::orderBy('TenLoaiDuAn','Asc')->whereNotIn('MaloaiDuAn',['K'])->get();
    }
}
