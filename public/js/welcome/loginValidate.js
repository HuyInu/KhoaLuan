$('#loginForm').validate({
    rules: {
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        taiKhoan: {
            required: true,
        },
        matKhau: {
            required: true,
        }
    },
    messages: {
        taiKhoan: {
            required: "Vui lòng nhập tài khoản.",
        },
        matKhau: {
            required: "Vui lòng nhập mật khẩu.",
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
        login();
    }
});