<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\NguoiDung;

class LoaiNguoiDung extends Model
{
    protected $table = "LoaiNguoiDung";

    public function NguoiDung()
    {
        return $this->hasMany(NguoiDung::class,'MaLoaiNguoiDung','MaLoai');
    }
    //----------//
}
