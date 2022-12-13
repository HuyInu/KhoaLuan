<?php
namespace App\Http\Service\DuAnQuyHoach;

use App\Http\Request\DuAnQuyHoach\Request;
use Illuminate\Support\Facades\Validator;

use App\Model\LoaiQuyHoach;
use App\Model\TienDoDuAn;
use App\Model\LoaiDuAn;
use App\Model\DuAnQuyHoach;

class DuAnQuyHoachService{

    protected $Request;
    protected $LoaiQuyHoach;
    protected $TienDoDuAn;
    protected $LoaiDuAn;
    protected $DuAnQuyHoach;

    public function __construct(LoaiQuyHoach $LoaiQuyHoach,
                                TienDoDuAn $TienDoDuAn,
                                LoaiDuAn $LoaiDuAn,
                                DuAnQuyHoach $DuAnQuyHoach,
                                Request $Request)
    {
        $this->LoaiQuyHoach = $LoaiQuyHoach;
        $this->TienDoDuAn = $TienDoDuAn;
        $this->LoaiDuAn = $LoaiDuAn;
        $this->DuAnQuyHoach = $DuAnQuyHoach;
        $this->Request = $Request;
    }

    public function getLoaiQuyHoach()
    {
        return $this->LoaiQuyHoach->getAll();
    }


    public function getTienDoDuAn_AscByName()
    {
        return $this->TienDoDuAn->sort_By_TenDuAnQuyHoach_Asc();
    }

    public function getLoaiDuAn_AscByName()
    {
        return $this->LoaiDuAn->sort_by_TenLoaiDuAn_Asc();
    }

    public function getAllDuAnQuyHoach()
    {
        return $this->DuAnQuyHoach->getAll();
    }

    public function getID_Name_DAQH()
    {
        return $this->DuAnQuyHoach->getID_Name();
    }

    public function get_DuAnQuyHoach_By_MaDuAn($req)
    {
        return $this->DuAnQuyHoach->get_by_OBJECTID($req->MaDuAn);
    }

    public function validate_Infor_Form($MaDuAn,$req)
    {
        $validator = $this->Request->validate_TenDuAn_Form($MaDuAn,$req);

        if($validator->passes())
        {
            return true;
        }
        else
        {
            return $validator->errors()->toArray();
        }
    }
    
    public function check_Null_Data($MaLoaiQuyHoach,
                                    $MaTienDoDuAn,
                                    $MaLoaiDuAn,
                                    $NgayKyQuyetDinh,
                                    $ThoiGianXinPheDuyet,
                                    $ThoiGianQuyHoach,
                                    $ThoiGianLayYKien,
                                    $ThoiGianCongBo)
    {
        $MaLoaiQuyHoach = $MaLoaiQuyHoach  ? $MaLoaiQuyHoach : null;
        $MaTienDoDuAn = $MaTienDoDuAn  ? $MaTienDoDuAn : null;
        $MaLoaiDuAn = $MaLoaiDuAn  ? $MaLoaiDuAn : null;
        $NgayKyQuyetDinh = $NgayKyQuyetDinh  ? $NgayKyQuyetDinh : null;
        $ThoiGianXinPheDuyet = $ThoiGianXinPheDuyet  ? $ThoiGianXinPheDuyet : null;
        $ThoiGianQuyHoach = $ThoiGianQuyHoach  ? $ThoiGianQuyHoach : null;
        $ThoiGianLayYKien = $ThoiGianLayYKien  ? $ThoiGianLayYKien : null;
        $ThoiGianCongBo = $ThoiGianCongBo  ? $ThoiGianCongBo : null;
        
        $object = (object)[];
        $object->MaLoaiQuyHoach =$MaLoaiQuyHoach;
        $object->MaTienDoDuAn =$MaTienDoDuAn;
        $object->MaLoaiDuAn =$MaLoaiDuAn;
        $object->NgayKyQuyetDinh =$NgayKyQuyetDinh;
        $object->ThoiGianXinPheDuyet =$ThoiGianXinPheDuyet;
        $object->ThoiGianQuyHoach =$ThoiGianQuyHoach;
        $object->ThoiGianLayYKien =$ThoiGianLayYKien;
        $object->ThoiGianCongBo =$ThoiGianCongBo;
        
        return $object;
        
    }

    public function unserialize_Ajax_Data($req)
    {
        $data = [];
        parse_str($req,$data);
        return $data;
    }

    public function update_DuAnQuyHoach($MaDuAn,$req)
    {
        $checkedData = $this->check_Null_Data($req->MaLoaiQuyHoach,
                                            $req->MaTienDoDuAn,
                                            $req->MaLoaiDuAn,
                                            $req->NgayKyQuyetDinh,
                                            $req->ThoiGianXinPheDuyet,
                                            $req->ThoiGianQuyHoach,
                                            $req->ThoiGianLayYKien,
                                            $req->ThoiGianCongBo);
                                            
        $this->DuAnQuyHoach->edit(
                                $MaDuAn,
                                $req->TenDuAn,
                                $req->TinhTrangPheDuyet,
                                $checkedData->NgayKyQuyetDinh,
                                $req->SoQuyetDinhPheDuyet,
                                $req->QuyMoDanSo,
                                $req->TyLeBanVe,
                                str_replace(',', '.',$req->DienTich),
                                $checkedData->ThoiGianXinPheDuyet,
                                $checkedData->ThoiGianQuyHoach,
                                $checkedData->ThoiGianLayYKien,
                                $checkedData->ThoiGianCongBo,
                                $req->DonViQuanLy,
                                $req->DonViCapNhat,
                                $checkedData->MaLoaiDuAn,
                                $checkedData->MaTienDoDuAn,
                                $checkedData->MaLoaiQuyHoach
                            );
    }

    public function delete_DuAnQuyHoach($MaDuAn)
    {
        $this->DuAnQuyHoach->xoa($MaDuAn);
    }

    public function check_Add_Form_input($req)
    {
        $validator =  $this->Request->validate_Add_Form($req);
        if($validator->passes())
        {
            return true;
        }
        else
        {
            return $validator->errors()->toArray();
        }
    }

    public function insert_DuAnQuyHoach($req)
    {
        $checkedData = $this->check_Null_Data($req->Add_MaLoaiQuyHoach,
                                            $req->Add_MaTienDoDuAn,
                                            $req->Add_MaLoaiDuAn,
                                            $req->Add_NgayKyQuyetDinh,
                                            $req->Add_ThoiGianXinPheDuyet,
                                            $req->Add_ThoiGianQuyHoach,
                                            $req->Add_ThoiGianLayYKien,
                                            $req->Add_ThoiGianCongBo);
                                          

        $this->DuAnQuyHoach->create($req->Add_MaDuAn,
                                    $req->Add_TenDuAn,
                                    $req->Add_TinhTrangPheDuyet,
                                    $checkedData->NgayKyQuyetDinh,
                                    $req->Add_SoQuyetDinhPheDuyet,
                                    $req->Add_QuyMoDanSo,
                                    $req->Add_TyLeBanVe,
                                    str_replace(',', '.',$req->Add_DienTich),
                                    $checkedData->ThoiGianXinPheDuyet,
                                    $checkedData->ThoiGianQuyHoach,
                                    $checkedData->ThoiGianLayYKien,
                                    $checkedData->ThoiGianCongBo,
                                    $req->Add_DonViQuanLy,
                                    $req->Add_DonViCapNhat,
                                    $checkedData->MaLoaiDuAn,
                                    $checkedData->MaTienDoDuAn,
                                    $checkedData->MaLoaiQuyHoach);
    }
}