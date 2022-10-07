$('#Them_Sua_Nhom_Quyen_Form').validate({
    rules: {
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        TenNhomQuyen: {
            required: true,
        }
    },
    messages: {
        TenNhomQuyen: {
            required: "Vui lòng nhập tên nhóm quyền.",
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
    
});

function Validate_hide_error_message()
{
    $('#Them_Sua_Nhom_Quyen_Form').validate({ errorPlacement: function(error, element) {} });
}