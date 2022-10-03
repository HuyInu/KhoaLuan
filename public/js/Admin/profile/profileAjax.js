$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

function editProfile()
{
    const data = $("#profile-form").serialize();
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{data},
        url: '/profile/edit',
        success: function (result) {
            
            if (result.error === false) 
            {
                if(result.validate === true && result.success)
                {
                    successAlert('Sửa thành công');
                }
                else
                {
                    $( "#email-form-group" ).append( '<span for="Email" class="error invalid-feedback" style="display: block;">'+result.message+'</span>');
                }
            } 
            else {
                errorAlert('Đã xảy ra lỗi.')
            }
        }
    })
}

function changePasswork()
{
    const data = $("#doiMatKhauForm").serialize();
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:data,
        url: '/changePasswork',
        processData: false,
        success: function (result) {
            if (result.error === false) 
            {
                if(result.OldPassworkCheck)
                {
                    warningAlert(result.OldPassworkCheck);
                    return 1;
                }

                successAlert(result.success);
            } 
            else {
                errorAlert('Đã xảy ra lỗi.')
            }
        }
    })
}