function loadDataToModel(element)
{
    $('#MaDuAn').val($(element).closest("tr").find(".MaDuAn").text());
    $('#TenDuAn').val($(element).closest("tr").find(".TenDuAn").text());
    $('#MaLoaiQuyHoach').val($(element).closest("tr").find(".TenLoaiQuyHoach").attr('id-data'));
    $('#TinhTrangPheDuyet').val($(element).closest("tr").find(".TinhTrangPheDuyet").attr('id-data'));
    $('#SoQuyetDinhPheDuyet').val($(element).closest("tr").find(".SoQuyetDinhPheDuyet").text());
    $('#NgayKyQuyetDinh').val($(element).closest("tr").find(".NgayKyQuyetDinh").text());
    $('#QuyMoDanSo').val($(element).closest("tr").find(".QuyMoDanSo").text());
    $('#TyLeBanVe').val($(element).closest("tr").find(".TyLeBanVe").text());
    $('#DienTich').val($(element).closest("tr").find(".DienTich").text());
    $('#ThoiGianXinPheDuyet').val($(element).closest("tr").find(".ThoiGianXinPheDuyet").text());
    $('#ThoiGianQuyHoach').val($(element).closest("tr").find(".ThoiGianQuyHoach").text());
    $('#ThoiGianLayYKien').val($(element).closest("tr").find(".ThoiGianLayYKien").text());
    $('#ThoiGianCongBo').val($(element).closest("tr").find(".ThoiGianCongBo").text());
    $('#DonViQuanLy').val($(element).closest("tr").find(".DonViQuanLy").text());
    $('#DonViCapNhat').val($(element).closest("tr").find(".DonViCapNhat").text());
    $('#MaLoaiDuAn').val($(element).closest("tr").find(".MaLoaiDuAn").attr('id-data'));
    $('#MaTienDoDuAn').val($(element).closest("tr").find(".MaTienDoDuAn").attr('id-data'));
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