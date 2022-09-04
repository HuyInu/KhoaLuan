<?php

namespace App\Http\Controllers\Admin\DuAnQuyHoach;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DuAnQuyHoachController extends Controller
{
    public function show()
    {
        return view("Admin.DuAnQuyHoach.DuAnQuyHoach");
    }
}
