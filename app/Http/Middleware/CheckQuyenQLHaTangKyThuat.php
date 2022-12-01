<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use Helper;
use App\Http\Service\user\userService;

class CheckQuyenQLHaTangKyThuat
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
            $NhomQuyen = $this->userService->get_NhomQUyen_NguoiDung(Auth()->user()->id)->toArray();
            $check_Quyen = Helper::check_Quyen($NhomQuyen, 1);
            
            if($check_Quyen)
            {
                return $next($request);
            }
        }

        abort(403);
    }
}
