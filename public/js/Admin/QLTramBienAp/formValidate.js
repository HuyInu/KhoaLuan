$('#Edit_TramBienAp_Form').validate({
    rules: {
        onfocusout: false,
        onkeyup: true,
        onclick: false,
        TenTramBienAp: {
            required: true,
        }
    },
    messages: {
        TenTramBienAp: {
            required: "Vui lòng nhập tên trạm biến áp.",
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
