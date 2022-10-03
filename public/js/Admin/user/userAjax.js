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
                        $( "#Email-form-group" ).append( '<span for="Email" class="error invalid-feedback" style="display: block;">'+result.validateError.Email+'</span>');
                    }
                    if(result.validateError.DienThoai)
                    {
                        $( "#DienThoai-form-group" ).append( '<span for="Email" class="error invalid-feedback" style="display: block;">'+result.validateError.DienThoai+'</span>');
                    }
                    if(result.validateError.TenDangNhap)
                    {
                        $( "#TenDangNhap-form-group" ).append( '<span for="Email" class="error invalid-feedback" style="display: block;">'+result.validateError.TenDangNhap+'</span>');
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
                                result.NguoiDung.id,);
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
                    if(result.validateError.Email)
                    {
                        $( "#Edit_Email-form-group" ).append( '<span for="Edit_Email" class="error invalid-feedback" style="display: block;">'+result.validateError.Email+'</span>');
                    }
                    if(result.validateError.DienThoai)
                    {
                        $( "#Edit_DienThoai-form-group" ).append( '<span for="Edit_DienThoai" class="error invalid-feedback" style="display: block;">'+result.validateError.DienThoai+'</span>');
                    }
                    if(result.validateError.TenDangNhap)
                    {
                        $( "#Edit_TenDangNhap-form-group" ).append( '<span for="Edit_TenDangNhap" class="error invalid-feedback" style="display: block;">'+result.validateError.TenDangNhap+'</span>');
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