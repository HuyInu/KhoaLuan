<?php

namespace App\Http\Service\QLLoaiQuyHoach;

use App\Http\Request\QLLoaiQuyHoach\request;
use App\Model\LoaiQuyHoach;

class QLLoaiQuyHoachService{
    protected $LoaiQuyHoach;
    protected $request;

    public function __construct(LoaiQuyHoach $LoaiQuyHoach, request $request)
    {
        $this->LoaiQuyHoach = $LoaiQuyHoach;
        $this->request = $request;
    }
    
    public function getAll_LoaiQuyHoach()
    {
        return $this->LoaiQuyHoach->getAll();
    }

    public function validate($req)
    {
        $validator =  $this->request->checkInput($req->all());
        if($validator->passes())
        {
            return true;
        }
        else
        {
            return $validator->errors()->toArray();
        }
    }

    public function validate_Edit($req)
    {
        $MaLoaiQuyHoachOld = $req->MaLoaiQuyHoachOld;
        $validator =  $this->request->checkInput_Edit($req->all(), $MaLoaiQuyHoachOld);
        if($validator->passes())
        {
            return true;
        }
        else
        {
            return $validator->errors()->toArray();
        }
    }

    public function Add_LoaiQuyHoach($req)
    {
        $this->LoaiQuyHoach->them($req->MaLoaiQuyHoach, $req->TenLoaiQuyHoach);
    }

    public function get_LoaiQuyHoach_By_ID($req)
    {
        return $this->LoaiQuyHoach->get_By_Id($req->MaLoaiQuyHoach);
    }

    public function Edit_LoaiQuyHoach_By_ID($req)
    {
        $this->LoaiQuyHoach->sua($req->MaLoaiQuyHoachOld, $req->MaLoaiQuyHoach, $req->TenLoaiQuyHoach);
    }

    public function delete_LoaiQuyHoach($req)
    {
        $this->LoaiQuyHoach->xoa($req->MaLoaiQuyHoach);
    }
}