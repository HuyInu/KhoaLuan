<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\DMXa;
class DMHuyen extends Model
{
    protected $table = 'DMHuyen';

    public function DMXa()
    {
        return $this->hasMany(DMXa::class,'MaHuyen','MaHuyen');
    }
    //----------//
    public function getAllDMHuyen()
    {
        return $data = $this::all();
    }
}
