<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\TramBienAp;

class LoaiTramBienAp extends Model
{
    protected $table='LoaiTramBienAp';

    public function TramBienAp()
    {
        return $this->hasMany(TramBienAp::class,'MaLoaiTramBienAp','MaLoaiTramBienAp');
    }
}
