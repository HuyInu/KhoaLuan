$(document).on("click", '#edit', function(event) { 
    const rowID =  DataTable_Main_getRowID('#table',this);
    $('#rowID').html(rowID);
    
    const id = $(this).attr('OBJECTID');
    $('#OBJECTID_DuongCapNuoc').html(id);
    Ajax_getDuongCapNuoc_By_Id(id);
});

$('#edit_DuongCapNuoc_btn').on('click',function(){
        Ajax_edit();
})

$(document).on("click", '#delete', function(event) { 
    const rowID = DataTable_Main_getRowID('#table',this);
    const id = $(this).attr('OBJECTID');

    deleteAlert(id, 'đường cấp nước', function (confirmed) {
        if (confirmed == true) {
            Ajax_xoa(id, rowID);
        }
        else { 
        }
    });
});

$('#LoaiOngCapNuoc_Sort').on('change',function(){
    DataTable_Main_sort('#table',this,0);
})

$('#DAQH_DuongCapNuoc_Sort').on('change',function(){
    DataTable_Main_sort('#table',this,3);
})
