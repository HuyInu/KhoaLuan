$(document).ready(function() {
    // Add Row
    DataTable_Main_CreateDataTable('#table');
});



function add_row(MaLoaiQuyHoach, TenLoaiQuyHoach,idTable)
{
    const action = '<td> <div class="form-button-action">'+
    '<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Sửa" id="edit" MaLoaiQuyHoach="'+MaLoaiQuyHoach+'"> <i class="fa fa-edit"></i></button>'+
    '<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Xóa" id="delete" MaLoaiQuyHoach="'+MaLoaiQuyHoach+'"> <i class="fa fa-times"></i> </button> </div> </td>';

    const rowContent = [MaLoaiQuyHoach,TenLoaiQuyHoach,action];

    DataTable_Main_addRow(idTable,rowContent);
}

function edit_row(MaLoaiQuyHoach,TenLoaiQuyHoach, idTable, rowID)
{
    const action = '<td> <div class="form-button-action">'+
    '<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Sửa" id="edit" MaLoaiQuyHoach="'+MaLoaiQuyHoach+'"> <i class="fa fa-edit"></i></button>'+
    '<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Xóa" id="delete" MaLoaiQuyHoach="'+MaLoaiQuyHoach+'"> <i class="fa fa-times"></i> </button> </div> </td>';

    const rowContent = [MaLoaiQuyHoach, TenLoaiQuyHoach, action];

    DataTable_Main_editRow(idTable,rowContent, rowID)
}