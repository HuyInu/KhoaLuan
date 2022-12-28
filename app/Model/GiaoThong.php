<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\LoaiGiaoThong;
use App\Model\DuAnQuyHoach;

class GiaoThong extends Model
{
    protected $table = 'GiaoThong';

    public function LoaiGiaoThong()
    {
        return $this->belongsTo(LoaiGiaoThong::class,'LoaiDuong','MaLoaiDuong');
    }

    public function DuAnQuyHoach()
    {
        return $this->belongsTo(DuAnQuyHoach::class,'MaDuAnQuyHoach','MaDuAn');
    }

    public function getAll()
    {
        return $this::with(['LoaiGiaoThong','DuAnQuyHoach'])->get();
    }
}
