<?php

namespace App\Http\Service\BanDoQuyHoach;

use App\Model\DuAnQuyHoach;
use App\Model\ThuaDat;
use App\Model\DMHuyen;
use App\Model\DMXa;

class BanDoQuyHoachService{
    protected $DuAnQuyHoach;
    protected $ThuaDat;
    protected $DMHuyen;
    protected $DMXa;

    public function __construct(DuAnQuyHoach $DuAnQuyHoach,
                                ThuaDat $ThuaDat,
                                DMHuyen $DMHuyen,
                                DMXa $DMXa)
    {
        $this->DuAnQuyHoach = $DuAnQuyHoach;
        $this->ThuaDat = $ThuaDat;
        $this->DMHuyen = $DMHuyen;
        $this->DMXa = $DMXa;
    }

    public function getAll_Huyen()
    {
        return $this->DMHuyen->getAllDMHuyen();
    }

    public function getID_Name_DAQH()
    {
        return $this->DuAnQuyHoach->getID_Name();
    }

    public function getThuaDat($odjectID)
    {
        return $this->ThuaDat->getThuaDat_By_OdjectID($odjectID);
    }

    public function getSuDungDat($odjectID, $MaDuAn)
    {
        return $this->ThuaDat->getSuDungDat($odjectID, $MaDuAn);
    }

    public function timKiemSuDungDat($Maxa, $SoTo, $SoThua, $MaDuAn)
    {
        return $this->ThuaDat->getSuDungDat_by_SoTo_SoThua($Maxa, $SoTo, $SoThua,$MaDuAn);
    }

    public function getThuaDat_By_MaXa_SoTo_SoThua($MaXa, $SoTo, $SoThua)
    {
        return $this->ThuaDat->getThuaDat_By_MaXa_SoTo_SoThua($MaXa, $SoTo, $SoThua);
    }

    public function layDuLieuXaTuHuyen($MaHuyen)
    {
        return $data = $this->DMXa->getXaByMaHuyen($MaHuyen);   
    }
}