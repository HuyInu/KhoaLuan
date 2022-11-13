$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})


function Ajax_getDuongCapNuoc_By_Id(OBJECTID)
{
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{OBJECTID},
        url: '/QLHaTangKyThuat/DuongCapNuoc/get',
        success: function (result) {
            if (result.error === false) 
            {
                if(result.DuongCapNuoc_Data.length > 0)
                {
                    const DuongCapNuoc = result.DuongCapNuoc_Data[0];
                    var LoaiOngNuoc = null;
                    var DAQH = null;
                    if(DuongCapNuoc.loai_duong_ong_cap_nuoc != null)
                    {
                        LoaiOngNuoc = DuongCapNuoc.loai_duong_ong_cap_nuoc.MaLoai;
                    }
                    if(DuongCapNuoc.du_an_quy_hoach != null)
                    {
                        DAQH = DuongCapNuoc.du_an_quy_hoach.MaDuAn;
                    }
                    GiaoDien_LoadDataToForm(DuongCapNuoc.DuongKinh, DuongCapNuoc.ChieuDai, LoaiOngNuoc, DAQH, OBJECTID);
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
    const OBJECTID = $('#OBJECTID_DuongCapNuoc').html();
    const data = $("#Edit_DuongCapNuoc_Form").serialize();
    const rowID =$('#rowID').html();
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{OBJECTID, data},
        url: '/QLHaTangKyThuat/DuongCapNuoc/edit',
        success: function (result) {
            if (result.error === false) 
            {
                successAlert(result.success);
                edit_row(OBJECTID,$('#LoaiOngCapNuoc').find(":selected").text(), $('#DuongKinh').val(),  $('#ChieuDai').val(), $('#DAQH_DuongCapNuoc').find(":selected").text(), '#table', rowID);
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
        url: '/QLHaTangKyThuat/DuongCapNuoc/xoa',
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