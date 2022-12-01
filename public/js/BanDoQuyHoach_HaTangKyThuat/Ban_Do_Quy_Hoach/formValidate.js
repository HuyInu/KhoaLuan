$('#timKiem_form').validate({
    rules: {
        onfocusout: false,
        onkeyup: true,
        onclick: false,
        SoThua: {
            required: true,
        },
        SoTo: {
            required_select: true,
        },
        Xa: {
            required_select: true,
        }
    },
    messages: {
        SoThua: {
            required: "Vui lòng số thửa.",
        },
        SoTo: {
            required_select: "Vui lòng nhập số tờ.",
        },
        Xa: {
            required_select: "Vui lòng chọn xã.",
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

jQuery.validator.addMethod("required_select", function(value, element) {
    if(value != null)
    {
        return true;
    }
    else
    {
        return false;
    } 
});