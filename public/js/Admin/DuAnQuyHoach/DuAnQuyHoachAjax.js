$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

function get_DuAnQuyHoach(MaDuAn)
{
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{MaDuAn},
        url: '/DuAnQuyHoach/get_DAQH',
        success: function (result) {
            if (result.error === false) 
            {   
                const DAQH = result.DuAnQuyHoach[0];
                loadDataToModel(MaDuAn, 
                    DAQH.TenDuAn, 
                    DAQH.MaLoaiQuyHoach, 
                    DAQH.TinhTrangPheDuyet,
                    DAQH.SoQuyetDinhPheDuyet,
                    DAQH.NgayKyQuyetDinh, 
                    DAQH.QuyMoDanSo, 
                    DAQH.TyLeBanVe, 
                    DAQH.DienTich, 
                    DAQH.ThoiGianXinPheDuyet, 
                    DAQH.ThoiGianQuyHoach, 
                    DAQH.ThoiGianLayYKien, 
                    DAQH.ThoiGianCongBo, 
                    DAQH.DonViQuanLy, 
                    DAQH.DonViCapNhat, 
                    DAQH.MaLoaiDuAn, 
                    DAQH.MaTienDoDuAn);
            } 
            else {
                errorAlert(result.message);
            }
        }
    })
}

function editDuAnQuyHoach()
{
    const data = $("#Edit_Form").serialize();
    const MaDuAn = $("#MaDuAn").val();
    const rowID = $("#rowID").html();
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{data,MaDuAn},
        url: '/DuAnQuyHoach/edit',
        success: function (result) {
            if (result.error === false) 
            {
               if(result.validateError){
                    warningAlert(result.validateError.TenDuAn[0]);
                    return 0;
               }

               if(result.success)
               {
                    successAlert(result.success);
                    if($('#MaLoaiQuyHoach').val() == '')
                    {
                        var MaLoaiQuyHoach = null;
                    }
                    else
                    {
                        var MaLoaiQuyHoach = $('#MaLoaiQuyHoach').find(":selected").text();
                    }
                    DataTable_edit_row(MaDuAn,$('#TenDuAn').val(), MaLoaiQuyHoach, $('#TinhTrangPheDuyet').find(":selected").text(), $('#NgayKyQuyetDinh').val(), $('#SoQuyetDinhPheDuyet').val(), '#DuAnQuyHoachTable', rowID);
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
                    DataTable_Main_removeRow('#DuAnQuyHoachTable', $('#rowID').html());
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
                    if(result.validateError.Add_MaDuAn)
                    {
                        show_error_validate_message_function_Main('.Add_MaDuAn_group',result.validateError.Add_MaDuAn[0],'Add_MaDuAn');
                    }
                    else
                    {
                        remove_error_validate_message_function_Main('.Add_MaDuAn_group');
                    }

                    if(result.validateError.Add_TenDuAn)
                    {
                        show_error_validate_message_function_Main(".Add_TenDuAn_group",result.validateError.Add_TenDuAn[0],'Add_TenDuAn');
                    }
                    else
                    {
                        remove_error_validate_message_function_Main('.Add_TenDuAn_group');
                    }
                    return 0;
               }

               if(result.success)
                    {
                        successAlert(result.success);
                        if($('#Add_MaLoaiQuyHoach').val() == '')
                        {
                            var MaLoaiQuyHoach = null;
                        }
                        else
                        {
                            var MaLoaiQuyHoach = $('#Add_MaLoaiQuyHoach').find(":selected").text();
                        }
                        DataTable_add_row($('#Add_MaDuAn').val(),$('#Add_TenDuAn').val(), MaLoaiQuyHoach, $('#Add_TinhTrangPheDuyet').find(":selected").text(), $('#Add_NgayKyQuyetDinh').val(), $('#Add_SoQuyetDinhPheDuyet').val(), '#DuAnQuyHoachTable');
                    }
                    return 0;
                } 
            else {
                errorAlert(result.message);
            }
        }
    })
}