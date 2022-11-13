$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})


function Ajax_getDuongDauDien_By_Id(OBJECTID)
{
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{OBJECTID},
        url: '/QLHaTangKyThuat/DuongDayDien/get_DuongDayDien',
        success: function (result) {
            if (result.error === false) 
            {
                if(result.DuongDayDien_Data)
                {
                    const DuongDayDien = result.DuongDayDien_Data[0];
                    GiaoDien_LoadDataToForm(DuongDayDien.Ten, DuongDayDien.loai_duong_day_dien.MaLoaiDuongDayDien, DuongDayDien.du_an_quy_hoach.MaDuAn, OBJECTID);
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
    const OBJECTID = $('#OBJECTID_DuongDayDien').html();
    const data = $("#Edit_DuongDayDien_Form").serialize();
    const rowID =$('#rowID').html();
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{OBJECTID, data},
        url: '/QLHaTangKyThuat/DuongDayDien/sua_DuongDayDien',
        success: function (result) {
            if (result.error === false) 
            {
                successAlert(result.success);
                edit_row(OBJECTID,$('#LoaiDuongDien').find(":selected").text(), $('#TenDuongDayDien').val(), $('#DAQH_DuongDayDien').find(":selected").text(), '#table', rowID);
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