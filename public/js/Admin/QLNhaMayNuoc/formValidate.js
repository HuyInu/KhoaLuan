$('#Edit_NhaMayNuoc_Form').validate({
    rules: {
        onfocusout: false,
        onkeyup: true,
        onclick: false,
        TenNhaMayNuoc: {
            required: true,
        }
    },
    messages: {
        TenNhaMayNuoc: {
            required: "Vui lòng nhập tên nhà máy cấp nước.",
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
