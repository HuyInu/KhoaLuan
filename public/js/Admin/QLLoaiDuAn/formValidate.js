$('#Form').validate({
    rules: {
        onfocusout: false,
        onkeyup: true,
        onclick: false,
        TenLoaiDuAn: {
            required: true,
        },
        MaLoaiDuAn: {
            required: true,
        },
    },
    messages: {
        TenLoaiDuAn: {
            required: "Vui lòng nhập tên loại quy hoạch.",
        },
        MaLoaiDuAn: {
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
        TenLoaiDuAn_Edit: {
            required: true,
        },
        MaLoaiDuAn_Edit: {
            required: true,
        },
    },
    messages: {
        TenLoaiDuAn_Edit: {
            required: "Vui lòng nhập tên loại quy hoạch.",
        },
        MaLoaiDuAn_Edit: {
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