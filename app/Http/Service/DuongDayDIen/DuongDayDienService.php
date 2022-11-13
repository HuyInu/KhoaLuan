<?php

namespace App\Http\Service\DuongDayDIen;
use App\Model\DuongDayDien;

class DuongDayDienService{

    protected $DuongDayDien;
    public function __construct(DuongDayDien $DuongDayDien)
    {
        $this->DuongDayDien = $DuongDayDien;
    }

    public function getDuongDayDien($req)
    {
        return $this->DuongDayDien->get_by_ODJECTID($req->OBJECTID);
    }

    public function get_All_DuongDayDien()
    {
        return $this->DuongDayDien->get_All();
    }

    public function edit_DuongDayDien($req,$data)
    {
        $this->DuongDayDien->sua($req->OBJECTID, $data->LoaiDuongDien, $data->TenDuongDayDien, $data->DAQH_DuongDayDien);
    }

    public function xoa_DuongDayDien($req)
    {
        $this->DuongDayDien->xoa($req->OBJECTID);
    }
}