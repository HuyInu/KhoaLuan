<?php

namespace App\Http\Service\QLLoaiDuAn;

use App\Model\LoaiDuAn;
use App\Http\Request\QLLLoaiDuAn\request;

class QLLoaiDuAnService{
    protected $LoaiDuAn;
    protected $request;

    public function __construct(LoaiDuAn $LoaiDuAn, request $request)
    {
        $this->LoaiDuAn = $LoaiDuAn;
        $this->request = $request;
    }

    public function getAll_LoaiDuAn()
    {
        return $this->LoaiDuAn->sort_by_TenLoaiDuAn_Asc();
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
        
        $validator =  $this->request->checkInput_Edit($req->all(), $req->MaLoaiDuAnOld);
        if($validator->passes())
        {
            return true;
        }
        else
        {
            return $validator->errors()->toArray();
        }
    }

    public function them_LoaiDuAn($req)
    {
        $this->LoaiDuAn->them($req->MaLoaiDuAn, $req->TenLoaiDuAn);
    }

    public function get_LoaiDuAn_By_Id($req)
    {
    return $this->LoaiDuAn->get_By_Id($req/*->MaLoaiDuAn*/);
    }

    public function sua_LoaiDuAn($req)
    {
        $this->LoaiDuAn->sua($req->MaLoaiDuAnOld, $req->MaLoaiDuAn, $req->TenLoaiDuAn);
    }

    public function xoa_LoaiDuAn($req)
    {
        $this->LoaiDuAn->xoa($req->MaLoaiDuAn);
    }
}