<?php

namespace App\Http\Controllers\DuongOngCapNuoc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Service\DuongOngCapNuoc\DuongOngCapNuocService;

class DuongOngCapNuocController extends Controller
{
    protected $DuongOngCapNuocService;
    public function __construct(DuongOngCapNuocService $DuongOngCapNuocService)
    {
        $this->DuongOngCapNuocService = $DuongOngCapNuocService;
    }
}
