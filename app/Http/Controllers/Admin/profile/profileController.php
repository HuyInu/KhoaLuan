<?php

namespace App\Http\Controllers\Admin\profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    public function show()
    {
        $userInfo = Auth::user();
        //dd($userInfo);
        $avatarSrc = null;
        switch ($userInfo['MaLoaiNguoiDung']) {
            case 1:
                $avatarSrc = '/image/admin.jpg';
                break;
            case 2:
                $avatarSrc = '/image/user-default.jpg';
                break;
            case 3:
                $avatarSrc = '/image/user-default.jpg';
                break;
        }
        
        
        return view('Admin.profile.profile',[
            'avatar'=>$avatarSrc,
            'userInfor'=>$userInfo
        ]);
    }
}
