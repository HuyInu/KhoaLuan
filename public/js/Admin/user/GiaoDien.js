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

function GiaoDien_load_NhomQuyen_Vao_Modal(NhomQuyen_NguoiDung, TenDangNhap)
{
    $('#NhomQuyen_NguoiDung_bodyTable').html('');
    $('#TenDangNhap_table_head').html(TenDangNhap)
    $.each(NhomQuyen_NguoiDung, function( index, NhomQuyen ) {
        var Quyen=NhomQuyen.quyen;
        $.each(Quyen, function( index, Quyen ) {
            $('#NhomQuyen_NguoiDung_bodyTable').append(
                                                        "<tr>"+
                                                            "<td>"+NhomQuyen.TenNhomQuyen+"</td>"+
                                                            "<td>"+Quyen.TenQuyen+"</td>"+
                                                        "</tr>"
                                                        );
        });  
    });
}