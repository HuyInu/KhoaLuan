<?php

namespace App\Http\Controllers\NhaMayNuoc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Service\NhaMayNuoc\NhaMayNuocService;

class NhaMayNuocController extends Controller
{
    protected $NhaMayNuocService;
    public function __construct(NhaMayNuocService $NhaMayNuocService)
    {
        $this->NhaMayNuocService = $NhaMayNuocService;
    }
}
