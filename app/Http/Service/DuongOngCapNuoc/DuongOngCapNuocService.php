<?php
namespace App\Http\Service\DuongOngCapNuoc;
use App\Model\DuongOngCapNuoc;

class DuongOngCapNuocService{

    protected $DuongOngCapNuoc;
    public function __construct(DuongOngCapNuoc $DuongOngCapNuoc)
    {
        $this->DuongOngCapNuoc = $DuongOngCapNuoc;
    }

    public function get_All_DuongCapNuoc()
    {
        return $this->DuongOngCapNuoc->getAll();
    }

    public function get_DuongCapNuoc_By_Id($req)
    {
        return $this->DuongOngCapNuoc->getOngCapNuoc_by_ODJECTID($req->OBJECTID);
    }

    public function edit_DuongOngNuoc($req, $data)
    {
        $DuongKinh = $this->checkNull($data->DuongKinh);
        //$ChieuDai = $this->checkNull($data->ChieuDai);

        $this->DuongOngCapNuoc->sua($req->OBJECTID, str_replace(',', '.', $DuongKinh),/* str_replace(',', '.', $ChieuDai),*/ $data->LoaiOngCapNuoc, $data->DAQH_DuongCapNuoc);
    }

    public function checkNull($data)
    {
        if($data == null)
        {
            return 0;
        }

        return $data;
    }

    public function xoa_DuongCapNuoc($req)
    {
        $this->DuongOngCapNuoc->xoa($req->OBJECTID);
    }
}