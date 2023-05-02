<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Service\QLLoaiDuAn\QLLoaiDuAnService;

class ApiUserController extends Controller
{
    protected $QLLoaiDuAnService;
    public function __construct(QLLoaiDuAnService $QLLoaiDuAnService)
    {
        $this->QLLoaiDuAnService = $QLLoaiDuAnService;
    }

    public function getAllUser()
    {
        $NguoiDung_Data = $this->QLLoaiDuAnService->getAll_LoaiDuAn();
        return json_encode($NguoiDung_Data);
    }

    public function Add(Request $req)
    {
        $validate = $this->QLLoaiDuAnService->validate($req);
        
        if(is_array($validate))
        {
            return $validate;
        }
        $this->QLLoaiDuAnService->them_LoaiDuAn($req);
        //return json_encode($req);
    }

    public function get($id)
    {
        $NguoiDung_Data = $this->QLLoaiDuAnService->get_LoaiDuAn_By_Id($id);
        return json_encode($NguoiDung_Data);
    }
}
