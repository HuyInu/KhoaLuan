$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

function login() {
    const taiKhoan = $('#taiKhoan').val();
    const matKhau = $('#matKhau').val();
    var remember = 0;
    if ($('#remember').is(":checked"))
    {
        remember = 1;
    }
    $.ajax({
        type: 'POST',
        datatype: 'JSON',
        data:{taiKhoan,matKhau,remember},
        url: '/login',
        success: function (result) {
            if (result.error === false) {
                if(result.result===true)
                {
                    window.location.href = '/';
                }
                else
                {
                    $("#loginFail").css("display","block");
                }
            } else {
                
            }
        }
    })
}