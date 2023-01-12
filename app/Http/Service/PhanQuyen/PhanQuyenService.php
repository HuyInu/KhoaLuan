<?php

namespace App\Http\Service\PhanQuyen;

use App\Model\NguoiDung;
use App\Model\NhomQuyen;
use App\Model\Quyen;
use App\Http\Request\PhanQuyen\request;

class PhanQuyenService{
    protected $NguoiDung;
    protected $NhomQuyen;
    protected $Quyen;
    protected $request;

    public function __construct(NguoiDung $NguoiDung,NhomQuyen $NhomQuyen,Quyen $Quyen,request $request)
    {
        $this->NguoiDung= $NguoiDung;
        $this->NhomQuyen= $NhomQuyen;
        $this->Quyen= $Quyen;
        $this->request= $request;
    }

    public function getAll_NguoiDung()
    {
        return $this->NguoiDung->getAll();
    }

    public function getAll_NhomQuyen()
    {
        return $this->NhomQuyen->getAll();
    }

    public function getAll_Quyen()
    {
        return $this->Quyen->getAll();
    }

    public function get_Quyen_By_NhomQuyen($req)
    {
        return $this->NhomQuyen->get_Quyen_by_NhomQuyen($req->MaNhomQuyen);
    }

    public function get_Quyen_By_NguoiDung($req)//---------------------------------------------------------
    {
        return $this->NguoiDung->get_Quyen_by_NguoiDung($req->MaNguoiDung);
    }

    public function get_ID_NguoiDung_by_NhomQuyen($req)
    {
        return $this->NhomQuyen->get_ID_NguoiDung_by_NhomQuyen($req->MaNhomQuyen);
    }

    public function validate($req)
    {
        $validator = $this->request->validate($req);

        if($validator->passes())
        {
            return true;
        }
        else
        {
            return $validator->errors()->toArray();
        }
    }

    public function them_NhomQuyen($req)
    {
        return $this->NhomQuyen->them($req->TenNhomQuyen);
    }

    public function sua_NhomQuyen($req)
    {
        $this->NhomQuyen->sua($req->MaNhomQuyen,$req->TenNhomQuyen);
    }

    public function xoa_NhomQuyen($req)
    {
        $this->NhomQuyen->xoa($req->MaNhomQuyen);
    }

    public function them_NhomQuyen_Quyen($req)
    {
        $this->NhomQuyen->them_NhomQuyen_Quyen($req->MaNhomQuyen,$req->NodeIDArray);
    }

    public function them_Quyen_Cho_NguoiDung($req)
    {
        $this->NguoiDung->them_Quyen_Cho_NguoiDung($req->MaNguoiDung,$req->NodeIDArray);
        
    }

    public function them_NhomQuyen_NguoiDung($req)
    {
        $this->NhomQuyen->them_NhomQuyen_NguoiDung($req->MaNhomQuyen,$req->NodeIDArray);
    }

    
}