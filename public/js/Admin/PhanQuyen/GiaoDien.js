function show_hide_CapNhat_Div(thisElement)
{
    if($(thisElement).is(":checked"))
    {
        $('#CapNhat_Div, #Div_Luu_Quyen').show();
        $('#divLabelQuyen').hide();
    }
    else
    {
        $('#CapNhat_Div, #Div_Luu_Quyen').hide();
        $('#divLabelQuyen').show();
    }
}

function show_CapNhat_checkbox()
{
    $('#CapNhat_checkbox_div').show();
}

function change_modal_title(title)
{
    $("#modal-title").html(title);
}

function emply_input()
{
    $('#TenNhomQuyen').val('');
}

function add_item_selectpicker(idSelect,value,text)
{
    $(idSelect).append('<option value="'+value+'" selected="">'+text+'</option>');
    $(idSelect).selectpicker("refresh");
}

function edit_item_selectpicker(idSelect,value,text)
{
    $(idSelect+' option[value="'+value+'"]').text(text);
    $(idSelect).selectpicker("refresh");
}

function delete_item_selectpicker(idSelect,value)
{
    $(idSelect+' option[value="'+value+'"]').remove();
    $(idSelect).selectpicker("refresh");
}

function loadData_to_Modal(idSelectpicker,idInput)
{
    const text = $(idSelectpicker).find(":selected").text();
    $(idInput).val(text);
}

function show_hide_AddEditBtn_NhomQuyen(showBtn,hideBtn)
{
    $(showBtn).show();
    $(hideBtn).hide();
}

