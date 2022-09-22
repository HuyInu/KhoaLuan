$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

function editDuAnQuyHoach()
{
    const data = $("#Edit_Form").serialize();
    const MaDuAn = $("#MaDuAn").val();
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{data,MaDuAn},
        url: '/DuAnQuyHoach/edit',
        success: function (result) {
            if (result.error === false) 
            {
               if(result.validateError){
                    warningAlert(result.validateError);
                    return 0;
               }

               if(result.success)
               {
                    successAlert(result.success);
                    return 0;
               }
            } 
            else {
                errorAlert(result.message);
            }
        }
    })
}

function delete_DuAnQuyHoach(DuAnID)
{
    const MaDuAn = DuAnID;
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{MaDuAn},
        url: '/DuAnQuyHoach/delete',
        success: function (result) {
            if (result.error === false) 
            {
               if(result.success)
               {
                    successAlert(result.success);
                    return 0;
               }
            } 
            else {
                errorAlert(result.message);
            }
        }
    })
}

function insert_DuAnQuyHoach()
{
    const data = $("#Add_Form").serialize();
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{data},
        url: '/DuAnQuyHoach/insert',
        success: function (result) {
            if (result.error === false) 
            {
               if(result.validateError)
               {
                    if(result.validateError.Add_MaDuAn[0])
                    {
                        $( ".Add_MaDuAn_group" ).append( '<span for="Add_MaDuAn" class="error invalid-feedback" style="display: block;">'+result.validateError.Add_MaDuAn[0]+'</span>');
                        return 0;
                    }

                    if(result.validateError.Add_TenDuAn[0])
                    {
                        $( ".Add_TenDuAn_group" ).append( '<span for="Add_TenDuAn" class="error invalid-feedback" style="display: block;">'+result.validateError.Add_TenDuAn[0]+'</span>');
                        return 0;
                    }
               }

               if(result.success)
                    {
                        successAlert(result.success);
                     
                    }
                    return 0;
                } 
            else {
                errorAlert(result.message);
            }
        }
    })
}