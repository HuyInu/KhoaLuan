$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

function showDMXa()
{
    const MaHuyen = $('#MaHuyen').val();
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{MaHuyen},
        url: '/profile/getDMXa',
        success: function (result) {
            if (result.error === false) 
            {
                $("#MaXa").html("");
                $("#MaXa").append('<option value="0">Chọn phường/ xã</option>');
                result.duLieuDMXa.forEach(function(item, index){
                    $("#MaXa").append('<option value="'+item.MaXa+'">'+item.TenXa+'</option>');
                });
            } 
            else 
            {
                
            }
        }
    })
}