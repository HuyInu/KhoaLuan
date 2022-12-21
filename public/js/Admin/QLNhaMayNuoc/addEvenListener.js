$(document).on("click", '#edit', function(event) { 
    const rowID =  DataTable_Main_getRowID('#table',this);
    $('#rowID').html(rowID);
    
    const id = $(this).attr('OBJECTID');
    $('#OBJECTID_NhaMayNuoc').html(id);
    Ajax_getNhaMayNuoc_By_Id(id);
});

$('#edit_NhaMayNuoc_btn').on('click',function(){
    if ( $('#Edit_NhaMayNuoc_Form').valid() ) {
        Ajax_edit();
    }
})

$(document).on("click", '#delete', function(event) { 
    const rowID = DataTable_Main_getRowID('#table',this);
    const id = $(this).attr('OBJECTID');

    deleteAlert(id, 'nhà máy nước', function (confirmed) {
        if (confirmed == true) {
            Ajax_xoa(id, rowID);
        }
        else { 
        }
    });
});

$('#DAQH_NhaMayNuoc_Sort').on('change',function(){
    DataTable_Main_sort('#table', this,2)
})

