<?php

namespace App\Http\Service\BanDo_HaTang_KyThuat;

use App\Model\DuAnQuyHoach;
use App\Model\DMHuyen;
use App\Model\DuongDayDien;
use App\Model\DuongOngCapNuoc;
use App\Model\TramBienAp;
use App\Model\NhaMayNuoc;

class BanDo_HaTang_KyThuatService{

    protected $DuAnQuyHoach;
    protected $DMHuyen;
    protected $DuongDayDien;
    protected $DuongOngCapNuoc;
    protected $TramBienAp;
    protected $NhaMayNuoc;

    public function __construct(DuAnQuyHoach $DuAnQuyHoach,DMHuyen $DMHuyen,DuongDayDien $DuongDayDien,DuongOngCapNuoc $DuongOngCapNuoc,TramBienAp $TramBienAp,NhaMayNuoc $NhaMayNuoc)
    {
        $this->DuAnQuyHoach = $DuAnQuyHoach;
        $this->DMHuyen = $DMHuyen;
        $this->DuongDayDien = $DuongDayDien;
        $this->DuongOngCapNuoc = $DuongOngCapNuoc;
        $this->TramBienAp = $TramBienAp;
        $this->NhaMayNuoc = $NhaMayNuoc;
    }
    public function getAll_Huyen()
    {
        return $this->DMHuyen->getAllDMHuyen();
    }
    public function getID_Name_DAQH()
    {
        return $this->DuAnQuyHoach->getID_Name();
    }

    public function getDuongDayDien($ODJECTID)
    {
        return $this->DuongDayDien->get_by_ODJECTID($ODJECTID);
    }

    public function getOngCapNuoc($ODJECTID)
    {
        return $this->DuongOngCapNuoc->getOngCapNuoc_by_ODJECTID($ODJECTID);
    }

    public function getTramBienAp($ODJECTID)
    {
        return $this->TramBienAp->get_by_ODJECTID($ODJECTID);
    }

    public function getNhaMayNuoc($ODJECTID)
    {
        return $this->NhaMayNuoc->get_by_OBJECTID($ODJECTID);
    }
}