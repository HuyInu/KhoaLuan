<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login(Request $req)
    {
        $remember = false;
        if($req->remember)
        {
            $remember =true;
        }
        if(Auth::attempt([
            'TenDangNhap'=>$req->taiKhoan,
            'password'=>$req->matKhau
        ],$remember))
        {
            return response()->json([
                'error'=>false,
                'result' =>true
            ]);
        }
        else
        {   
            return response()->json([
                'error'=>false,
                'result' =>false
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return  redirect()->route('home');
    }
}
