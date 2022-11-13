<?php 
namespace App\Http\Service\LoaiTramBienAp;

use App\Model\LoaiTramBienAp;

class LoaiTramBienApService{
    protected $LoaiTramBienAp;

    public function __construct(LoaiTramBienAp $LoaiTramBienAp)
    {
        $this->LoaiTramBienAp = $LoaiTramBienAp;
    }

    public function get_All_LoaiTramBienAp()
    {
        return $this->LoaiTramBienAp->get_All();
    }
}