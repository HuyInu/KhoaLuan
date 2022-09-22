$(document).ready(function() {
    // Add Row
    var mytable = $('#DuAnQuyHoachTable').DataTable({
        "pageLength": 5,
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
        columnDefs: [
            {
                searchable: false,
                orderable: false,
                targets: 0,
            },
        ],
        order: [[1, 'asc']],
    });

    //STT
    mytable.on('order.dt search.dt', function () {
    let i = 1;

    mytable.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
        this.data(i++);
    });
    }).draw();
    //End STT

    var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

    /*$('#addRowButton').click(function() {
        $('#DuAnQuyHoachTable').dataTable().fnAddData([
            $("#MaDuAn").val(),
            $("#MaDuAn").val(),
            $("#TenDuAn").val(),
            $("#MaLoaiQuyHoach").find(":selected").text(),
            $("#TinhTrangPheDuyet").find(":selected").text(),
            $("#NgayKyQuyetDinh").val(),
            action
            ]);
        $('#addRowModal').modal('hide');

    });*/
});

function DataTable_add_Data()
{
    var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';
    $('#DuAnQuyHoachTable').dataTable().fnAddData([
        $("#Add_MaDuAn").val(),
        $("#Add_MaDuAn").val(),
        $("#Add_TenDuAn").val(),
        $("#Add_MaLoaiQuyHoach").find(":selected").text(),
        $("#Add_TinhTrangPheDuyet").find(":selected").text(),
        $("#Add_NgayKyQuyetDinh").val(),
        action
        ]);
}