<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use App\Model\DMXa;

class ThuaDat extends Model
{
    protected $table="THUADAT";
    protected $primaryKey = 'OBJECTID';

    public function DMXa()
    {
        return $this->belongsTo(DMXa::class,'MaXa','MaXa');
    }
    //===================================================

    public function getThuaDat_By_OdjectID($odjectID)
    {
        return $this::with(['DMXa.DMHuyen'])->where('OBJECTID','=',$odjectID)->get([DB::raw('SHAPE.ToString() as SHAPE'),'OBJECTID', 'MaXa','SoHieuToBanDo','SoThuTuThua','DienTich','DienTichPhapLy','TenChu','DiaChi']);
    }
    
    public function getThuaDat_By_MaXa_SoTo_SoThua($MaXa, $SoTo, $SoThua)
    {
        return $this::with(['DMXa.DMHuyen'])->where([['MaXa','=',$MaXa],['SoHieuToBanDo','=',$SoTo],['SoThuTuThua','=',$SoThua]])->get([DB::raw('SHAPE.ToString() as SHAPE'),'OBJECTID','MaXa','SoHieuToBanDo','SoThuTuThua','DienTich','DienTichPhapLy','TenChu','DiaChi']);
    }

    public function select_intersect_ThuaDat($whereTongDienTich)
    {
        $sql = "SELECT THUADAT.SHAPE.STIntersection(SDDAT.SHAPE).ToString() as SUDUNGDATSHAPE,SDDAT.TenLoaiDatTheoDA as TenLoaiDatTheoDA, SDDAT.HeSoSuDungDat as HeSoSuDungDat, SDDAT.TangCaoXayDung as TangCaoXayDung, SDDAT.MatDoXayDung as MatDoXayDung, 
                    SDDAT.MaDuAnQuyHoach , DAQH.SoQuyetDinhPheDuyet, format(DAQH.NgayKyQuyetDinh,'dd/MM/yyyy') as NgayKyQuyetDinh, DAQH.TenDuAn, DAQH.TyLeBanVe, LQH.TenLoaiQuyHoach,
                    CONVERT(numeric(10,2),(((THUADAT.SHAPE.STIntersection(SDDAT.SHAPE).STArea()*100)/THUADAT.SHAPE.STArea())*THUADAT.DienTich)/100) as DienTich, CONVERT(numeric(10,2),TongDT.TongDienTich) as TongDienTich
                from sde.THUADAT THUADAT , sde.SuDungDat SDDAT, sde.DuAnQuyHoach DAQH, sde.LoaiQuyHoach LQH, 
                    (select SDDAT.MaDuAnQuyHoach,sum((((THUADAT.SHAPE.STIntersection(SDDAT.SHAPE).STArea()*100)/THUADAT.SHAPE.STArea())*THUADAT.DienTich)/100) as TongDienTich from sde.THUADAT THUADAT , sde.SuDungDat SDDAT where THUADAT.SHAPE.STIntersects(SDDAT.SHAPE)=1 $whereTongDienTich group by SDDAT.MaDuAnQuyHoach) TongDT
                where SDDAT.MaDuAnQuyHoach = DAQH.MaDuAn and DAQH.MaLoaiQuyHoach = LQH.MaLoaiQuyHoach and TongDT.MaDuAnQuyHoach= SDDAT.MaDuAnQuyHoach and THUADAT.SHAPE.STIntersects(SDDAT.SHAPE)=1";
        return $sql;
    }

    public function select_where_MaDuAn($MaDuAn)
    {

        if($MaDuAn != '0' && $MaDuAn != null)
            return " and SDDAT.MaDuAnQuyHoach = '$MaDuAn'";
        else
            return null;
    }

    public function getSuDungDat($odjectID, $MaDuAn = 0)
    {
        $where = " and THUADAT.OBJECTID=$odjectID";
        $sql = $this->select_intersect_ThuaDat($where).$where;
        $sql.= $this->select_where_MaDuAn($MaDuAn);
        $sql .=" ORDER BY SDDAT.MaDuAnQuyHoach DESC, DienTich DESC";

        return DB::select(DB::raw($sql));
    }

    public function getSuDungDat_by_SoTo_SoThua($MaXa, $SoTo, $SoThua,$MaDuAn)
    {
        $where = "and THUADAT.MaXa='$MaXa' and THUADAT.SoThuTuThua='$SoThua' and THUADAT.SoHieuToBanDo='$SoTo'";
        $sql = $this->select_intersect_ThuaDat($where).$where;
        $sql.= $this->select_where_MaDuAn($MaDuAn);
        

        return DB::select(DB::raw($sql));
    }
}
