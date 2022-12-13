$('#profile-form').validate({
    rules: {
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        TenDangNhap: {
            required: true,
            minlength: 8,
            maxlength: 15,
            Unicode: true,
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
        MaXa:{
            required_select:true,
        },
    },
    messages: {
        TenDangNhap: {
            required: "Vui lòng nhập tài khoản.",
            minlength:"Tên đăng nhập tối thiểu 8 ký tự",
            maxlength:"Tên đăng nhập tối đa 8 ký tự",
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
        MaXa: {
            required_select: "Vui lòng chọn phường/xã.",
        },
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
       editProfile();
    }
});

jQuery.validator.addMethod("Unicode", function(value, element) {
    return this.optional(element) || /^\w+$/i.test(value);
}, "Tài khoản không được có dấu.");

jQuery.validator.addMethod("required_select", function(value, element) {
    if(value != "")
    {
        return true;
    }
    else
    {
        return false;
    } 
});
