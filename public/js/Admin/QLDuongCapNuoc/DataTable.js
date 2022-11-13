$(document).ready(function() {
    
    DataTable_Main_CreateDataTable('#table');
});


function edit_row(OBJECTID,LoaiDuongCapNuoc, DuongKinh, ChieuDai, DAQH, idTable, rowID)
{
    const action = '<td> <div class="form-button-action">'+
    '<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Sửa" id="edit" OBJECTID="'+OBJECTID+'"> <i class="fa fa-edit"></i></button>'+
    '<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Xóa" id="delete" OBJECTID="'+OBJECTID+'"> <i class="fa fa-times"></i> </button> </div> </td>';

    const rowContent = [LoaiDuongCapNuoc, DuongKinh, ChieuDai, DAQH,action];

    DataTable_Main_editRow(idTable,rowContent, rowID)
}