$(document).ready(function() {
    // Add Row
    DataTable_Main_CreateDataTable('#table');
});



function add_row(MaLoaiDuAn, TenLoaiDuAn,idTable)
{
    const action = '<td> <div class="form-button-action">'+
    '<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Sửa" id="edit" MaLoaiDuAn="'+MaLoaiDuAn+'"> <i class="fa fa-edit"></i></button>'+
    '<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Xóa" id="delete" MaLoaiDuAn="'+MaLoaiDuAn+'"> <i class="fa fa-times"></i> </button> </div> </td>';

    const rowContent = [MaLoaiDuAn,TenLoaiDuAn,action];

    DataTable_Main_addRow(idTable,rowContent);
}

function edit_row(MaLoaiDuAn,TenLoaiDuAn, idTable, rowID)
{
    const action = '<td> <div class="form-button-action">'+
    '<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Sửa" id="edit" MaLoaiDuAn="'+MaLoaiDuAn+'"> <i class="fa fa-edit"></i></button>'+
    '<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Xóa" id="delete" MaLoaiDuAn="'+MaLoaiDuAn+'"> <i class="fa fa-times"></i> </button> </div> </td>';

    const rowContent = [MaLoaiDuAn, TenLoaiDuAn, action];

    DataTable_Main_editRow(idTable,rowContent, rowID)
}