$('#EditForm').validate({
    rules: {
        onfocusout: false,
        onkeyup: true,
        onclick: false,
        TenLoaiDatTheoDA: {
            required: true,
        },
        MaDuAnQuyHoach: {
            required_select: true,
        },
        MaLoaiDatQHXD: {
            required_select: true,
        },
        DienTich:{
            required: true,
        },
        HeSoSuDungDat:{
            required: true,
        },
        TangCaoXayDung:{
            required: true,
        },
    },
    messages: {
        TenLoaiDatTheoDA: {
            required: "Vui lòng nhập tên đất.",
        },
        MaDuAnQuyHoach: {
            required_select: "Vui lòng chọn dự án quy hoạch.",
        },
        MaLoaiDatQHXD: {
            required_select: "Vui lòng chọn loại đất.",
        },
        DienTich:{
            required: "Vui lòng nhập diện tích.",
        },
        HeSoSuDungDat:{
            required: "Vui lòng nhập hệ số sử dụng đất.",
        },
        TangCaoXayDung:{
            required: "Vui lòng nhập tầng cao xây dựng.",
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

jQuery.validator.addMethod("required_value", function(value, element) {
    if(value != '')
    {
        return true;
    }
    else
    {
        return false;
    } 
});