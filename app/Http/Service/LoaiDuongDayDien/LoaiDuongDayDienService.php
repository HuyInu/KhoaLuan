<?php
namespace App\Http\Service\LoaiDuongDayDien;

use App\Model\LoaiDuongDayDien;

class LoaiDuongDayDienService{
    protected $LoaiDuongDayDien;

    public function __construct(LoaiDuongDayDien $LoaiDuongDayDien)
    {
        $this->LoaiDuongDayDien = $LoaiDuongDayDien;
    }

    public function get_all_LoaiDuongDayDien()
    {
        return $this->LoaiDuongDayDien->get_All();
    }
}