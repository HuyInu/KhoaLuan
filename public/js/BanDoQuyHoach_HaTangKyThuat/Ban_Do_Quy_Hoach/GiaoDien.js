function GiaoDien_load_ThuaDat_to_leftInfo(Huyen, Xa,DienTich, SoThua, SoTo)
{
    $('.TenQuanHuyen').html(Huyen);

    $('.TenPhuongXa').html(Xa);
    $('.SoHieuToBanDo').html(DienTich);
    $('.DienTich').html(DienTich);
    $('.SoHieuToBanDo').html(SoTo);
    $('.SoThuTuThua').html(SoThua);

    
}

function GiaoDien_load_SuDungDat_to_leftInfo(SuDungDat)
{
    $('.di-item').html('');
    if(SuDungDat.length > 0)
    {
        var DuAnTemp = null;
        var content = null;
        const color = PublicFunction_get_colorArray();
        $.each(SuDungDat, function( index, value ) {
            if(value.MaDuAnQuyHoach != DuAnTemp)
            {   
                content = `<div class="ttqh-information">
                                <div class="body-ttqh">
                                    <div class="content-text">
                                        <h5>
                                            <span class="TenLoaiQuyHoach font-bold">${value.TenLoaiQuyHoach || "..."}</span> với tổng diện tích
                                            <span class="font-bold DienTich">${value.TongDienTich || "..."}</span> <b>m<sup>2</sup></b> cụ thể:
                                        </h5>
                                        <div class="content-text-info">
                                            <div class="icon"><i class="fas fa-info-circle fa-xl text-info"></i></div>
                                            <div class="text">
                                                Quyết định số <span class="font-bold QuyetDinh">${value.SoQuyetDinhPheDuyet || "..."}</span> ngày
                                                <span class="font-bold NgayPheDuyet"> ${value.NgayKyQuyetDinh || "..."}</span> về phê duyệt quy
                                                hoạch đồ án <span class="font-bold TenDuAn">${value.TenDuAn || "..."}</span> <span class="font-bold TyLe"> tỷ lệ ${value.TyLeBanVe || "..."}</span> với diện tích <span class="font-bold DienTich">${value.TongDienTich || "..."}</span> <b>m<sup>2</sup></b> cụ thể:
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                $('.di-item').append(content);
            }
            content = `<div class="box-item">
                        <div class="head-box" style="background-color:`+color[index]+`">
                            <h5 class="font-bold">`+(index+1) +`. `+ value.TenLoaiDatTheoDA+`</h5>
                        </div>
                        <div class="body-box">
                            <div class="w-col-6-6">
                                <div class="item-field">
                                    <i class="fas fa-dot-circle"></i> Diện tích: <span class="DienTich">`+value.DienTich+`</span> m<sup>2</sup>
                                </div>
                                <div class="item-field">
                                    <i class="fas fa-dot-circle"></i> Tầng cao xây dựng (tầng): <span class="TangCaoXayDung">`+value.TangCaoXayDung+`</span>
                                </div>
                            </div>
                            <div class="w-col-6-6">
                                <div class="item-field">
                                    <i class="fas fa-dot-circle"></i> Hệ số sử dụng đất: <span class="HeSoSuDungDat">`+value.HeSoSuDungDat+`</span>
                                </div>
                                <div class="item-field">
                                    <i class="fas fa-dot-circle"></i> Mật độ xây dựng TB (%): <span class="MatDoXayDung">`+value.MatDoXayDung+`</span>
                                </div>
                            </div>
                        </div>
                    </div>`;

            $('.di-item').append(content);
            DuAnTemp = value.MaDuAnQuyHoach;
            });
        }
}

function GiaoDien_Show_LeftInfo()
{
    //$( "#leftInfo" ).addClass( "show_left_Info");
    $( "#leftInfo" ).removeClass( "hide_left_Info");
}

