$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

function AjaxDuongOngNuoc_TramBienAp_Edit()
{   const OBJECTID = $('#OBJECTID_DuongCapNuoc').html();
    const data = $("#Edit_DuongCapNuoc_Form").serialize();
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{OBJECTID, data},
        url: '/QLHaTangKyThuat/DuongCapNuoc/edit',
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