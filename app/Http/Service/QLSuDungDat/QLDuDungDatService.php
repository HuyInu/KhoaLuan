<?php

namespace App\Http\Service\QLSuDungDat;

use App\Model\SuDungDat;
use App\Model\DuAnQuyHoach;
use App\Model\DMLoaiDatQHXD;

class QLDuDungDatService{
    protected $SuDungDat;
    protected $DuAnQuyHoach;
    protected $DMLoaiDatQHXD;

    public function __construct(SuDungDat $SuDungDat,DuAnQuyHoach $DuAnQuyHoach, DMLoaiDatQHXD $DMLoaiDatQHXD)
    {
        $this->SuDungDat = $SuDungDat;
        $this->DuAnQuyHoach = $DuAnQuyHoach;
        $this->DMLoaiDatQHXD = $DMLoaiDatQHXD;
    }

    public function get_All_SuDungDat()
    {
        return $this->SuDungDat->get_All();
    }

    public function get_All_DuAnQuyHoach()
    {
        return $this->DuAnQuyHoach->getID_Name();
    }

    public function get_All_DMLoaiDatQHXD()
    {
        return $this->DMLoaiDatQHXD->getAll();
    }

    public function get_SuDungDat_By_ID($req)
    {
        return $this->SuDungDat->get_By_ID($req->OBJECTID);
    }

    public function sua_SuDungDat($req,$data)
    {
        $this->SuDungDat->sua($req->OBJECTID, $data->MaDuAnQuyHoach, $data->MaLoaiDatQHXD,
                            $this->turn_comma_into_doc($data->DienTich),
                            $this->turn_comma_into_doc($data->HeSoSuDungDat),
                            $data->TangCaoXayDung,$data->MatDoXayDung,$data->TenLoaiDatTheoDA);
    }

    public function xoa_SuDungDat($req)
    {
        return $this->SuDungDat->xoa($req->OBJECTID);
    }

    public function turn_comma_into_doc($value)
    {
        return  str_replace(',', '.', $value);
    }

    
}