<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

use App\Http\Service\user\userService;
use Helper;

class CheckQuyenPhanQuyen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $userService;

    public function __construct(userService $userService)
    {
        $this->userService = $userService;
    }

    public function handle($request, Closure $next)
    {
        if(Auth()->user()->MaLoaiNguoiDung == 1)
        {
            return $next($request);
        }
        else
        {
            $NguoiDung_Quyen = $this->userService->get_NguoiDung_Quyen(Auth()->user()->id)->toArray();
            $Quyen = $NguoiDung_Quyen[0]['quyen'];
            $check_Quyen = Helper::check_Quyen($Quyen, 1);
            
            if($check_Quyen)
            {
                return $next($request);
            }
        }

        abort(403);
    }
}
