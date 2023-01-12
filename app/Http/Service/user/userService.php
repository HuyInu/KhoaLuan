<?php

namespace App\Http\Service\user;
use Illuminate\Support\Facades\Hash;

use App\Http\Request\user\request;
use App\Model\CoQuan;
use App\Model\LoaiNguoiDung;
use App\Model\NguoiDung;

class userService{

    protected $request;
    protected $CoQuan;
    protected $LoaiNguoiDung;
    protected $NguoiDung;
    public function __construct(CoQuan $CoQuan,
                                LoaiNguoiDung $LoaiNguoiDung,
                                NguoiDung $NguoiDung,
                                request $request)
    {
        $this->request = $request;
        $this->CoQuan = $CoQuan;
        $this->NguoiDung = $NguoiDung;
        $this->LoaiNguoiDung = $LoaiNguoiDung;
    }
    public function getCoQuan()
    {
        return $this->CoQuan->getCoQuan();
    }

    public function getLoaiNguoiDung()
    {
        return $this->LoaiNguoiDung->getAll();
    }

    public function getNguoiDung()
    {
        return $this->NguoiDung->getAll();
    }

    public function getNguoiDungByID($req)
    {
        return $this->NguoiDung->getByID($req->MaNguoiDung);
    }

    public function checkInputInsert($req)
    {
        $validator =  $this->request->checkInputInsert($req);
        if($validator->passes())
        {
            return true;
        }
        else
        {
            return $validator->errors()->toArray();
        }
    }

    public function turnInputTo_Null(
                                    $GioiTinh,
                                    $CoQuan,
                                    $LoaiNguoiDung
                                    )
    {
        $GioiTinh = $GioiTinh ? $GioiTinh : null;
        $CoQuan = $CoQuan ? $CoQuan : null;
        $LoaiNguoiDung = $LoaiNguoiDung ? $LoaiNguoiDung : null;

        $object = (object)[];
        $object->GioiTinh = $GioiTinh;
        $object->CoQuan = $CoQuan;
        $object->LoaiNguoiDung = $LoaiNguoiDung;

        return $object;
    }

    public function insert($req)
    {
        $Input_Null_Turned =$this->turnInputTo_Null(
                                            $req->GioiTinh,
                                            $req->CoQuan,
                                            $req->LoaiNguoiDung
                                            );
        return $this->NguoiDung->them(
                            $req->TenDangNhap,
                            $req->Ho,
                            $req->Ten,
                            $req->Email,
                            $req->DienThoai,
                            $Input_Null_Turned->CoQuan,
                            null,
                            $Input_Null_Turned->GioiTinh,
                            null,
                            Hash::make($req->password),
                            $Input_Null_Turned->LoaiNguoiDung
                            );
    }

    public function checkInputEdit($req,$id)
    {
        $validator =  $this->request->checkInputEdits($req,$id);
        if($validator->passes())
        {
            return true;
        }
        else
        {
            return $validator->errors()->toArray();
        }
    }

    public function checkPassword($req,$MaNguoiDung)
    {
        $CurrPassword = $this->NguoiDung->getUserPassword($MaNguoiDung);
        if(Hash::check($req->Edit_password,$CurrPassword))
        {
            return false;
        }
        else
        {
            return true;
        }

    }

    public function edit($req,$MaNguoiDung)
    {
        $Input_Null_Turned =$this->turnInputTo_Null(
                                    $req->Edit_GioiTinh,
                                    $req->Edit_CoQuan,
                                    $req->Edit_LoaiNguoiDung
                                    );
        $password = isset($req->Edit_password) ? hash::make($req->Edit_password) : null;
        $this->NguoiDung->updateNguoiDung(
                                        $MaNguoiDung,
                                        $req->Edit_TenDangNhap,
                                        $req->Edit_Ho,
                                        $req->Edit_Ten,
                                        $req->Edit_Email,
                                        $req->Edit_DienThoai,
                                        $Input_Null_Turned->CoQuan,
                                        null,
                                        $Input_Null_Turned->GioiTinh,
                                        null,
                                        $Input_Null_Turned->LoaiNguoiDung,
                                        $password
                                        );
        
    }

    public function delete($req)
    {
        $this->NguoiDung->xoa($req->MaNguoiDung);
    }

    public function get_NguoiDung_Quyen($MaNguoiDung)
    {
        return $this->NguoiDung->get_NguoiDung_Quyen($MaNguoiDung);
    }
}