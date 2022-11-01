<?php

namespace App\Http\Service\NhaMayNuoc;
use App\Model\NhaMayNuoc;


class NhaMayNuocService{

    protected $NhaMayNuoc;
    public function __construct(NhaMayNuoc $NhaMayNuoc)
    {
        $this->NhaMayNuoc = $NhaMayNuoc;
    }
}