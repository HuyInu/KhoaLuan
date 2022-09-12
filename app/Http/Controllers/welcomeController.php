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
        if(Auth::check()){
            $userType = Auth::user()->MaLoaiNguoiDung;
            $hoTen = Auth::user()->Ho.' '.Auth::user()->Ten;
            $avatarSrc = null;
            switch ($userType) {
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
            $html='<li class="nav-item dropdown hidden-caret">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                            <div class="avatar-sm">
                                <img src="'.$avatarSrc.'" alt="..." class="avatar-img rounded-circle">
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-user animated fadeIn">
                            <div class="scroll-wrapper dropdown-user-scroll scrollbar-outer" style="position: relative;"><div class="dropdown-user-scroll scrollbar-outer scroll-content" style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 0px;">
                                <li>
                                    <div class="user-box">
                                        <div class="avatar-lg"><img src="'.$avatarSrc.'" alt="image profile" class="avatar-img rounded"></div>
                                        <div class="u-text">
                                            <h4>'.$hoTen.'</h4>
                                            <p class="text-muted">hello@example.com</p><a href="'.route('profile').'" class="btn btn-xs btn-secondary btn-sm">Thông tin cá nhân</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="'.route('logout').'">Đăng xuất</a>
                                </li>
                            </div><div class="scroll-element scroll-x"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar ui-draggable ui-draggable-handle"></div></div></div><div class="scroll-element scroll-y"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar ui-draggable ui-draggable-handle"></div></div></div></div>
                        </ul>
                    </li>';
            return view('welcome',[
                'nav'=>$html
            ]);
        }         
        else
        {
            $html='<li class="nav-item">
                        <a data-toggle="modal" class="nav-link" href="#addRowModal">Đăng nhập</a>
                    </li>';
            return view('welcome',[
                'nav'=>$html
            ]);
        }
    }
}
