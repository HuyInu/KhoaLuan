$('#Huyen').on('change',function(){
    const MaHuyen = $(this).val();console.log('a')
    Ajax_getXa_By_Huyen(MaHuyen);
})