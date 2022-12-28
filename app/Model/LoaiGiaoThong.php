<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\GiaoThong;

class LoaiGiaoThong extends Model
{
    protected $table = 'LoaiDuong';

    
    public function GiaoThong()
    {
        return $this->hasMany(GiaoThong::class,'LoaiDuong','MaLoaiDuong');
    }
}
