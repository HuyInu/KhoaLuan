$('#Huyen').on('change',function(){
    const MaHuyen = $(this).val();console.log('a')
    Ajax_getXa_By_Huyen(MaHuyen);
})

$('#edit_DuongDayDien_btn').on('click',function(){
    AjaxDuongDayDien_DuongDauDien_Edit();
})

$('#edit_TramBienAp_btn').on('click',function(){
    AjaxTramBienAp_TramBienAp_Edit();
})

$('#edit_DuongCapNuoc_btn').on('click',function(){
    AjaxDuongOngNuoc_TramBienAp_Edit();
})

$('#edit_NhaMayNuoc_btn').on('click',function(){
    AjaxNhaMayNuoc_NhaMayNuoc_Edit();
})