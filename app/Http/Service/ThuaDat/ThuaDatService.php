<?php

namespace App\Http\Service\ThuaDat;
use App\Model\ThuaDat;

class ThuaDatService{
    protected $ThuaDat;

    public function __construct(ThuaDat $ThuaDat)
    {
        $this->ThuaDat = $ThuaDat;
    }

    public function getThuaDat_By_ID($odjectID)
    {
        return $this->ThuaDat->getThuaDat_By_OdjectID($odjectID);
    }

    public function getSuDungDat_By_ThuaDat_ID($odjectID, $MaDuAn)
    {
        return $this->ThuaDat->getSuDungDat($odjectID, $MaDuAn);
    }
}