<?php
namespace App\Http\Service\DuAnQuyHoach;

use App\Model\LoaiQuyHoach;
use App\Model\TienDoDuAn;
use App\Model\LoaiDuAn;
use App\Model\DuAnQuyHoach;

class DuAnQuyHoachService{

    protected $LoaiQuyHoach;
    protected $TienDoDuAn;
    protected $LoaiDuAn;
    protected $DuAnQuyHoach;

    public function __construct(LoaiQuyHoach $LoaiQuyHoach,
                                TienDoDuAn $TienDoDuAn,
                                LoaiDuAn $LoaiDuAn,
                                DuAnQuyHoach $DuAnQuyHoach)
    {
        $this->LoaiQuyHoach = $LoaiQuyHoach;
        $this->TienDoDuAn = $TienDoDuAn;
        $this->LoaiDuAn = $LoaiDuAn;
        $this->DuAnQuyHoach = $DuAnQuyHoach;
    }

    public function getLoaiQuyHoach()
    {
        return $this->LoaiQuyHoach->getAll();
    }

    public function getTienDoDuAn_AscByName()
    {
        return $this->TienDoDuAn->sort_By_TenDuAnQuyHoach_Asc();
    }

    public function getLoaiDuAn_AscByName()
    {
        return $this->LoaiDuAn->sort_by_TenLoaiDuAn_Asc();
    }

    public function getAllDuAnQuyHoach()
    {
        return $this->DuAnQuyHoach->getAll();
    }
}