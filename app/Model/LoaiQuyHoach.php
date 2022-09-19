<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\DuAnQuyHoach;

class LoaiQuyHoach extends Model
{
    protected $table = 'LoaiQuyHoach';

    public function DuAnQuyHoach()
    {
        return $this->hasMany(DuAnQuyHoach::class,'MaLoaiQuyHoach','MaLoaiQuyHoach');
    }

    //-------
    public function getAll()
    {
        return $this::all();
    }
}
