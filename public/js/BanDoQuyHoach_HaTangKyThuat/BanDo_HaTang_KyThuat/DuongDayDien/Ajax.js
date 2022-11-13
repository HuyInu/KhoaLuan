$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

function AjaxDuongDayDien_DuongDauDien_Edit()
{   const OBJECTID = $('#OBJECTID_DuongDayDien').html();
    const data = $("#Edit_DuongDayDien_Form").serialize();
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{OBJECTID, data},
        url: '/QLHaTangKyThuat/DuongDayDien/sua_DuongDayDien',
        success: function (result) {
            if (result.error === false) 
            {
                successAlert(result.success);
            } 
            else {
                errorAlert(result.message);
            }
        }
    })
}