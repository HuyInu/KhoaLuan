<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\NguoiDung;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class welcomeController extends Controller
{
    public function show()
    { 
       
        return view('welcome',[
        ]);
        
    }
}
