$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})


function Ajax_getNhaMayNuoc_By_Id(OBJECTID)
{
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{OBJECTID},
        url: '/QLHaTangKyThuat/NhaMayNuoc/get',
        success: function (result) {
            console.log(result)
            if (result.error === false) 
            {
                
                if(result.NhaMayNuoc_Data != null)
                {
                    const NhaMayNuoc = result.NhaMayNuoc_Data[0];
                    var DAQH = null;

                    if(NhaMayNuoc.du_an_quy_hoach != null)
                    {
                        DAQH = NhaMayNuoc.du_an_quy_hoach.MaDuAn;
                    }
                    GiaoDien_LoadDataToForm(NhaMayNuoc.Ten, NhaMayNuoc.CongSuat, DAQH, OBJECTID);
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
    const OBJECTID = $('#OBJECTID_NhaMayNuoc').html();
    const data = $("#Edit_NhaMayNuoc_Form").serialize();
    const rowID =$('#rowID').html();
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{OBJECTID, data},
        url: '/QLHaTangKyThuat/NhaMayNuoc/edit',
        success: function (result) {
            if (result.error === false) 
            {
                successAlert(result.success);
                edit_row(OBJECTID,$('#TenNhaMayNuoc').val(), $('#CongSuat').val(), $('#DAQH_NhaMayNuoc').find(":selected").text(), '#table', rowID);
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