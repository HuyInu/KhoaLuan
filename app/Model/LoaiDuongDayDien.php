<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\DuongDayDien;

class LoaiDuongDayDien extends Model
{
    protected $table='LoaiDuongDayDien';

    public function DuongDayDien()
    {
        return $this->hasMany(DuongDayDien::class,'LoaiDuongDien','MaLoaiDuongDayDien');
    }
}
