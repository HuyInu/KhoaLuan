$('#SoThua,#SoTo').on('input', function() {
    this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
});





$('#Huyen').on('change',function(){
    const MaHuyen = $(this).val();
    Ajax_getXa_By_Huyen(MaHuyen);
})