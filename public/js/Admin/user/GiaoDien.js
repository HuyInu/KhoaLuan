$(document).ready(function() {

    var showPassword = false;
        $('#btnShowPassword').on('click',function(){
            showPassword = !showPassword;
            if(showPassword){
                $('#password').attr('type','text');
                $(this).html(`<i class="fa fa-eye" aria-hidden="true"></i>`);
            }else{
                $('#password').attr('type','password');
                $(this).html(`<i class="fa fa-eye-slash" aria-hidden="true"></i>`);
        }
    });

    var showPassword_confirm = false;
        $('#btnShowPassword_confirm').on('click',function(){
            showPassword_confirm = !showPassword_confirm;
            if(showPassword_confirm){
                $('#password_confirm').attr('type','text');
                $(this).html(`<i class="fa fa-eye" aria-hidden="true"></i>`);
            }else{
                $('#password_confirm').attr('type','password');
                $(this).html(`<i class="fa fa-eye-slash" aria-hidden="true"></i>`);
        }
    });

    var Edit_showPassword = false;
        $('#Edit_btnShowPassword').on('click',function(){
            Edit_showPassword = !Edit_showPassword;
            if(Edit_showPassword){
                $('#Edit_password').attr('type','text');
                $(this).html(`<i class="fa fa-eye" aria-hidden="true"></i>`);
            }else{
                $('#Edit_password').attr('type','password');
                $(this).html(`<i class="fa fa-eye-slash" aria-hidden="true"></i>`);
        }
    });

    var Edit_showPassword_confirm = false;
        $('#Edit_btnShowPassword_confirm').on('click',function(){
            Edit_showPassword_confirm = !Edit_showPassword_confirm;
            if(Edit_showPassword_confirm){
                $('#Edit_password_confirm').attr('type','text');
                $(this).html(`<i class="fa fa-eye" aria-hidden="true"></i>`);
            }else{
                $('#Edit_password_confirm').attr('type','password');
                $(this).html(`<i class="fa fa-eye-slash" aria-hidden="true"></i>`);
        }
    });

})
function GioaDien_togglePassword(element)
{
    if(element.checked) {
        $("#Edit_password").removeAttr('disabled');
        $("#Edit_password_confirm").removeAttr('disabled');
    } else {
        $("#Edit_password").attr('disabled','');
        $("#Edit_password_confirm").attr('disabled','');
    }
}
function GiaoDien_DataToform(Ho,
                            Ten,
                            GioiTinh,
                            DienThoai,
                            Email,
                            TenDangNhap,
                            MaCoQuan,
                            MaLoaiNguoiDung,
                            MaNguoiDung,
                            )
{
    $('#Edit_Ho').val(Ho);
    $('#Edit_Ten').val(Ten);
    $('#Edit_GioiTinh').val(GioiTinh);
    $('#Edit_DienThoai').val(DienThoai);
    $('#Edit_Email').val(Email);
    $('#Edit_TenDangNhap').val(TenDangNhap);
    $('#Edit_CoQuan').val(MaCoQuan);
    $('#Edit_LoaiNguoiDung').val(MaLoaiNguoiDung);
    $('#MaNguoiDung').html(MaNguoiDung);

}

function GiaoDien_load_Quyen_Vao_Modal(Quyen_NguoiDung, TenDangNhap)
{
    $('#Quyen_NguoiDung_bodyTable').html('');
    $('#TenDangNhap_table_head').html(TenDangNhap)
        var Quyen=Quyen_NguoiDung;
        if(Quyen.length == 0)
        {
            $('#Quyen_NguoiDung_bodyTable').append("Người dùng chưa được phân quyền.");
        }
        else
        {
        $.each(Quyen, function( index, Quyen ) {
            $('#Quyen_NguoiDung_bodyTable').append(
                                                        "<tr>"+
                                                            "<td>"+Quyen.TenQuyen+"</td>"+
                                                        "</tr>"
                                                        );
        }); 
    }
}