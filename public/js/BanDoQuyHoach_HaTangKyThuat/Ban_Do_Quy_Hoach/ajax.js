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

function Ajax_getThuaDat(odjectID,Graphic, view)
{
    const MaDuAn=  $('#select-DAQH').val()
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{odjectID, MaDuAn},
        url: '/ban-do-tra-cuu-thong-tin-quy-hoach/getThuaDat',
        success: function (result) {
            if (result.error === false) 
            {
                const Huyen = result.ThuaDat[0].d_m_xa.d_m_huyen.TenHuyen;
                const Xa = result.ThuaDat[0].d_m_xa.TenXa;
                const DienTich = result.ThuaDat[0].DienTich;
                const SoThua = result.ThuaDat[0].SoThuTuThua;
                const SoTo = result.ThuaDat[0].SoHieuToBanDo;
                    
                GiaoDien_load_ThuaDat_to_leftInfo(Huyen, Xa,DienTich, SoThua, SoTo);
                GiaoDien_load_SuDungDat_to_leftInfo(result.SuDungDat);
                load_ObjectID_ThuaDat_To_LefInfo(odjectID)
                //hightLight feature
                PublicFunction_HighLight_Feature(result.ThuaDat[0].SHAPE, result.SuDungDat, Graphic, view)

                
                GiaoDien_Show_LeftInfo();
            } 
            else {
                errorAlert(result.message);
            }
        }
    })
}

function Ajax_timKiemThuaDat(MaXa, SoTo, SoThua, featureLayer,Graphic,view)
{
    const MaDuAn=  $('#select-DAQH').val()
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{MaXa, SoTo, SoThua, MaDuAn},
        url: '/ban-do-tra-cuu-thong-tin-quy-hoach/timKiemThuaDat',
        success: function (result) {

            if (result.error === false) 
            {
                if(result.ThuaDat.length >0)
                {
                    

                    const Huyen = result.ThuaDat[0].d_m_xa.d_m_huyen.TenHuyen;
                    const Xa = result.ThuaDat[0].d_m_xa.TenXa;
                    const DienTich = result.ThuaDat[0].DienTich;
                    const SoThua = result.ThuaDat[0].SoThuTuThua;
                    const SoTo = result.ThuaDat[0].SoHieuToBanDo;
                    GiaoDien_load_ThuaDat_to_leftInfo(Huyen, Xa,DienTich, SoThua, SoTo);
                    GiaoDien_load_SuDungDat_to_leftInfo(result.SuDungDat);
                    load_ObjectID_ThuaDat_To_LefInfo(result.ThuaDat[0].OBJECTID);

                    //hightLight feature
                    PublicFunction_HighLight_Feature(result.ThuaDat[0].SHAPE, result.SuDungDat, Graphic, view)
                    
                    GiaoDien_Show_LeftInfo();
                    
                    PublicFunction_queryFeature_gotoFeature( "OBJECTID = '"+result.ThuaDat[0].OBJECTID+"'", featureLayer, view);

                    
                }
                else
                {
                    successAlert('Không tìm thấy kết quả.');
                }
                
            } 
            else {
                errorAlert(result.message);
            }
        }
    })
}

function Ajax_Xuat_PDF()
{
    PublicFunction_UI_Block('#viewDiv', 'fas fa-file-pdf', 'Đang tạo file PDF...');
    const MaDuAn=  $('#select-DAQH').val();
    const OBJECTID=  $('#ObjectID_ThuaDat').html();
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{OBJECTID, MaDuAn},
        url: '/PDF/PDF_ThongTinQuyHoach',
        xhrFields: {
            responseType: 'blob'
        },
        success: function (result) {    
            var d = new Date();
            var date = String(d.getHours())+String(d.getMinutes())+String(d.getSeconds())+ String(d.getUTCDate())+ String(d.getUTCMonth() + 1) + String(d.getUTCFullYear());
            var pdf_name = 'thongtinquyhoach-'+$('.SoThuTuThua').html()+'-'+$('.SoHieuToBanDo').html()+'-'+date+'.pdf';
            
            var blob = new Blob([result]);
            var link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.download = pdf_name;
            link.click();
            PublicFunction_UI_UnBlock('#viewDiv');
        },
        error: function(blob){
            errorAlert('Đã xảy ra lỗi');
            PublicFunction_UI_UnBlock('#viewDiv');
        }
    })
}