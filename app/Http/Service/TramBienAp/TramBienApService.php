<?php

namespace App\Http\Service\TramBienAp;
use App\Model\TramBienAp;

class TramBienApService{

    protected $TramBienAp;
    public function __construct(TramBienAp $TramBienAp)
    {
        $this->TramBienAp = $TramBienAp;
    }


    public function get_All_TramBienAp()
    {
        return $this->TramBienAp->get_All();
    }

    public function getTramBienAp_ById($req)
    {
        return $this->TramBienAp->get_by_ODJECTID($req->OBJECTID);
    }

    public function edit_TramBienAp($req, $data)
    {
        $this->TramBienAp-> sua($req->OBJECTID, $data->TenTramBienAp, $data->LoaiTramBienAp, $data->DAQH_TramBienAp);
    }

    public function xoa_TramBienAp($req)
    {
        $this->TramBienAp->xoa($req->OBJECTID);
    }
}