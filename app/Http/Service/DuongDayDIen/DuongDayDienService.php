<?php

namespace App\Http\Service\DuongDayDIen;
use App\Model\DuongDayDien;

class DuongDayDienService{

    protected $DuongDayDien;
    public function __construct(DuongDayDien $DuongDayDien)
    {
        $this->DuongDayDien = $DuongDayDien;
    }
}