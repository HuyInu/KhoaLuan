$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

function Ajax_insert()
{
    const TenLoaiQuyHoach = $('#TenLoaiQuyHoach').val();
    const MaLoaiQuyHoach = $('#MaLoaiQuyHoach').val();
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{TenLoaiQuyHoach,MaLoaiQuyHoach},
        url: '/QLDanhMuc/LoaiQuyHoach/them_LoaiQuyHoach',
        success: function (result) {
            
            if (result.error === false) 
            {
                if(result.validateError)
                {
                    if(result.validateError.TenLoaiQuyHoach)
                    {
                        $( "#Ten-form-group" ).append( '<span for="TenLoaiQuyHoach" class="error invalid-feedback" style="display: block;">'+result.validateError.TenLoaiQuyHoach+'</span>');
                    }

                    if(result.validateError.MaLoaiQuyHoach)
                    {
                        $( "#Ma-form-group" ).append( '<span for="MaLoaiQuyHoach" class="error invalid-feedback" style="display: block;">'+result.validateError.MaLoaiQuyHoach+'</span>');
                    }
                    return 0;
                }

                if(result.success)
                {
                    add_row(MaLoaiQuyHoach, TenLoaiQuyHoach, '#table');
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

function Ajax_getLoaiQuyHoach_By_Id(MaLoaiQuyHoach)
{
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{MaLoaiQuyHoach},
        url: '/QLDanhMuc/LoaiQuyHoach/get_LoaiQuyHoach',
        success: function (result) {
            if (result.error === false) 
            {
                if(result.LoaiQuyHoach)
                {
                    GiaoDien_LoadDataToForm(result.LoaiQuyHoach[0].MaLoaiQuyHoach, result.LoaiQuyHoach[0].TenLoaiQuyHoach);
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
    const MaLoaiQuyHoachOld = $('#MaLoaiQuyHoach_Old').html();
    const TenLoaiQuyHoach = $('#TenLoaiQuyHoach_Edit').val();
    const MaLoaiQuyHoach = $('#MaLoaiQuyHoach_Edit').val();
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{TenLoaiQuyHoach, MaLoaiQuyHoachOld, MaLoaiQuyHoach},
        url: '/QLDanhMuc/LoaiQuyHoach/sua_LoaiQuyHoach',
        success: function (result) {
            
            if (result.error === false) 
            {
                if(result.validateError)
                {
                    if(result.validateError.TenLoaiQuyHoach)
                    {
                        $( "#TenEdit-form-group" ).append( '<span for="TenLoaiQuyHoach" class="error invalid-feedback" style="display: block;">'+result.validateError.TenLoaiQuyHoach+'</span>');
                    }

                    if(result.validateError.MaLoaiQuyHoach)
                    {
                        $( "#MaEdit-form-group" ).append( '<span for="MaLoaiQuyHoach" class="error invalid-feedback" style="display: block;">'+result.validateError.MaLoaiQuyHoach+'</span>');
                    }
                    return 0;
                }

                if(result.success)
                {
                    edit_row(MaLoaiQuyHoach,TenLoaiQuyHoach, '#table', $('#rowID').html())
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

function Ajax_xoa(MaLoaiQuyHoach, rowID)
{

    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{MaLoaiQuyHoach},
        url: '/QLDanhMuc/LoaiQuyHoach/xoa_LoaiQuyHoach',
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