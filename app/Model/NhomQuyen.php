<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\NguoiDung;
use App\Model\Quyen;

class NhomQuyen extends Model
{
    protected $table = 'NhomQuyen';
    protected $primaryKey = 'MaNhomQuyen';
    public $timestamps = false;

    public function NguoiDung()
    {
        return $this->belongsToMany(NguoiDung::class,'NguoiDung_NhomQuyen','MaNhomQuyen','id');
    }

    public function Quyen()
    {
        return $this->belongsToMany(Quyen::class,'NhomQuyen_Quyen','MaNhomQuyen','MaQuyen');
    }
    //------

    public function getAll()
    {
        return $this::all();
    }

    public function get_Quyen_by_NhomQuyen($MaNhomQuyen)
    {
        return $this::with(['Quyen'])->where('MaNhomQuyen','=',$MaNhomQuyen)->get();
    }

    public function get_ID_NguoiDung_by_NhomQuyen($MaNhomQuyen)
    {
        return $this::with(['NguoiDung'])->where('MaNhomQuyen','=',$MaNhomQuyen)->get()->pluck('NguoiDung.*.id');
    }
    //-----

    public function them($TenNhomQuyen)
    {
        $NhomQuyen = new $this;

        $NhomQuyen->TenNhomQuyen = $TenNhomQuyen;

        $NhomQuyen->save();

        return $NhomQuyen->MaNhomQuyen;
    }

    public function sua($MaNhomQuyen,$TenNhomQuyen)
    {
        $NhomQuyen = $this::find($MaNhomQuyen);

        $NhomQuyen->TenNhomQuyen = $TenNhomQuyen;

        $NhomQuyen->save();
    }

    public function xoa($MaNhomQuyen)
    {
        $NhomQuyen = $this::find($MaNhomQuyen);

        $NhomQuyen->delete();
    }

    public function them_NhomQuyen_Quyen($MaNhomQuyen,$QuyenIDArray)
    {
        $NhomQuyen = $this::find($MaNhomQuyen);
        $NhomQuyen->Quyen()->sync($QuyenIDArray);
    }

    public function them_NhomQuyen_NguoiDung($MaNhomQuyen,$NguoiDungIDArray)
    {
        $NhomQuyen = $this::find($MaNhomQuyen);
        $NhomQuyen->NguoiDung()->sync($NguoiDungIDArray);
    }
}
