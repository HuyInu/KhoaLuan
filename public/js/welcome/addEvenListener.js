var showPassword = false;
$('#matKhau_btnShowPassword').on('click',function(){
    showPassword = !showPassword;
    if(showPassword){
        $('#matKhau').attr('type','text');
        $(this).html(`<i class="fa fa-eye" aria-hidden="true"></i>`);
    }else{
        $('#matKhau').attr('type','password');
        $(this).html(`<i class="fa fa-eye-slash" aria-hidden="true"></i>`);
    }
});