$(document).on("click", '#edit', function(event) { 
    $('#togglePassword').prop('checked', false);
    GioaDien_togglePassword($('#togglePassword')[0]);

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

$(document).on("click", '#ShowQuyen', function(event) { 
    const userID = $(this).attr('MaNguoiDung');
    get_NguoiDung_Quyen(userID);
    openModal('#QuyenList_Modal');
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