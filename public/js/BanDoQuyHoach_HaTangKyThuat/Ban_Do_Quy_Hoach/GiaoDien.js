function GiaoDien_load_ThuaDat_to_leftInfo(Huyen, Xa,DienTich, SoThua, SoTo)
{
    $('.TenQuanHuyen').html(Huyen);

    $('.TenPhuongXa').html(Xa);
    $('.DienTich').html(DienTich.replace(".", ","));
    $('.SoHieuToBanDo').html((SoTo != null && SoTo != 0) ? SoTo : 'Chưa có dữ liệu');
    $('.SoThuTuThua').html((SoThua != null && SoThua != 0) ? SoThua : 'Chưa có dữ liệu');
  
}

function GiaoDien_load_SuDungDat_to_leftInfo(SuDungDat)
{
    $('.di-item').html('');
    var TangCaoXayDung =null;
    var HeSoSuDungDat = null;
    var MatDoXayDung =null;
    if(SuDungDat.length > 0)
    {
        var DuAnTemp = null;
        var content = null;
        const color = PublicFunction_get_colorArray();
        var stt=0;
        $.each(SuDungDat, function( index, value ) {
            if(value.MaDuAnQuyHoach != DuAnTemp)
            {   
                stt=0;
                content = `<div class="ttqh-information">
                                <div class="body-ttqh">
                                    <div class="content-text">
                                        <h5>
                                            <span class="TenLoaiQuyHoach font-bold">${value.TenLoaiQuyHoach || "..."}</span> với tổng diện tích
                                            <span class="font-bold DienTich">${value.TongDienTich.replace(".", ",") || "..."}</span> <b>m<sup>2</sup></b> cụ thể:
                                        </h5>
                                        <div class="content-text-info">
                                            <div class="icon"><i class="fas fa-info-circle fa-xl text-info"></i></div>
                                            <div class="text">
                                                Quyết định số <span class="font-bold QuyetDinh">${value.SoQuyetDinhPheDuyet || "..."}</span> ngày
                                                <span class="font-bold NgayPheDuyet"> ${value.NgayKyQuyetDinh || "..."}</span> về phê duyệt quy
                                                hoạch đồ án <span class="font-bold TenDuAn">${value.TenDuAn || "..."}</span> <span class="font-bold TyLe"> tỷ lệ ${value.TyLeBanVe || "..."}</span> với diện tích <span class="font-bold DienTich">${value.TongDienTich.replace(".", ",") || "..."}</span> <b>m<sup>2</sup></b> cụ thể:
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                $('.di-item').append(content);
            }
            stt++;
            TangCaoXayDung = (value.TangCaoXayDung != null && value.TangCaoXayDung != 0) ? value.TangCaoXayDung: 'Chưa có dữ liệu';
            HeSoSuDungDat = (value.HeSoSuDungDat != null && value.HeSoSuDungDat != 0) ? value.HeSoSuDungDat: 'Chưa có dữ liệu';
            MatDoXayDung = (value.MatDoXayDung != null && value.MatDoXayDung != 0) ? value.MatDoXayDung : 'Chưa có dữ liệu';
            content = `<div class="box-item">
                        <div class="head-box" style="background-color:`+color[index]+`">
                            <h5 class="font-bold">`+stt +`. `+ value.TenLoaiDatTheoDA+`</h5>
                        </div>
                        <div class="body-box">
                            <div class="w-col-6-6">
                                <div class="item-field">
                                    <i class="fas fa-dot-circle"></i> Diện tích: <span class="DienTich">`+value.DienTich.replace(".", ",")+`</span> m<sup>2</sup>
                                </div>
                                <div class="item-field">
                                    <i class="fas fa-dot-circle"></i> Tầng cao xây dựng (tầng):<br> <span class="TangCaoXayDung">`+TangCaoXayDung +`</span>
                                </div>
                            </div>
                            <div class="w-col-6-6">
                                <div class="item-field">
                                    <i class="fas fa-dot-circle"></i> Hệ số sử dụng đất:<br> <span class="HeSoSuDungDat">`+HeSoSuDungDat+`</span>
                                </div>
                                <div class="item-field">
                                    <i class="fas fa-dot-circle"></i> Mật độ xây dựng TB (%):<br> <span class="MatDoXayDung">`+MatDoXayDung+`</span>
                                </div>
                            </div>
                        </div>
                    </div>`;

            $('.di-item').append(content);
            DuAnTemp = value.MaDuAnQuyHoach;
            if(index == (SuDungDat.length-1) ||  DuAnTemp != SuDungDat[index+1].MaDuAnQuyHoach)
            {
                $('.di-item').append(`<hr style="border-top: 3px solid #bbb;">`);
            }
        });
    }
    else
    {
        if($('#selectDuAnQH').val()== '0')
        {
            $('.di-item').append(`<h4 class="card-title">Thửa đất không nằm trên dự án nào.</h4>`);
        }
        else
        {
            $('.di-item').append(`<h4 class="card-title">Thửa đất không nằm trên dự án <b>${$('#selectDuAnQH').find(":selected").text()}</b>.</h4>`);
        }
    }
}

function load_ObjectID_ThuaDat_To_LefInfo($OBJECTID)
{
    $('#ObjectID_ThuaDat').html($OBJECTID);
}

function GiaoDien_Show_LeftInfo()
{
    //$( "#leftInfo" ).addClass( "show_left_Info");
    $( "#leftInfo" ).removeClass( "hide_left_Info");
}

function GiaoDien_Hide_LeftInfo()
{
    $( "#leftInfo" ).removeClass( "show_left_Info");
    $( "#leftInfo" ).addClass("hide_left_Info");
}

