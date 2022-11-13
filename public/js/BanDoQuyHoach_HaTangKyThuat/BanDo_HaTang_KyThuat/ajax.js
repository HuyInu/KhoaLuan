$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

function Ajax_getXa_By_Huyen(MaHuyen)
{
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{MaHuyen},
        url: '/ban-do-tra-cuu-thong-tin-quy-hoach/getDMXa',
        success: function (result) {
            if (result.error === false) 
            {
                
                GiaoDienMain_Load_Data_To_Select(result.duLieuDMXa, 'MaXa', 'TenXa', '#Xa');
            } 
            else {
                errorAlert(result.message);
            }
        }
    })
}

function Ajax_get_DuongDayDien(odjectID, action, view, location)
{
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{odjectID},
        url: '/ban-do-ha-tang-ky-thuat/getDuongDayDien',
        success: function (result) {
            if (result.error === false) 
            {   
                var TenDuAnQuyHoach = "Chưa có dữ liệu";
                var LoaiDuongDayDien = "Chưa có dữ liệu";
                var MaLoaiDuongDayDien = null;
                var MaDuAnQuyHoach = null;
                var Ten = result.DuongDayDien_Data[0].Ten || "Chưa có dữ liệu";

                if(result.DuongDayDien_Data[0].loai_duong_day_dien)
                {
                    LoaiDuongDayDien=result.DuongDayDien_Data[0].loai_duong_day_dien.TenLoaiDuongDayDien || "Chưa có dữ liệu";
                    MaLoaiDuongDayDien = result.DuongDayDien_Data[0].loai_duong_day_dien.MaLoaiDuongDayDien;
                }

                if(result.DuongDayDien_Data[0].du_an_quy_hoach)
                {
                    TenDuAnQuyHoach = result.DuongDayDien_Data[0].du_an_quy_hoach.TenDuAn || "Chưa có dữ liệu";
                    MaDuAnQuyHoach = result.DuongDayDien_Data[0].du_an_quy_hoach.MaDuAn;
                }

                const popupContent =  GiaoDien_contentPopup_DuongDayDien(LoaiDuongDayDien, Ten,TenDuAnQuyHoach);
                PublicFunction_creat_CustomPopup(popupContent, "Đường dây điện",action,view,location);
                GiaoDien_Load_DuongDayDien_To_Modal(Ten, MaLoaiDuongDayDien, MaDuAnQuyHoach, odjectID);
            } 
            else {
                errorAlert(result.message);
            }
        }
    })
}

function Ajax_get_OngCapNuoc(odjectID, action, view, location)
{
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{odjectID},
        url: '/ban-do-ha-tang-ky-thuat/getOngCapNuoc',
        success: function (result) {
            if (result.error === false) 
            {   
                console.log(result)
                var DuongKinh = result.DuongOngNuoc_Data[0].DuongKinh ? result.DuongOngNuoc_Data[0].DuongKinh +" mm" : "Chưa có dữ liệu";
                var ChieuDai = result.DuongOngNuoc_Data[0].ChieuDai ? result.DuongOngNuoc_Data[0].ChieuDai +" mm": "Chưa có dữ liệu";

                var MaLoaiOngCapNuoc = null;
                var TenLoaiOngNuoc = "Chưa có dữ liệu";
                var MaDAQH = null;
                var TenDuAnQuyHoach = "Chưa có dữ liệu";
                if(result.DuongOngNuoc_Data[0].loai_duong_ong_cap_nuoc)
                {
                    TenLoaiOngNuoc = result.DuongOngNuoc_Data[0].loai_duong_ong_cap_nuoc.TenLoai || "Chưa có dữ liệu"; 
                    MaLoaiOngCapNuoc = result.DuongOngNuoc_Data[0].loai_duong_ong_cap_nuoc.MaLoai;
                }

                if(result.DuongOngNuoc_Data[0].du_an_quy_hoach)
                {
                    TenDuAnQuyHoach = result.DuongOngNuoc_Data[0].du_an_quy_hoach.TenDuAn || "Chưa có dữ liệu";
                    MaDAQH = result.DuongOngNuoc_Data[0].du_an_quy_hoach.MaDuAn;
                }

                const popupContent =  GiaoDien_contentPopup_DuongOngNuoc(TenLoaiOngNuoc,TenDuAnQuyHoach, DuongKinh, ChieuDai);
                GiaoDien_Load_DuongCapNuoc_To_Modal(result.DuongOngNuoc_Data[0].DuongKinh, result.DuongOngNuoc_Data[0].ChieuDai, MaLoaiOngCapNuoc, MaDAQH, odjectID);
                PublicFunction_creat_CustomPopup( popupContent, "Đường ống nước", action, view, location)
            } 
            else {
                errorAlert(result.message);
            }
        }
    })
}

function Ajax_get_TramBienAp(odjectID, action, view, location)
{
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{odjectID},
        url: '/ban-do-ha-tang-ky-thuat/getTramBienAp',
        success: function (result) {
            if (result.error === false) 
            {   
                var Ten = result.TramBienAp_Data[0].Ten || "Chưa có dữ liệu";

                var TenLoaiTramBienAp = "Chưa có dữ liệu";
                var MaLoaiTramBienAp = null;
                
                var TenLoaiDuAn = "Chưa có dữ liệu";
                var MaDuAnQuyHoach = null;

                if(result.TramBienAp_Data[0].loai_tram_bien_ap)
                {
                    TenLoaiTramBienAp = result.TramBienAp_Data[0].loai_tram_bien_ap.TenLoaiTramBienAp || "Chưa có dữ liệu"; 
                    MaLoaiTramBienAp = result.TramBienAp_Data[0].loai_tram_bien_ap.MaLoaiTramBienAp;
                }

                if(result.TramBienAp_Data[0].du_an_quy_hoach)
                {
                    TenLoaiDuAn = result.TramBienAp_Data[0].du_an_quy_hoach.TenDuAn || "Chưa có dữ liệu";
                    MaDuAnQuyHoach = result.TramBienAp_Data[0].du_an_quy_hoach.MaDuAn;
                }

                const popupContent =  GiaoDien_contentPopup_TramBienAp(TenLoaiTramBienAp,TenLoaiDuAn, Ten);
                PublicFunction_creat_CustomPopup( popupContent, "Trạm biến áp", action, view, location);
                GiaoDien_Load_TramBienAp_To_Modal(Ten, MaLoaiTramBienAp, MaDuAnQuyHoach, odjectID);
            } 
            else {
                errorAlert(result.message);
            }
        }
    })
}

function Ajax_get_NhaMayNuoc(odjectID, action, view, location)
{
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{odjectID},
        url: '/ban-do-ha-tang-ky-thuat/getNhaMayNuoc',
        success: function (result) {
            if (result.error === false) 
            {   
                var Ten = result.NhaMayNuoc_Data[0].Ten || "Chưa có dữ liệu";
                var CongSuat = result.NhaMayNuoc_Data[0].CongSuat || "Chưa có dữ liệu";

                var TenLoaiDuAn = "Chưa có dữ liệu";
                var MaDAQH = null;

                if(result.NhaMayNuoc_Data[0].du_an_quy_hoach)
                {
                    TenLoaiDuAn = result.NhaMayNuoc_Data[0].du_an_quy_hoach.TenDuAn || "Chưa có dữ liệu";
                    MaDAQH = result.NhaMayNuoc_Data[0].du_an_quy_hoach.MaDuAn; 
                }

                const popupContent =  GiaoDien_contentPopup_NhaMayNuoc(CongSuat,TenLoaiDuAn, Ten);
                GiaoDien_Load_NhaMayNuoc_To_Modal(Ten, CongSuat, MaDAQH, odjectID);
                PublicFunction_creat_CustomPopup( popupContent, "Nhà máy nước", action, view, location);
            } 
            else {
                errorAlert(result.message);
            }
        }
    })
}