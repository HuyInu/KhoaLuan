<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\SuDungDat;

class DMLoaiDatQHXD extends Model
{
    protected $table = 'DMLoaiDatQHXD';

    public function SuDungDat()
    {
        return $this->hasMany(SuDungDat::class,'MaLoaiDatQHXD','MaLoaiDat');
    }

    //====================

    public function getAll()
    {
        return $this::all();
    }
}
