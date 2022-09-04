<script >
    $(document).ready(function() {
        // Add Row
        $('#add-row').DataTable({
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

        var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $('#addRowButton').click(function() {
            $('#add-row').dataTable().fnAddData([
                $("#addName").val(),
                $("#addPosition").val(),
                $("#addOffice").val(),
                action
                ]);
            $('#addRowModal').modal('hide');

        });
    });
</script>