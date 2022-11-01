<?php

namespace App\Http\Controllers\GiaoThong;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Service\GiaoThong\GiaoThongService;

class GiaoThongController extends Controller
{
    protected $GiaoThongService;
    public function __construct(GiaoThongService $GiaoThongService)
    {
        $this->GiaoThongService = $GiaoThongService;
    }
}
