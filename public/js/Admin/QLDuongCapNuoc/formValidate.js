$('#Form').validate({
    rules: {
        onfocusout: false,
        onkeyup: true,
        onclick: false,
        TenLoaiQuyHoach: {
            required: true,
        },
        MaLoaiQuyHoach: {
            required: true,
        },
    },
    messages: {
        TenLoaiQuyHoach: {
            required: "Vui lòng nhập tên loại quy hoạch.",
        },
        MaLoaiQuyHoach: {
            required: "Vui lòng nhập mã loại quy hoạch.",
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

    }
});

$('#Edit_Form').validate({
    rules: {
        onfocusout: false,
        onkeyup: true,
        onclick: false,
        TenLoaiQuyHoach_Edit: {
            required: true,
        },
        MaLoaiQuyHoach_Edit: {
            required: true,
        },
    },
    messages: {
        TenLoaiQuyHoach_Edit: {
            required: "Vui lòng nhập tên loại quy hoạch.",
        },
        MaLoaiQuyHoach_Edit: {
            required: "Vui lòng nhập mã loại quy hoạch.",
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

    }
});