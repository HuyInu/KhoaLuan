function loadDataToModel(MaDuAn, 
    TenDuAn, 
    MaLoaiQuyHoach, 
    TinhTrangPheDuyet,
    SoQuyetDinhPheDuyet,
    NgayKyQuyetDinh, 
    QuyMoDanSo, 
    TyLeBanVe, 
    DienTich, 
    ThoiGianXinPheDuyet, 
    ThoiGianQuyHoach, 
    ThoiGianLayYKien, 
    ThoiGianCongBo, 
    DonViQuanLy, 
    DonViCapNhat, 
    MaLoaiDuAn, 
    MaTienDoDuAn)
{
    $('#MaDuAn').val(MaDuAn);
    $('#TenDuAn').val(TenDuAn);
    $('#MaLoaiQuyHoach').val(MaLoaiQuyHoach);
    $('#TinhTrangPheDuyet').val(TinhTrangPheDuyet);
    $('#SoQuyetDinhPheDuyet').val(SoQuyetDinhPheDuyet);
    $('#NgayKyQuyetDinh').val(NgayKyQuyetDinh);
    $('#QuyMoDanSo').val(QuyMoDanSo);
    $('#TyLeBanVe').val(TyLeBanVe);
    $('#DienTich').val(DienTich.replace(".", ","));
    $('#ThoiGianXinPheDuyet').val(ThoiGianXinPheDuyet);
    $('#ThoiGianQuyHoach').val(ThoiGianQuyHoach);
    $('#ThoiGianLayYKien').val(ThoiGianLayYKien);
    $('#ThoiGianCongBo').val(ThoiGianCongBo);
    $('#DonViQuanLy').val(DonViQuanLy);
    $('#DonViCapNhat').val(DonViCapNhat);
    $('#MaLoaiDuAn').val(MaLoaiDuAn);
    $('#MaTienDoDuAn').val(MaTienDoDuAn);
}


function XuLyGiaoDien_empty_Add_Form()
{
    $('#Add_MaDuAn').val(null);
    $('#Add_TenDuAn').val(null);
    $('#Add_MaLoaiQuyHoach').val(null);
    $('#Add_TinhTrangPheDuyet').val(null);
    $('#Add_SoQuyetDinhPheDuyet').val(null);
    $('#Add_NgayKyQuyetDinh').val(null);
    $('#Add_QuyMoDanSo').val(null);
    $('#Add_TyLeBanVe').val(null);
    $('#Add_DienTich').val(null);
    $('#Add_ThoiGianXinPheDuyet').val(null);
    $('#Add_ThoiGianQuyHoach').val(null);
    $('#Add_ThoiGianLayYKien').val(null);
    $('#Add_ThoiGianCongBo').val(null);
    $('#Add_DonViQuanLy').val(null);
    $('#Add_DonViCapNhat').val(null);
    $('#Add_MaLoaiDuAn').val(null);
    $('#Add_MaTienDoDuAn').val(null);
}