$(document).on("click", '#edit', function(event) { 
    const rowID =  DataTable_Main_getRowID( '#DuAnQuyHoachTable',this);

    $('#rowID').html(rowID);
    const id = $(this).attr('MaDuAn');

    get_DuAnQuyHoach(id);
    openModal('#Edit_Modal');
});

$(document).on("click", '#delete', function(event) { 
    
    const MaDuAn = $(this).attr('MaDuAn');
    deleteAlert(MaDuAn, 'dự án', function (confirmed) {
        if (confirmed == true) {
            delete_DuAnQuyHoach(MaDuAn);
        }
        else {
            
        }
    });

});

$('#editRowButton').on('click',function(){
    if ( $('#Edit_Form').valid() ) {
        editDuAnQuyHoach();
    }
})

$('#insert').on('click',function(){
    XuLyGiaoDien_empty_Add_Form();
    openModal('#Add_Modal');
});