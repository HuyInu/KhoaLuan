$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

function Ajax_get_DuongDayDien(odjectID,popup, featureLayer)
{
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{odjectID},
        url: '/ban-do-ha-tang-ky-thuat/getDuongDayDien',
        success: function (result) {
            if (result.error === false) 
            {   
                var TenDuAnQuyHoach;
                var LoaiDuongDayDien;
                var Ten = result.DuongDayDien_Data[0].Ten || "Chưa có dữ liệu";

                if(result.DuongDayDien_Data[0].loai_duong_day_dien)
                {
                    LoaiDuongDayDien=result.DuongDayDien_Data[0].loai_duong_day_dien.TenLoaiDuongDayDien || "Chưa có dữ liệu";
                }
                else
                {
                    LoaiDuongDayDien = "Chưa có dữ liệu";
                }

                if(result.DuongDayDien_Data[0].du_an_quy_hoach)
                {
                    TenDuAnQuyHoach = result.DuongDayDien_Data[0].du_an_quy_hoach.TenDuAn || "Chưa có dữ liệu";
                }
                else
                {
                    TenDuAnQuyHoach= "Chưa có dữ liệu";
                }
                const popupContent =  GiaoDien_contentPopup_DuongDayDien(LoaiDuongDayDien, Ten,TenDuAnQuyHoach)
                PublicFunction_creat_CustomPopup(popup, featureLayer, popupContent, "Đường dây điện")
            } 
            else {
                errorAlert(result.message);
            }
        }
    })
}

function Ajax_get_OngCapNuoc(odjectID,popup, featureLayer)
{
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{odjectID},
        url: '/ban-do-ha-tang-ky-thuat/getOngCapNuoc',
        success: function (result) {
            if (result.error === false) 
            {   
                var DuongKinh = result.DuongOngNuoc_Data[0].DuongKinh ? result.DuongOngNuoc_Data[0].DuongKinh +" mm" : "Chưa có dữ liệu";
                var ChieuDai = result.DuongOngNuoc_Data[0].ChieuDai ? result.DuongOngNuoc_Data[0].ChieuDai +" mm": "Chưa có dữ liệu";
                var TenLoaiOngNuoc;
                var TenDuAnQuyHoach;
                if(result.DuongOngNuoc_Data[0].loai_ong_cap_nuoc)
                {
                    TenLoaiOngNuoc = result.DuongOngNuoc_Data[0].loai_ong_cap_nuoc.TenLoai || "Chưa có dữ liệu"; 
                }
                else
                {
                    TenLoaiOngNuoc= "Chưa có dữ liệu";
                }

                if(result.DuongOngNuoc_Data[0].du_an_quy_hoach)
                {
                    TenDuAnQuyHoach = result.DuongOngNuoc_Data[0].du_an_quy_hoach.TenDuAn || "Chưa có dữ liệu";
                }
                else
                {
                    TenDuAnQuyHoach= "Chưa có dữ liệu";
                }
                const popupContent =  GiaoDien_contentPopup_DuongOngNuoc(TenLoaiOngNuoc,TenDuAnQuyHoach, DuongKinh, ChieuDai)
                PublicFunction_creat_CustomPopup(popup, featureLayer, popupContent, "Đường ống nước")
            } 
            else {
                errorAlert(result.message);
            }
        }
    })
}

function Ajax_get_TramBienAp(odjectID,popup, featureLayer)
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
                var TenLoaiTramBienAp;
                var TenLoaiDuAn;
                if(result.TramBienAp_Data[0].loai_tram_bien_ap)
                {
                    TenLoaiTramBienAp = result.TramBienAp_Data[0].loai_tram_bien_ap.TenLoaiTramBienAp || "Chưa có dữ liệu"; 
                }
                else
                {
                    TenLoaiTramBienAp= "Chưa có dữ liệu";
                }

                if(result.TramBienAp_Data[0].du_an_quy_hoach)
                {
                    TenLoaiDuAn = result.TramBienAp_Data[0].du_an_quy_hoach.TenDuAn || "Chưa có dữ liệu";
                }
                else
                {
                    TenLoaiDuAn= "Chưa có dữ liệu";
                }

                const popupContent =  GiaoDien_contentPopup_TramBienAp(TenLoaiTramBienAp,TenLoaiDuAn, Ten)
                PublicFunction_creat_CustomPopup(popup, featureLayer, popupContent, "Trạm biến áp")
            } 
            else {
                errorAlert(result.message);
            }
        }
    })
}

function Ajax_get_NhaMayNuoc(odjectID,popup, featureLayer)
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
                var CongSuat = result.NhaMayNuoc_Data[0].CongSuat || "Chưa có dữ liệu";;
                var TenLoaiDuAn;

                if(result.NhaMayNuoc_Data[0].du_an_quy_hoach)
                {
                    TenLoaiDuAn = result.NhaMayNuoc_Data[0].du_an_quy_hoach.TenDuAn || "Chưa có dữ liệu";
                }
                else
                {
                    TenLoaiDuAn= "Chưa có dữ liệu";
                }

                const popupContent =  GiaoDien_contentPopup_NhaMayNuoc(CongSuat,TenLoaiDuAn, Ten)
                PublicFunction_creat_CustomPopup(popup, featureLayer, popupContent, "Nhà máy nước")
            } 
            else {
                errorAlert(result.message);
            }
        }
    })
}