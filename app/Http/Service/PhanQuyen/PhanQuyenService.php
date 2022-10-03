<?php

namespace App\Http\Service\PhanQuyen;

use App\Model\NguoiDung;
use App\Model\NhomQuyen;

class PhanQuyenService{
    protected $NguoiDung;
    protected $NhomQuyen;

    public function __construct(NguoiDung $NguoiDung,NhomQuyen $NhomQuyen)
    {
        $this->NguoiDung= $NguoiDung;
        $this->NhomQuyen= $NhomQuyen;
    }

    public function getAll_NguoiDung()
    {
        return $this->NguoiDung->getAll();
    }

    public function getAll_NhomQuyen()
    {
        return $this->NhomQuyen->getAll();
    }
}