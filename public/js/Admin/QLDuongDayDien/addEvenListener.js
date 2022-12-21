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
    
    const id = $(this).attr('OBJECTID');
    $('#OBJECTID_DuongDayDien').html(id);
    Ajax_getDuongDauDien_By_Id(id);
});

$('#edit_DuongDayDien_btn').on('click',function(){
    if ( $('#Edit_DuongDayDien_Form').valid() ) {
        Ajax_edit();
    }
})

$(document).on("click", '#delete', function(event) { 
    const rowID = DataTable_Main_getRowID('#table',this);
    const id = $(this).attr('OBJECTID');

    deleteAlert(id, 'đường dây điện', function (confirmed) {
        if (confirmed == true) {
            Ajax_xoa(id, rowID);
        }
        else { 
        }
    });
});

$('#LoaiDuongDien_Sort').on('change',function(){
    DataTable_Main_sort('#table',this,0);
})

$('#DAQH_DuongDayDien_Sort').on('change',function(){
    DataTable_Main_sort('#table',this,2);
})
