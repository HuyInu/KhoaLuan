<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\NguoiDung;

class Quyen extends Model
{
    protected $table='Quyen';
    protected $primaryKey = 'MaQuyen';

    public function NhomQuyen()
    {
        return $this->belongsToMany(NhomQuyen::class,'NhomQuyen_Quyen','MaQuyen','MaNhomQuyen');
    }
    public function NguoiDung()
    {
        return $this->belongsToMany(NguoiDung::class,'NguoiDung_Quyen','MaQuyen','id');
    }
    ///*----
    
    public function getAll()
    {
        return $this::all();
    }
}
