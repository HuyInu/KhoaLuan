$(document).on("click", '#edit', function(event) { 
    const rowID =  DataTable_Main_getRowID('#table',this);
    $('#rowID').html(rowID);
    
    const id = $(this).attr('OBJECTID');
    $('#OBJECTID_TramBienAp').html(id);
    Ajax_getTramBienAp_By_Id(id);
});

$('#edit_TramBienAp_btn').on('click',function(){
        Ajax_edit();
})

$(document).on("click", '#delete', function(event) { 
    const rowID = DataTable_Main_getRowID('#table',this);
    const id = $(this).attr('OBJECTID');

    deleteAlert(id, 'trạm biến áp', function (confirmed) {
        if (confirmed == true) {
            Ajax_xoa(id, rowID);
        }
        else { 
        }
    });
});

$('#LoaiTramBienAp_Sort').on('change',function(){
    DataTable_Main_sort('#table',this,0);
})

$('#DAQH_TramBienAp_Sort').on('change',function(){
    DataTable_Main_sort('#table',this,2);
})
