$('#addRowButton').on('click',function(){
    if ( $('#Form').valid() ) {
        Ajax_insert();
    }
})

$('#add').on('click',function(){
    openModal('#Modal');
})

$(document).on("click", '#edit', function(event) { 
    const rowID =  DataTable_Main_getRowID('#table',this);
    $('#rowID').html(rowID);
    
    const id = $(this).attr('MaLoaiDuAn');
    $('#MaLoaiDuAn_Old').html(id);
    Ajax_getLoaiDuAn_By_Id(id);
});

$('#editRowButton').on('click',function(){
    if ( $('#Edit_Form').valid() ) {
        Ajax_edit();
    }
})

$(document).on("click", '#delete', function(event) { 
    const rowID = DataTable_Main_getRowID('#table',this);
    const id = $(this).attr('MaLoaiDuAn');

    deleteAlert(id, 'loại quy hoạch', function (confirmed) {
        if (confirmed == true) {
            Ajax_xoa(id, rowID);
        }
        else { 
        }
    });
});
