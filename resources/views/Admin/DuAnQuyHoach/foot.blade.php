<script >
    $(document).ready(function() {
        // Add Row
        var myTable = $('#DuAnQuyHoachTable').DataTable({
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
            }
        });

        /*someId = 0
        newData = [ "ted", "London", "23","23","23","23","23" ]
        myTable.row(someId).data( newData ).draw();*/

       /* myTable.on('order.dt search.dt', function () {
        let i = 1;
 
        t.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
            this.data(i++);
        });
        }).draw();*/
        

        var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Sửa"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Xóa"> <i class="fa fa-times"></i> </button> </div> </td>';

        $('#addRowButton').click(function() {
            $('#DuAnQuyHoachTable').DataTable.fnAddData([
                $("#MaDuAn").val(),
                $("#MaDuAn").val(),
                $("#TenDuAn").val(),
                $("#MaLoaiQuyHoach").text(),
                $("#TinhTrangPheDuyet").text(),
                $("#NgayKyQuyetDinh").val(),
                action
                ]);
            $('#addRowModal').modal('hide');

        });
    });
</script>