function DataTable_Main_sort(idTable,selector,columnIndex)
{
    const table = $(idTable).DataTable();
    var val = $.fn.dataTable.util.escapeRegex(
        $(selector).val()
        );

    table.column(columnIndex).search( val ? '^'+val+'$' : '', true, false ).draw();
}

function DataTable_Main_CreateDataTable(IDTable)
{
    $(IDTable).DataTable({
        "pageLength": 10,
        "language": {
            "lengthMenu": "Hiện _MENU_ mục",
            "search":"Tìm kiếm",
            "info": "Hiện _START_ đến _END_ trong tổng _TOTAL_ mục",
            "paginate": {
            "first":      "Đầu",
            "last":       "Cuối",
            "next":       "Tiếp",
            "previous":   "Trước",
         },
        "emptyTable": "Không có dữ liệu",
        "loadingRecords": "Đang tải...",
        "zeroRecords": "Không tìm thấy kết quả.",
        "infoFiltered": "(Đã lọc từ _MAX_ mục)"
        },
    });
}

function  DataTable_Main_getRowID(IDTable,thisElement)
{
    const table = $(IDTable).DataTable();
    const rowIndex =table.row( $(thisElement).parents('tr')).index();
    return rowIndex;
}

function DataTable_Main_addRow(idTable,rowContent)
{
    $(idTable).dataTable().fnAddData(rowContent);
}

function DataTable_Main_editRow(idTable,rowContent, rowID)
{
    $(idTable).DataTable().row(rowID).data(rowContent).draw();
}

function DataTable_Main_removeRow(idTable, rowID)
{
    $(idTable).DataTable().row(rowID).remove().draw();
}