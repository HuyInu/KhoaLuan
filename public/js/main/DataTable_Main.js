function DataTable_Main_sort(idTable,selector,columnIndex)
{
    const table = $(idTable).DataTable();
    var val = $.fn.dataTable.util.escapeRegex(
        $(selector).val()
        );

    table.column(columnIndex).search( val ? '^'+val+'$' : '', true, false ).draw();
}