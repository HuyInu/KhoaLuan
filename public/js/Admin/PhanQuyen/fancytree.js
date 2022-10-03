$(document).ready(function() {
    $("#tree").fancytree({
        checkbox: true,
        icon:false
    });


    $("#treeData_NguoiDung").fancytree({
        checkbox: true,
        icon:false,
        selectMode: 3,
        autoScroll: true,
        quicksearch: true,
    });
});