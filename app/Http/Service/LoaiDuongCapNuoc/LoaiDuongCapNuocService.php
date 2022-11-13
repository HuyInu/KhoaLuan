<?php

namespace App\Http\Service\LoaiDuongCapNuoc;

use App\Model\LoaiOngCapNuoc;

class LoaiDuongCapNuocService{

    protected $LoaiOngCapNuoc;
    public function __construct(LoaiOngCapNuoc $LoaiOngCapNuoc)
    {
        $this->LoaiOngCapNuoc = $LoaiOngCapNuoc;
    }

    public function get_All_LoaiOngCapNuoc()
    {
        return $this->LoaiOngCapNuoc->get_All();
    }
}