<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\DuAnQuyHoach;

class TienDoDuAn extends Model
{
    protected $table ='TienDoDuAn';

    public function DuAnQuyHoach()
    {
        return $this->hasMany(DuAnQuyHoach::class,'MaTienDoDuAn','id');
    }
    //----------

    public function sort_By_TenDuAnQuyHoach_Asc()
    {
        return $this::orderBy('TenTienDoDuAn','asc')->get();
    }
}
