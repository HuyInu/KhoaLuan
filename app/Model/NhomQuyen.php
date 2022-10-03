<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\NguoiDung;

class NhomQuyen extends Model
{
    protected $table = 'NhomQuyen';

    public function NguoiDung()
    {
        return $this->belongsToMany(NguoiDung::class,'id','id');
    }
    //------

    public function getAll()
    {
        return $this::all();
    }
}
