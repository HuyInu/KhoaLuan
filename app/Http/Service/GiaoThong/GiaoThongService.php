<?php

namespace App\Http\Service\GiaoThong;
use App\Model\GiaoThong;

class GiaoThongService{

    protected $NhaMayNuoc;
    public function __construct(GiaoThong $GiaoThong)
    {
        $this->GiaoThong = $GiaoThong;
    }

    public function getAll()
    {
        return $this->GiaoThong->getAll();
    }
}