<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\LoaiDuAn;
use App\Model\TienDoDuAn;
use App\Model\LoaiQuyHoach;

class DuAnQuyHoach extends Model
{
    protected $table = 'DuAnQuyHoach';
    public $timestamps = false;

    public function LoaiDuAn()
    {
        return $this->belongsTo(LoaiDuAn::class,'MaCoQuan','MaCoQuan');
    }

    public function TienDoDuAn()
    {
        return $this->belongsTo(TienDoDuAn::class,'MaTienDoDuAn','id');
    }

    public function LoaiQuyHoach()
    {
        return $this->belongsTo(LoaiQuyHoach::class,'MaLoaiQuyHoach','MaLoaiQuyHoach');
    }
    //-------

    public function getAll()
    {
        return $this::with(['LoaiQuyHoach'])->get();
    }
}
