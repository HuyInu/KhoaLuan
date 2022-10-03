<?php

namespace App\Http\Service\BanDoQuyHoach;

use App\Model\DuAnQuyHoach;

class BanDoQuyHoachService{
    protected $DuAnQuyHoach;

    public function __construct(DuAnQuyHoach $DuAnQuyHoach)
    {
        $this->DuAnQuyHoach = $DuAnQuyHoach;
    }

    public function getID_Name_DAQH()
    {
        return $this->DuAnQuyHoach->getID_Name();
    }
}