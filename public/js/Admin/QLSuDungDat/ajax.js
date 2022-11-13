$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})


function Ajax_getSuDungDat_By_Id(OBJECTID)
{
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{OBJECTID},
        url: '/SuDungDat/get_SuDungDat',
        success: function (result) {
            if (result.error === false) 
            {
                if(result.SuDungDat)
                {
                    const SuDungDat = result.SuDungDat[0];
                    GiaoDien_LoadDataToForm(SuDungDat.TenLoaiDatTheoDA, SuDungDat.DienTich, SuDungDat.HeSoSuDungDat, SuDungDat.TangCaoXayDung,SuDungDat. MaDuAnQuyHoach, SuDungDat.MaLoaiDatQHXD, SuDungDat.MatDoXayDung);
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
    const data = $("#EditForm").serialize();
    const OBJECTID = $("#OBJECTID").html();
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{OBJECTID, data},
        url: '/SuDungDat/sua_SuDungDat',
        success: function (result) {
            
            if (result.error === false) 
            {
            
                if(result.success)
                {
                    edit_row(OBJECTID,$('#TenLoaiDatTheoDA').val(),$('#DienTich').val(), $('#HeSoSuDungDat').val(), $('#TangCaoXayDung').val(), $('#MatDoXayDung').val(), $('#MaDuAnQuyHoach').find(":selected").text(), $('#MaLoaiDatQHXD').find(":selected").text(), '#table', $('#rowID').html())
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

function Ajax_xoa(OBJECTID, rowID)
{

    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{OBJECTID},
        url: '/SuDungDat/xoa_SuDungDat',
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