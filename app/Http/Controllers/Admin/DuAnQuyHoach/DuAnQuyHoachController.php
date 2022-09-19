<?php

namespace App\Http\Controllers\Admin\DuAnQuyHoach;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Service\DuAnQuyHoach\DuAnQuyHoachService;

class DuAnQuyHoachController extends Controller
{
    protected $DuAnQuyHoachService;

    public function __construct(DuAnQuyHoachService $DuAnQuyHoachService)
    {
        $this->DuAnQuyHoachService = $DuAnQuyHoachService;
    }

    public function show()
    {
        $dataLoaiQuyHoach = $this->DuAnQuyHoachService->getLoaiQuyHoach();
        $dataTienDoDuAn = $this->DuAnQuyHoachService->getTienDoDuAn_AscByName();
        $dataLoaiDuAn = $this->DuAnQuyHoachService->getLoaiDuAn_AscByName();
        $dataDuAnQuyHoach = $this->DuAnQuyHoachService->getAllDuAnQuyHoach();
        //dd($dataDuAnQuyHoach);

        return view("Admin.DuAnQuyHoach.DuAnQuyHoach",[
            'dataLoaiQuyHoach'=> $dataLoaiQuyHoach,
            'dataTienDoDuAn'=>$dataTienDoDuAn,
            'dataLoaiDuAn' => $dataLoaiDuAn,
            'dataDuAnQuyHoach' => $dataDuAnQuyHoach
        ]);
    }
}
