$('#Edit_Form').validate({
    rules: {
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        TenDuAn: {
            required: true,
        }
    },
    messages: {
        TenDuAn: {
            required: 'Vui lòng nhập tên dự án.',
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
        editDuAnQuyHoach();
    }
});

$('#Add_Form').validate({
    rules: {
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        Add_MaDuAn:{
            required: true,
        },
        Add_TenDuAn:{
            required: true,
        },
        Add_TinhTrangPheDuyet: {
            required_TinhTrangPheDuyet: true,
        },
    },
    messages: {
        Add_MaDuAn: {
            required: 'Vui lòng nhập mã dự án.',
        },
        Add_TenDuAn: {
            required: 'Vui lòng nhập tên dự án.',
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
        insert_DuAnQuyHoach();
    }
});

jQuery.validator.addMethod("required_TinhTrangPheDuyet", function(value, element) {
    const TinhTrangPheDuyet = $('#Add_TinhTrangPheDuyet').val();
    if(TinhTrangPheDuyet != '')
    {
        return true;
    }
    else
    {
        return false;
    } 
}, "Vui lòng chọn tình trạng phê duyệt.");