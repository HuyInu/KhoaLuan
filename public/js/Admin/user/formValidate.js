$('#Add_Form').validate({
    rules: {
        onfocusout: false,
        onkeyup: true,
        onclick: false,
        TenDangNhap: {
            required: true,
            minlength: 8,
            maxlength: 15,
            specialKey: true,
        },
        Ho: {
            required: true,
        },
        Ten: {
            required: true,
        },
        Email:{
            email:true,
        },
        password:{
            minlength: 8,
            maxlength: 15,
            required:true,
            checklower: true,
            checkupper: true,
            checkdigit: true,
            unicode:true,
            checkSpace:true,
            specialKey_password:true
        },
        passwordNew_confirm:{
            equalTo : "#password"
        },
        LoaiNguoiDung:{
            required_LoaiNguoiDung:true
        }
    },
    messages: {
        TenDangNhap: {
            required: "Vui lòng nhập tài khoản.",
            minlength:"Tên đăng nhập tối thiểu 8 ký tự",
            maxlength:"Tên đăng nhập tối đa 8 ký tự",
            specialKey:"Tên đăng nhập không được có dấu hoặc ký tự đặt biệt"
        },
        Ho: {
            required: "Vui lòng nhập họ.",
        },
        Ten: {
            required: "Vui lòng nhập tên.",
        },
        Email: {
            email: "Email không hợp lệ.",
        },
        password:{
            minlength: "Mật khẩu tối thiểu 8 ký tự.",
            maxlength: "Mật khẩu tối đa 15 ký tự.",
            required:"Vui lòng nhập mật khẩu.",
            checklower: "Mật khẩu phải có ít nhất 1 ký tự thường",
            checkupper: "Mật khẩu phải có ít nhất 1 ký tự in",
            checkdigit: "Mật khẩu phải có ít nhất 1 số",
            unicode:"Mật khẩu đăng nhập không được có dấu",
            checkSpace:"Mật khẩu không được có khoảng trắng",
            specialKey_password:"Mật khẩu phải có ít nhất 1 ký tự đặt biệt"
        },
        passwordNew_confirm:{
            equalTo : "Mật khẩu không trùng khớp."
        },
        LoaiNguoiDung:{
            required_LoaiNguoiDung:"Vui lòng chọn loại người dùng"
        }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
    },
    submitHandler: function (form) {
        insert();
    }
});

$('#Edit_Form').validate({
    rules: {
        onfocusout: false,
        onkeyup: true,
        onclick: false,
        Edit_TenDangNhap: {
            required: true,
            minlength: 8,
            maxlength: 15,
            specialKey: true,
        },
        Edit_Ho: {
            required: true,
        },
        Edit_Ten: {
            required: true,
        },
        Edit_Email:{
            email:true,
        },
        Edit_password:{
            minlength: 8,
            maxlength: 15,
            required:true,
            checklower: true,
            checkupper: true,
            checkdigit: true,
            unicode:true,
            checkSpace:true,
            specialKey_password:true
        },
        Edit_password_confirm:{
            equalTo : "#Edit_password"
        },
        Edit_LoaiNguoiDung:{
            required_LoaiNguoiDung:true
        }
    },
    messages: {
        Edit_TenDangNhap: {
            required: "Vui lòng nhập tài khoản.",
            minlength:"Tên đăng nhập tối thiểu 8 ký tự",
            maxlength:"Tên đăng nhập tối đa 8 ký tự",
            specialKey:"Tên đăng nhập không được có dấu hoặc ký tự đặt biệt"
        },
        Edit_Ho: {
            required: "Vui lòng nhập họ.",
        },
        Edit_Ten: {
            required: "Vui lòng nhập tên.",
        },
        Edit_Email: {
            email: "Email không hợp lệ.",
        },
        Edit_password:{
            minlength: "Mật khẩu tối thiểu 8 ký tự.",
            maxlength: "Mật khẩu tối đa 15 ký tự.",
            required:"Vui lòng nhập mật khẩu.",
            checklower: "Mật khẩu phải có ít nhất 1 ký tự thường",
            checkupper: "Mật khẩu phải có ít nhất 1 ký tự in",
            checkdigit: "Mật khẩu phải có ít nhất 1 số",
            unicode:"Mật khẩu đăng nhập không được có dấu",
            checkSpace:"Mật khẩu không được có khoảng trắng",
            specialKey_password:"Mật khẩu phải có ít nhất 1 ký tự đặt biệt"
        },
        Edit_password_confirm:{
            equalTo : "Mật khẩu không trùng khớp."
        },
        Edit_LoaiNguoiDung:{
            required_LoaiNguoiDung:"Vui lòng chọn loại người dùng"
        }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
    },
    submitHandler: function (form) {
        const id = $('#MaNguoiDung').text();
        edit(id);
    }
});

jQuery.validator.addMethod("specialKey", function(value, element) {
    return this.optional(element) || /^\w+$/i.test(value);
});

jQuery.validator.addMethod("specialKey_password", function(value, element) {
    return this.optional(element) || /[!@#$%^&*]/i.test(value);
});

$.validator.addMethod("unicode", function(value,element) {
    return this.optional(element) || /^[\u0000-\u007f]*$/.test(value); 
});

$.validator.addMethod("checkSpace", function(value, element) {
    var a= this.optional(element) || /[^!\S]/.test(value);;
    return !a;
});

$.validator.addMethod("checklower", function(value) {
    return /[a-z]/.test(value);
});

$.validator.addMethod("checkupper", function(value) {
    return /[A-Z]/.test(value);
});

$.validator.addMethod("checkdigit", function(value) {
    return /[0-9]/.test(value);
});

$.validator.addMethod("required_LoaiNguoiDung", function(value) {
    return value == 0 ? false : true;
});