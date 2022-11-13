$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

function get_Quyen_NhomQuyen_NguoiDung(idNhomQuyen)
{
    const MaNhomQuyen= idNhomQuyen;
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{MaNhomQuyen},
        url: '/phan_quyen/get_Quyen_NhomQuyen',
        success: function (result) {
            if (result.error === false) 
            {
               if(result.Quyen){
                    var countQuyen=0;
                    const quyen=result.Quyen[0]['quyen'];
                    const listQuyen=[];
                    $('#list-quyen').html('');
                    
                    $.each(quyen, function( index, value ) {
                        $('#list-quyen').append('<li class="list-group-item">'+(index+1)+'. '+value['TenQuyen']+'</li>');
                        
                        listQuyen.push(value['MaQuyen']);
                        countQuyen++;
                    });
                    if(countQuyen==0)
                    {
                        $('#list-quyen').append('<li class="list-group-item" style="color: red;">Nhóm chưa được phân quyền</li>');
                    }
                    fancytree_checkTreeQuyen(listQuyen);    
               }
               if(result.IDNguoiDung)
               {
                    fancytree_checkTreeNguoiDung(result.IDNguoiDung[0]);
               }
               
            } 
            else {
                errorAlert(result.message);
            }
        }
    })
}

function them_NhomQuyen()
{   
    const TenNhomQuyen = $('#TenNhomQuyen').val();
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{TenNhomQuyen},
        url: '/phan_quyen/them_NhomQuyen',
        success: function (result) {
            if (result.error === false) 
            {
                if(result.Validate_error)
                {
                    $( "#TenNhomQuyen-form-group" ).append( '<span for="TenNhomQuyen" class="error invalid-feedback" style="display: block;">'+result.Validate_error.TenNhomQuyen+'</span>');
                    return 0;
                }

                if(result.success)
                {
                    successAlert(result.success); 
                    add_item_selectpicker("#select-NhomQuyen",result.MaNhomQuyenNew,TenNhomQuyen);
                    return 0;
                }

            } 
            else {
                errorAlert(result.message);
            }
        }
    })
}

function sua_NhomQuyen()
{   
    const TenNhomQuyen = $('#TenNhomQuyen').val();
    const MaNhomQuyen = $('#select-NhomQuyen').val()
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{TenNhomQuyen,MaNhomQuyen},
        url: '/phan_quyen/sua_NhomQuyen',
        success: function (result) {
            if (result.error === false) 
            {
                if(result.Validate_error)
                {
                    $( "#TenNhomQuyen-form-group" ).append( '<span for="TenNhomQuyen" class="error invalid-feedback" style="display: block;">'+result.Validate_error.TenNhomQuyen+'</span>');
                    return 0;
                }

                if(result.success)
                {
                    successAlert(result.success); 
                    edit_item_selectpicker("#select-NhomQuyen",MaNhomQuyen,TenNhomQuyen);
                    return 0;
                }

            } 
            else {
                errorAlert(result.message);
            }
        }
    })
}

function xoa_NhomQuyen(MaNhomQuyen)
{   
    var MaNhomQuyen = MaNhomQuyen
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{MaNhomQuyen},
        url: '/phan_quyen/xoa_NhomQuyen',
        success: function (result) {
            if (result.error === false) 
            {
                if(result.success)
                {
                    successAlert(result.success); 
                    delete_item_selectpicker("#select-NhomQuyen",MaNhomQuyen)
                    return 0;
                }
            } 
            else {
                errorAlert(result.message);
            }
        }
    })
}

function them_Quyen_Vao_Nhom(MaNhomQuyen, NodeIDArray)
{   
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{MaNhomQuyen,NodeIDArray},
        url: '/phan_quyen/them_Quyen_Vao_Nhom',
        success: function (result) {
            if (result.error === false) 
            {
                if(result.success)
                {
                    successAlert(result.success); 
                    
                    return 0;
                }
            } 
            else {
                errorAlert(result.message);
            }
        }
    })
}

function them_NguoiDung_Vao_NhomQuyen(MaNhomQuyen, NodeIDArray)
{   
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{MaNhomQuyen,NodeIDArray},
        url: '/phan_quyen/them_NguoiDung_Vao_NhomQuyen',
        success: function (result) {
            if (result.error === false) 
            {
                if(result.success)
                {
                    successAlert(result.success); 
                    
                    return 0;
                }
            } 
            else {
                errorAlert(result.message);
            }
        }
    })
}