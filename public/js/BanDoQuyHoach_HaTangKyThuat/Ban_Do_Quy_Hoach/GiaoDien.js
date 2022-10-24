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
        const color = PublicFunction_get_colorArray();
        $.each(SuDungDat, function( index, value ) {
            const content = `<div class="box-item">
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
            });
        }
}

function GiaoDien_Show_LeftInfo()
{
    //$( "#leftInfo" ).addClass( "show_left_Info");
    $( "#leftInfo" ).removeClass( "hide_left_Info");
}

