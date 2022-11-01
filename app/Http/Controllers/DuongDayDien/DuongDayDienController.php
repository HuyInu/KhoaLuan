<?php

namespace App\Http\Controllers\DuongDayDien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Service\DuongDayDIen\DuongDayDienService;

class DuongDayDienController extends Controller
{
    protected $DuongDayDienService;
    public function __construct(DuongDayDienService $DuongDayDienService)
    {
        $this->DuongDayDienService = $DuongDayDienService;
    }
}
