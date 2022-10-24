<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\DuongOngCapNuoc;

class LoaiOngCapNuoc extends Model
{
    protected $table='LoaiOngCapNuoc';

    public function DuongOngCapNuoc()
    {
        return $this->hasMany(DuongOngCapNuoc::class,'LoaiOngCapNuoc','MaLoai');
    }
}
