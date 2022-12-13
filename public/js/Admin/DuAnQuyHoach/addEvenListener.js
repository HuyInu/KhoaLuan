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

$('#DienTich').on('input',function(){
    this.value = this.value.replace(/[^0-9 \,]/, '');
})

$('#Add_DienTich').on('input',function(){
    this.value = this.value.replace(/[^0-9 \,]/, '');
})

$('#QuyMoDanSo').on('input',function(){
    if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'');
})

$('#Add_QuyMoDanSo').on('input',function(){
    if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'');
})

$('#LoaiQuyHoach_Sort').on('change',function(){
    DataTable_Main_sort('#DuAnQuyHoachTable',this,3);
})

$('#TinhTrangPheDuyet_Sort').on('change',function(){
    DataTable_Main_sort('#DuAnQuyHoachTable',this,4);
})