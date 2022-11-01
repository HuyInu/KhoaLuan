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
                        $( "#Ten-form-group" ).append( '<span for="TenLoaiDuAn" class="error invalid-feedback" style="display: block;">'+result.validateError.TenLoaiDuAn+'</span>');
                    }

                    if(result.validateError.MaLoaiDuAn)
                    {
                        $( "#Ma-form-group" ).append( '<span for="MaLoaiDuAn" class="error invalid-feedback" style="display: block;">'+result.validateError.MaLoaiDuAn+'</span>');
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
                        $( "#TenEdit-form-group" ).append( '<span for="TenLoaiDuAn" class="error invalid-feedback" style="display: block;">'+result.validateError.TenLoaiDuAn+'</span>');
                    }

                    if(result.validateError.MaLoaiDuAn)
                    {
                        $( "#MaEdit-form-group" ).append( '<span for="MaLoaiDuAn" class="error invalid-feedback" style="display: block;">'+result.validateError.MaLoaiDuAn+'</span>');
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