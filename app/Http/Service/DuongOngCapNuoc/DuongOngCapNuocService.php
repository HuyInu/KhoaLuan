<?php

namespace App\Http\Service\DuongOngCapNuoc;
use App\Model\DuongOngCapNuoc;

class DuongOngCapNuocService{

    protected $DuongOngCapNuoc;
    public function __construct(DuongOngCapNuoc $DuongOngCapNuoc)
    {
        $this->DuongOngCapNuoc = $DuongOngCapNuoc;
    }
}