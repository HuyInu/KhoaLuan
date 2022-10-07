<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\NhomQuyen;

class Quyen extends Model
{
    protected $table='Quyen';
    protected $primaryKey = 'MaQuyen';

    public function NhomQuyen()
    {
        return $this->belongsToMany(NhomQuyen::class,'NhomQuyen_Quyen','MaQuyen','MaNhomQuyen');
    }
    ///*----
    
    public function getAll()
    {
        return $this::all();
    }
}
