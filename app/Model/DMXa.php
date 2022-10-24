<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\NguoiDung;
use App\Model\DMHuyen;
use App\Model\ThuaDat;

class DMXa extends Model
{
   protected $table = 'DMXa';

   public function NguoiDung()
   {
      return $this->hasMany(NguoiDung::class,'MaXa','MaXa');
   }

   public function DMHuyen()
    {
        return $this->belongsTo(DMHuyen::class,'MaHuyen','MaHuyen');
    }

   public function ThuaDat()
   {
      return $this->hasMany(ThuaDat::class,'MaXa','MaXa');
   }
   //----------//

   public function getXaById($MaXa)
   {
      return $this::where('MaXa',$MaXa)->get();
   }

   public function getXaByMaHuyen($MaHuyen)
   {
      return $this::where('MaHuyen',$MaHuyen)->get();
   }
}
