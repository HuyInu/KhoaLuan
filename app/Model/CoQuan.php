<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\NguoiDung;

class CoQuan extends Model
{
    protected $table ='CoQuan';

    public function NguoiDung()
    {
        return $this->hasMany(NguoiDung::class,'MaCoQuan','MaCoQuan');
    }

    public function getCoQuan()
    {
        return $this::all();
    }
}
