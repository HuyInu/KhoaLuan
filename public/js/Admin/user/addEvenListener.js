$(document).on("click", '#edit', function(event) { 
    const rowID = getRowID(this);
    $('#rowID').val(rowID);
    const id = $(this).attr('MaNguoiDung');
    getNguoiDung(id);
    
    
});

$(document).on("click", '#delete', function(event) { 
    const rowID = getRowID(this);
    const id = $(this).attr('MaNguoiDung');

    deleteAlert(id, 'người dùng', function (confirmed) {
        if (confirmed == true) {
            User_destroy(id, rowID);
        }
        else {
            
        }
    });
});

$(document).on("click", '#ShowNhomQuyen', function(event) { 
    const userID = $(this).attr('MaNguoiDung');
    get_NhomQuyen_NguoiDung(userID);
    openModal('#NhomQuyenList_Modal');
});

$('#togglePassword').on('change',function(){
    GioaDien_togglePassword(this);
});


$('#LoaiNguoiDung_Sort').on('change',function(){
    DataTable_Main_sort('#user_table',this,4);
})

$('#CoQuan_Sort').on('change',function(){
    DataTable_Main_sort('#user_table',this,5);
})