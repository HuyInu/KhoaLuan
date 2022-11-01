<?php

namespace App\Http\Controllers\TramBienAp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Service\TramBienAp\TramBienApService;

class TramBienApController extends Controller
{
    protected $TramBienApService;
    public function __construct(TramBienApService $TramBienApService)
    {
        $this->TramBienApService = $TramBienApService;
    }
}
