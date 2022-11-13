<?php

namespace App\Http\Service\NhaMayNuoc;
use App\Model\NhaMayNuoc;


class NhaMayNuocService{

    protected $NhaMayNuoc;
    public function __construct(NhaMayNuoc $NhaMayNuoc)
    {
        $this->NhaMayNuoc = $NhaMayNuoc;
    }

    public function get_All_NhaMayNuoc()
    {
        return $this->NhaMayNuoc->get_All();
    }

    public function get_NhaMayNuoc_By_Id($req)
    {
        return  $this->NhaMayNuoc->get_by_OBJECTID($req->OBJECTID);
    }

    public function edit_NhaMayNuoc($req, $data)
    {
        $this->NhaMayNuoc->sua($req->OBJECTID, $data->TenNhaMayNuoc, $data->CongSuat, $data->DAQH_NhaMayNuoc);
    }

    public function xoa_NhaMayNuoc($req)
    {
        $this->NhaMayNuoc->xoa($req->OBJECTID);
    }
}