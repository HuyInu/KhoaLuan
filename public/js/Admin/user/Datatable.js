$(document).ready(function() {
    // Add Row
    $('#user_table').DataTable({
        "pageLength": 10,
        "language": {
            "lengthMenu": "Hiện _MENU_ mục",
            "search":"Tìm kiếm",
            "info": "Hiện _START_ đến _END_ trong tổng _TOTAL_ mục",
            "paginate": {
            "first":      "Đầu",
            "last":       "Cuối",
            "next":       "Tiếp",
            "previous":   "Trước"
        },
        "emptyTable": "Không có dữ liệu",
        "loadingRecords": "Đang tải...",
        "zeroRecords": "Không tìm thấy kết quả.",
        },
    });
});

function getRowID(thisElement)
{
    const table = $('#user_table').DataTable();
    const rowIndex =table.row( $(thisElement).parents('tr')).index();
    return rowIndex;
}

function Datatable_addRow(MaNguoiDung)
{
    var action = '<td> <div class="form-button-action">'+
    '<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Sửa" id="edit" MaNguoiDung="'+MaNguoiDung+'"> <i class="fa fa-edit"></i></button>'+
    '<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-info btn-lg" data-original-title="Nhóm quyền" id="ShowQuyen" MaNguoiDung="'+MaNguoiDung+'"><i class="fas fa-user-circle"></i></button>'+
    '<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Xóa" id="delete" MaNguoiDung="'+MaNguoiDung+'"> <i class="fa fa-times"></i> </button> </div> </td>';
    const GioiTinh = $("#GioiTinh").val() != '' ? $("#GioiTinh").find(":selected").text() : null;
    const CoQuan = $("#CoQuan").val() != '' ? $("#CoQuan").find(":selected").text() : null;
    $('#user_table').dataTable().fnAddData([
        $("#TenDangNhap").val(),
        $("#Ho").val()+" "+$("#Ten").val(),
        $("#Email").val(),
        GioiTinh,
        $("#LoaiNguoiDung").find(":selected").text(),
        CoQuan,
        $("#DienThoai").val(),
        action
        ]);
}


function DataTable_editRow(rowID,MaNguoiDung)
{
    var action = '<td> <div class="form-button-action">'+
    '<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Sửa" id="edit" MaNguoiDung="'+MaNguoiDung+'"> <i class="fa fa-edit"></i></button>'+
    '<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-info btn-lg" data-original-title="Nhóm quyền" id="ShowQuyen" MaNguoiDung="'+MaNguoiDung+'"><i class="fas fa-user-circle"></i></button>'+
    '<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Xóa" id="delete" MaNguoiDung="'+MaNguoiDung+'"> <i class="fa fa-times"></i> </button> </div> </td>';
    const GioiTinh = $("#Edit_GioiTinh").val() != '' ? $("#Edit_GioiTinh").find(":selected").text() : null;
    const CoQuan = $("#Edit_CoQuan").val() != '' ? $("#Edit_CoQuan").find(":selected").text() : null;

    const table = $('#user_table').DataTable();
    const data = [
                $("#Edit_TenDangNhap").val(),
                $("#Edit_Ho").val()+" "+$("#Edit_Ten").val(),
                $("#Edit_Email").val(),
                GioiTinh,
                $("#Edit_LoaiNguoiDung").find(":selected").text(),
                CoQuan,
                $("#Edit_DienThoai").val(),
                action
                ]
    table.row(rowID).data(data).draw();
}

function DataTable_deleteRow(rowID)
{
    const table = $('#user_table').DataTable();

    table.row(rowID).remove().draw();
}

