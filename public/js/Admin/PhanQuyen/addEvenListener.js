var treeQuyen= $.ui.fancytree.getTree("#tree_Quyen");
var treeNguoDung=$.ui.fancytree.getTree("#treeData_NguoiDung");

$('#select-NhomQuyen').on('change',function(){
    const MaNhomQuyen= $(this).val();
    get_Quyen_NhomQuyen_NguoiDung(MaNhomQuyen);
    show_CapNhat_checkbox();
});

function check_NhomQuyen_Val()
{
    const MaNhomQuyen = $('#select-NhomQuyen').val()
    if(!MaNhomQuyen)
    {
        warningAlert("Vui lòng chọn nhóm quyền.")
        return 0;
    }
    else
    {
        return 1;
    }
}

$('#CapNhat_checkbox').on('change',function(){
    show_hide_CapNhat_Div(this);
});

$('#Open_ThemNhomQuyenForm').on('click',function(){
    emply_input();
    show_hide_AddEditBtn_NhomQuyen("#addNhomQuyenBtn","#editNhomQuyenBtn");
    change_modal_title("Thêm nhóm quyền");
    openModal('#Add_Edit_Modal');
});

$("#Open_SuaNhomQuyenForm").on('click',function(){
    if(check_NhomQuyen_Val()==0)
    {
        return 0;
    }
    show_hide_AddEditBtn_NhomQuyen("#editNhomQuyenBtn","#addNhomQuyenBtn");
    change_modal_title("Sửa nhóm quyền");
    loadData_to_Modal("#select-NhomQuyen","#TenNhomQuyen")
    openModal('#Add_Edit_Modal');
})

$("#XoaNhomQuyen").on('click',function(){
    
    if(check_NhomQuyen_Val()==0)
    {
        return 0;
    }
    const MaNhomQuyen = $('#select-NhomQuyen').val();
    deleteAlert(MaNhomQuyen, 'nhóm quyền', function (confirmed) {
        if (confirmed == true) {
            xoa_NhomQuyen(MaNhomQuyen);
        }
        else {
            
        }
    });
})

$("#addNhomQuyenBtn").on('click',function(event){
    event.preventDefault();
    if($('#Them_Sua_Nhom_Quyen_Form').valid())
    {
        them_NhomQuyen();
    }
})

$("#editNhomQuyenBtn").on('click',function(event){
    event.preventDefault();
    if($('#Them_Sua_Nhom_Quyen_Form').valid())
    {
        sua_NhomQuyen();
    }
})

$('#save_NhomQuyen_Quyen').on('click',function(){
    const NodeIDArray = get_treeQuyen_selected_node();
    const MaNhomQuyen = $('#select-NhomQuyen').val();

    them_Quyen_Vao_Nhom(MaNhomQuyen, NodeIDArray);
    get_Quyen_NhomQuyen_NguoiDung(MaNhomQuyen);

    $("#CapNhat_checkbox").prop('checked', false);
    show_hide_CapNhat_Div($("#CapNhat_checkbox"))
})

$('#save_NhomQuyen_NguoiDung').on('click',function(){
    if(check_NhomQuyen_Val()==0)
    {
        return 0;
    }
    const NodeIDArray = get_treeNguoiDung_selected_node();
    const MaNhomQuyen = $('#select-NhomQuyen').val();

    them_NguoiDung_Vao_NhomQuyen(MaNhomQuyen, NodeIDArray);

    //get_Quyen_NhomQuyen_NguoiDung(MaNhomQuyen);

})