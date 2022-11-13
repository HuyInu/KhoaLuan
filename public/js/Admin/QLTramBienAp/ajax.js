$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})


function Ajax_getTramBienAp_By_Id(OBJECTID)
{
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{OBJECTID},
        url: '/QLHaTangKyThuat/TramBienAp/get',
        success: function (result) {
            if (result.error === false) 
            {
                if(result.TramBienAp_Data.length > 0)
                {
                    var LoaiTram = null;
                    var DAQH = null;
                    var TramBienAp = result.TramBienAp_Data[0];

                    if(TramBienAp.loai_tram_bien_ap != null)
                    {
                        LoaiTram = TramBienAp.loai_tram_bien_ap.MaLoaiTramBienAp;
                    }

                    if(TramBienAp.du_an_quy_hoach != null)
                    {
                        DAQH = TramBienAp.du_an_quy_hoach.MaDuAn;
                    }
                    GiaoDien_LoadDataToForm(TramBienAp.Ten, LoaiTram, DAQH, OBJECTID);
                    return 0;
                }
            } 
            else {
                errorAlert(result.message)
            }
        }
    })
}

function Ajax_edit()
{
    const OBJECTID = $('#OBJECTID_TramBienAp').html();
    const data = $("#Edit_TramBienAp_Form").serialize();
    const rowID =$('#rowID').html();
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{OBJECTID, data},
        url: '/QLHaTangKyThuat/TramBienAp/edit',
        success: function (result) {
            if (result.error === false) 
            {
                successAlert(result.success);
                edit_row(OBJECTID,$('#LoaiTramBienAp').find(":selected").text(), $('#TenTramBienAp').val(), $('#DAQH_TramBienAp').find(":selected").text(), '#table', rowID);
            } 
            else {
                errorAlert(result.message);
            }
        }
    })
}

function Ajax_xoa(OBJECTID, rowID)
{

    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{OBJECTID},
        url: '/QLHaTangKyThuat/DuongDayDien/xoa_SuDungDat',
        success: function (result) {
            
            if (result.error === false) 
            {
                if(result.success)
                {
                    DataTable_Main_removeRow('#table', rowID);
                    successAlert(result.success);
                    return 0;
                }
            } 
            else {
                errorAlert(result.message)
            }
        }
    })
}