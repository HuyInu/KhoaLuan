$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

function AjaxNhaMayNuoc_NhaMayNuoc_Edit()
{   const OBJECTID = $('#OBJECTID_NhaMayNuoc').html();
    const data = $("#Edit_NhaMayNuoc_Form").serialize();
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{OBJECTID, data},
        url: '/QLHaTangKyThuat/NhaMayNuoc/edit',
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