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
        return $this::with(['DMXa.DMHuyen'])->where('OBJECTID','=',$odjectID)->get([DB::raw('SHAPE.ToString() as SHAPE'),'MaXa','SoHieuToBanDo','SoThuTuThua','DienTich','DienTichPhapLy','TenChu','DiaChi']);
    }
    
    public function getThuaDat_By_MaXa_SoTo_SoThua($MaXa, $SoTo, $SoThua)
    {
        return $this::with(['DMXa.DMHuyen'])->where([['MaXa','=',$MaXa],['SoHieuToBanDo','=',$SoTo],['SoThuTuThua','=',$SoThua]])->get([DB::raw('SHAPE.ToString() as SHAPE'),'OBJECTID','MaXa','SoHieuToBanDo','SoThuTuThua','DienTich','DienTichPhapLy','TenChu','DiaChi']);
    }

    public function select_intersect_ThuaDat()
    {
        $sql = "SELECT THUADAT.SHAPE.STIntersection(SDDAT.SHAPE).ToString() as SUDUNGDATSHAPE,ISNULL(SDDAT.TenLoaiDatTheoDA,0) as TenLoaiDatTheoDA, ISNULL(SDDAT.HeSoSuDungDat,0) as HeSoSuDungDat, ISNULL(SDDAT.TangCaoXayDung,0) as TangCaoXayDung, ISNULL(SDDAT.MatDoXayDung, 0) as MatDoXayDung, CONVERT(numeric(6,2),(((THUADAT.SHAPE.STIntersection(SDDAT.SHAPE).STArea()*100)/THUADAT.SHAPE.STArea())*THUADAT.DienTich)/100) as DienTich 
                from sde.THUADAT THUADAT , sde.SuDungDat SDDAT";
        return $sql;
    }

    public function getSuDungDat($odjectID)
    {
        $sql = $this->select_intersect_ThuaDat()." where THUADAT.SHAPE.STIntersects(SDDAT.SHAPE)=1 and THUADAT.OBJECTID=$odjectID";

         return DB::select(DB::raw($sql));
    }

    public function getSuDungDat_by_SoTo_SoThua($MaXa, $SoTo, $SoThua)
    {
        $sql = $this->select_intersect_ThuaDat()." where THUADAT.SHAPE.STIntersects(SDDAT.SHAPE)=1 and THUADAT.MaXa='$MaXa' and THUADAT.SoThuTuThua='$SoThua' and THUADAT.SoHieuToBanDo='$SoTo'";
        
        return DB::select(DB::raw($sql));
    }
}
