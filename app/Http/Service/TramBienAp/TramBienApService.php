<?php

namespace App\Http\Service\TramBienAp;
use App\Model\TramBienAp;

class TramBienApService{

    protected $TramBienAp;
    public function __construct(TramBienAp $TramBienAp)
    {
        $this->TramBienAp = $TramBienAp;
    }
}