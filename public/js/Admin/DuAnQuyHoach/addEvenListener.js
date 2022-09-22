$(document).on("click", '#edit', function(event) { 
    loadDataToModel(this);
    openModal('#Edit_Modal');
});

$(document).on("click", '#delete', function(event) { 

    const MaDuAn = $(this).closest("tr").find(".MaDuAn").text()
    deleteAlert(MaDuAn, 'dự án', function (confirmed) {
        if (confirmed == true) {
            delete_DuAnQuyHoach(MaDuAn);
        }
        else {
            
        }
    });

});

$('#insert').on('click',function(){
    XuLyGiaoDien_empty_Add_Form();
    openModal('#Add_Modal');
});