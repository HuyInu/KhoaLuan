$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

function insert()
{
    const data = $("#Add_Form").serialize();
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{data},
        url: '/user/insert',
        success: function (result) {
            
            if (result.error === false) 
            {
                if(result.validateError)
                {
                    if(result.validateError.Email)
                    {
                        show_error_validate_message_function_Main("#Email-form-group" ,result.validateError.Email,'Email');
                    }
                    else
                    {
                        remove_error_validate_message_function_Main("#Email-form-group")
                    }

                    if(result.validateError.DienThoai)
                    {
                        show_error_validate_message_function_Main("#DienThoai-form-group" ,result.validateError.DienThoai,'DienThoai');
                    }else
                    {
                        remove_error_validate_message_function_Main("#DienThoai-form-group")
                    }

                    if(result.validateError.TenDangNhap)
                    {
                        show_error_validate_message_function_Main("#TenDangNhap-form-group" ,result.validateError.TenDangNhap,'TenDangNhap');
                    }
                    else
                    {
                        remove_error_validate_message_function_Main("#TenDangNhap-form-group")
                    }

                    return 0;
                }

                if(result.success)
                {
                    successAlert(result.success);
                    Datatable_addRow(result.MaNguoiDungNew);
                    return 0;
                }
            } 
            else {
                errorAlert(result.message)
            }
        }
    })
}

function getNguoiDung(id)
{
    const MaNguoiDung = id;
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{MaNguoiDung},
        url: '/user/getNguoiDung',
        success: function (result) {
            if (result.error === false) 
            {
               GiaoDien_DataToform(result.NguoiDung.Ho,
                                result.NguoiDung.Ten,
                                result.NguoiDung.GioiTinh,
                                result.NguoiDung.DienThoai,
                                result.NguoiDung.Email,
                                result.NguoiDung.TenDangNhap,
                                result.NguoiDung.MaCoQuan,
                                result.NguoiDung.MaLoaiNguoiDung,
                                result.NguoiDung.id);
                openModal('#Edit_Modal');
            } 
            else {
                errorAlert(result.message)
            }
        }
    })
}

function edit(id)
{
    const MaNguoiDung = id;
    const data = $("#Edit_Form").serialize();
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{MaNguoiDung,data},
        url: '/user/edit',
        success: function (result) {
            if (result.error === false) 
            {
                if(result.validateError)
                {
                    console.log(result.validateError)
                    if(result.validateError.Edit_Email)
                    {
                        show_error_validate_message_function_Main("#Edit_Email-form-group" ,result.validateError.Edit_Email[0],'Edit_Email');
                    }
                    else
                    {
                        remove_error_validate_message_function_Main("#Edit_Email-form-group")
                    }

                    if(result.validateError.Edit_DienThoai)
                    {
                        show_error_validate_message_function_Main("#Edit_DienThoai-form-group" ,result.validateError.Edit_DienThoai[0],'Edit_DienThoai');
                    }
                    else
                    {
                        remove_error_validate_message_function_Main("#Edit_DienThoai-form-group")
                    }

                    if(result.validateError.Edit_TenDangNhap)
                    {
                        show_error_validate_message_function_Main("#Edit_TenDangNhap-form-group" ,result.validateError.Edit_TenDangNhap[0],'Edit_TenDangNhap');
                    }
                    else
                    {
                        remove_error_validate_message_function_Main("#Edit_TenDangNhap-form-group")
                    }

                    return 0;
                }

                if(result.passwordError)
                {
                    $( "#Edit_password-form-group" ).append( '<span for="Edit_password" class="error invalid-feedback" style="display: inline;">'+result.passwordError+'</span>');
                }

                if(result.success)
                {
                    successAlert(result.success);
                    const rowID=$('#rowID').val();
                    DataTable_editRow(rowID,MaNguoiDung);
                }
            } 
            else {
                errorAlert(result.message)
            }
        }
    })
}

function User_destroy(userID, row)
{
    var MaNguoiDung =userID;
    var rowIndex = row;
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{MaNguoiDung},
        url: '/user/delete',
        success: function (result) {
            
            if (result.error === false) 
            {
                if(result.success)
                {
                    successAlert(result.success);
                    DataTable_deleteRow(rowIndex);
                    return 0;
                }
            } 
            else {
                errorAlert(result.message)
            }
        }
    })
}

function get_NguoiDung_Quyen(userID)
{
    var MaNguoiDung =userID;
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{MaNguoiDung},
        url: '/user/get_NguoiDung_Quyen',
        success: function (result) {
            
            if (result.error === false) 
            {
                if(result.Quyen_NguoiDung)
                {
                    const TenDangNhap = result.Quyen_NguoiDung[0].TenDangNhap;
                    GiaoDien_load_Quyen_Vao_Modal(result.Quyen_NguoiDung[0].quyen, TenDangNhap)
                    return 0;
                }
            } 
            else {
                errorAlert(result.message)
            }
        }
    })
}