$('#Edit_Form').validate({
    rules: {
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        TenDuAn: {
            required: true,
        },
        TenDuAn: {
            required: true,
        },
        TinhTrangPheDuyet: {
            required_select: true,
        },
        MaLoaiQuyHoach: {
            required_select: true,
        },
        TinhTrangPheDuyet: {
            required_select: true,
        },
        MaTienDoDuAn: {
            required_select: true,
        },
        MaLoaiDuAn: {
            required_select: true,
        },
    },
    messages: {
        TenDuAn: {
            required: 'Vui lòng nhập tên dự án.',
        },
        TenDuAn: {
            required: 'Vui lòng nhập tên dự án.',
        },
        TinhTrangPheDuyet: {
            required_select: "Vui lòng chọn tình trạng phê duyệt.",
        },
        MaLoaiQuyHoach: {
            required_select: "Vui lòng chọn loại quy hoạch.",
        },
        TinhTrangPheDuyet: {
            required_select: "Vui lòng chọn tình trạng phê duyệt.",
        },
        MaTienDoDuAn: {
            required_select: "Vui lòng chọn tiến độ dự án.",
        },
        MaLoaiDuAn: {
            required_select: "Vui lòng chọn loại dự án.",
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
            required_select: true,
        },
        Add_MaLoaiQuyHoach: {
            required_select: true,
        },
        Add_TinhTrangPheDuyet: {
            required_select: true,
        },
        Add_MaTienDoDuAn: {
            required_select: true,
        },
        Add_MaLoaiDuAn: {
            required_select: true,
        },
    },
    messages: {
        Add_MaDuAn: {
            required: 'Vui lòng nhập mã dự án.',
        },
        Add_TenDuAn: {
            required: 'Vui lòng nhập tên dự án.',
        },
        Add_TinhTrangPheDuyet: {
            required_select: "Vui lòng chọn tình trạng phê duyệt.",
        },
        Add_MaLoaiQuyHoach: {
            required_select: "Vui lòng chọn loại quy hoạch.",
        },
        Add_TinhTrangPheDuyet: {
            required_select: "Vui lòng chọn tình trạng phê duyệt.",
        },
        Add_MaTienDoDuAn: {
            required_select: "Vui lòng chọn tiến độ dự án.",
        },
        Add_MaLoaiDuAn: {
            required_select: "Vui lòng chọn loại dự án.",
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

jQuery.validator.addMethod("required_select", function(value, element) {
    if(value != '')
    {
        return true;
    }
    else
    {
        return false;
    } 
});