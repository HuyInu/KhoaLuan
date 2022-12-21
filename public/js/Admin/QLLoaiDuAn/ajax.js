$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

function Ajax_insert()
{
    const TenLoaiDuAn = $('#TenLoaiDuAn').val();
    const MaLoaiDuAn = $('#MaLoaiDuAn').val();
    
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{MaLoaiDuAn,TenLoaiDuAn},
        url: '/QLDanhMuc/LoaiDuAn/them_LoaiDuAn',
        success: function (result) {
            if (result.error === false) 
            {
                if(result.validateError)
                {
                    if(result.validateError.TenLoaiDuAn)
                    {
                        show_error_validate_message_function_Main("#Ten-form-group",result.validateError.TenLoaiDuAn,'TenLoaiDuAn');
                    }
                    else
                    {
                        remove_error_validate_message_function_Main("#Ten-form-group")
                    }

                    if(result.validateError.MaLoaiDuAn)
                    {
                        show_error_validate_message_function_Main("#Ma-form-group",result.validateError.MaLoaiDuAn,'MaLoaiDuAn');
                    }
                    else
                    {
                        remove_error_validate_message_function_Main("#Ma-form-group")
                    }
                    return 0;
                }

                if(result.success)
                {
                    add_row(MaLoaiDuAn, TenLoaiDuAn, '#table');
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

function Ajax_getLoaiDuAn_By_Id(MaLoaiDuAn)
{
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{MaLoaiDuAn},
        url: '/QLDanhMuc/LoaiDuAn/get_LoaiDuAn',
        success: function (result) {
            if (result.error === false) 
            {
                if(result.LoaiDuAn)
                {
                    GiaoDien_LoadDataToForm(result.LoaiDuAn[0].MaLoaiDuAn, result.LoaiDuAn[0].TenLoaiDuAn);
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
    const MaLoaiDuAnOld = $('#MaLoaiDuAn_Old').html();
    const TenLoaiDuAn = $('#TenLoaiDuAn_Edit').val();
    const MaLoaiDuAn = $('#MaLoaiDuAn_Edit').val();
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{TenLoaiDuAn, MaLoaiDuAnOld, MaLoaiDuAn},
        url: '/QLDanhMuc/LoaiDuAn/sua_LoaiDuAn',
        success: function (result) {
            
            if (result.error === false) 
            {
                if(result.validateError)
                {
                    if(result.validateError.TenLoaiDuAn)
                    {
                        show_error_validate_message_function_Main("#TenEdit-form-group",result.validateError.TenLoaiDuAn,'TenLoaiDuAn_Edit');
                    }
                    else
                    {
                        remove_error_validate_message_function_Main("#TenEdit-form-group")
                    }

                    if(result.validateError.MaLoaiDuAn)
                    {
                        show_error_validate_message_function_Main("#MaEdit-form-group",result.validateError.MaLoaiDuAn,'MaLoaiDuAn_Edit');
                    }
                    else
                    {
                        remove_error_validate_message_function_Main("#MaEdit-form-group")
                    }
                    return 0;
                }

                if(result.success)
                {
                    edit_row(MaLoaiDuAn,TenLoaiDuAn, '#table', $('#rowID').html())
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

function Ajax_xoa(MaLoaiDuAn, rowID)
{

    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{MaLoaiDuAn},
        url: '/QLDanhMuc/LoaiDuAn/xoa_LoaiDuAn',
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