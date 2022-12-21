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
            console.log(result)
            if (result.error === false) 
            {
                if(result.validate === true && result.success)
                {
                    successAlert('Sửa thành công');
                    GiaoDien_update_Ten($('#Ho').val()+" "+$('#Ten').val());
                }
                else
                {
                    if(result.validatorError)
                    {
                        if(result.validatorError.Email)
                        {
                            show_error_validate_message_function_Main("#email-form-group",result.validatorError.Email[0],'Email')
                        }
                        else
                        {
                            remove_error_validate_message_function_Main("#email-form-group")
                        }

                        if(result.validatorError.DienThoai)
                        {
                            show_error_validate_message_function_Main('#DienThoai-form-group',result.validatorError.DienThoai[0],'DienThoai')
                        }
                        else
                        {
                            remove_error_validate_message_function_Main('#DienThoai-form-group')
                        }
                    }
                    
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