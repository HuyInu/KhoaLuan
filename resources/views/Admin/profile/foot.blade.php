<script src="/js/Admin/profile/profileAjax.js"></script>
<script src="/js/Admin/profile/GiaoDien.js"></script>
<script src="/js/Admin/profile/addEvenListener.js"></script>
<script src="/js/Admin/profile/profileValidate.js"></script>
<script src="/js/Admin/profile/showDMXaAjax.js"></script>
<script src="/js/main/resetPassworkValidate.js"></script>
<script>
    //set user gioiTinh select option
    $("#GioiTinh").val("{{$userInfor->GioiTinh}}");

    //set user huyen select option
    $("#MaHuyen").val("{{$MaHuyen}}");

    //set user xa select option
    $("#MaXa").val("{{$userInfor->MaXa ?? 0}}"); 

    //set user CoQuan select option
    $("#MaCoQuan").val("{{$userInfor->MaCoQuan ?? 0}}"); 

    // Event show password
    var showPassword = false;
    $('#btnShowPassword').on('click',function(){
        showPassword = !showPassword;
        if(showPassword){
            $('#matKhau').attr('type','text');
            $(this).html(`<i class="fa fa-eye" aria-hidden="true"></i>`);
        }else{
            $('#matKhau').attr('type','password');
            $(this).html(`<i class="fa fa-eye-slash" aria-hidden="true"></i>`);
        }
    })
</script>


