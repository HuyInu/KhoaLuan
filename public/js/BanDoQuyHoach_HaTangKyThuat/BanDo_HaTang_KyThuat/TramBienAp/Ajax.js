$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

function AjaxTramBienAp_TramBienAp_Edit()
{   const OBJECTID = $('#OBJECTID_TramBienAp').html();
    const data = $("#Edit_TramBienAp_Form").serialize();
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{OBJECTID, data},
        url: '/QLHaTangKyThuat/TramBienAp/edit',
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