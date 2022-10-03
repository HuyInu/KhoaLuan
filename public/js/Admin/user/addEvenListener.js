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

$('#togglePassword').on('change',function(){
    GioaDien_togglePassword(this);
});