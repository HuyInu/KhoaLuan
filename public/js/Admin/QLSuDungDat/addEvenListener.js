$(document).on("click", '#edit', function(event) { 
    const rowID =  DataTable_Main_getRowID('#table',this);
    $('#rowID').html(rowID);
    
    const id = $(this).attr('OBJECTID');
    $('#OBJECTID').html(id);
    Ajax_getSuDungDat_By_Id(id);
});

$('#editRowButton').on('click',function(){
    if ( $('#EditForm').valid() ) {
        Ajax_edit();
    }
})

$(document).on("click", '#delete', function(event) { 
    const rowID = DataTable_Main_getRowID('#table',this);
    const id = $(this).attr('OBJECTID');

    deleteAlert(id, 'lô đất', function (confirmed) {
        if (confirmed == true) {
            Ajax_xoa(id, rowID);
        }
        else { 
        }
    });
});

$('#MaDuAnQuyHoach_Sort').on('change',function(){
    DataTable_Main_sort('#table',this,6);
})

$('#MaLoaiDatQHXD_Sort').on('change',function(){
    DataTable_Main_sort('#table',this,7);
})

$('#DienTich').on('input',function(){
    this.value = this.value.replace(/[^0-9 \,]/, '');
})

$('#HeSoSuDungDat').on('input',function(){
    this.value = this.value.replace(/[^0-9 \,]/, '');
})

$('#TangCaoXayDung').on('input',function(){
    this.value = this.value.replace(/[^0-9 \,]/, '');
})

$('#MatDoXayDung').on('input',function(){
    this.value = this.value.replace(/[^0-9 \,]/, '');
})
