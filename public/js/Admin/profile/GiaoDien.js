function GiaoDien_update_Ten(Ten)
{
    $('#Ten_CardProfile').html(Ten);
}

var showPasswordOld = false;
$('#passwordOld_btnShowPassword').on('click',function(){
    showPasswordOld = !showPasswordOld;
    if(showPasswordOld){
        $('#passwordOld').attr('type','text');
        $(this).html(`<i class="fa fa-eye" aria-hidden="true"></i>`);
    }else{
        $('#passwordOld').attr('type','password');
        $(this).html(`<i class="fa fa-eye-slash" aria-hidden="true"></i>`);
    }
});

var showPasswordNew = false;
$('#passwordNew_btnShowPassword').on('click',function(){
    showPasswordNew = !showPasswordNew;
    if(showPasswordNew){
        $('#passwordNew').attr('type','text');
        $(this).html(`<i class="fa fa-eye" aria-hidden="true"></i>`);
    }else{
        $('#passwordNew').attr('type','password');
        $(this).html(`<i class="fa fa-eye-slash" aria-hidden="true"></i>`);
    }
});

var showPasswordNew_confirm = false;
$('#passwordNew_confirm_btnShowPassword').on('click',function(){
    showPasswordNew_confirm = !showPasswordNew_confirm;
    if(showPasswordNew_confirm){
        $('#passwordNew_confirm').attr('type','text');
        $(this).html(`<i class="fa fa-eye" aria-hidden="true"></i>`);
    }else{
        $('#passwordNew_confirm').attr('type','password');
        $(this).html(`<i class="fa fa-eye-slash" aria-hidden="true"></i>`);
    }
});