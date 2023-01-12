<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use Helper;
use App\Http\Service\user\userService;

class CheckQuyenSuDungDat
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
        if(Auth()->user()->MaLoaiNguoiDung == 1 || Auth()->user()->MaLoaiNguoiDung == 2)
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
