$('#doiMatKhauForm').validate({
    rules: {
        passwordOld:{
            required:true,
        },
        passwordNew:{
            minlength: 8,
            maxlength: 15,
            required:true,
            checklower: true,
            checkupper: true,
            checkdigit: true,
            unicode:true,
            checkSpace:true,
            specialKey_password:true
        },
        passwordNew_confirm:{
            equalTo : "#passwordNew"
        },
    },
    messages: {
        passwordOld: {
            required:"Vui lòng nhập mật khẩu cũ."
        },
        passwordNew:{
            minlength: "Mật khẩu tối thiểu 8 ký tự.",
            maxlength: "Mật khẩu tối đa 15 ký tự.",
            required:"Vui lòng nhập mật khẩu.",
            checklower: "Mật khẩu phải có ít nhất 1 ký tự thường",
            checkupper: "Mật khẩu phải có ít nhất 1 ký tự in",
            checkdigit: "Mật khẩu phải có ít nhất 1 số",
            unicode:"Mật khẩu đăng nhập không được có dấu",
            checkSpace:"Mật khẩu không được có khoảng trắng",
            specialKey_password:"Mật khẩu phải có ít nhất 1 ký tự đặt biệt"
        },
        passwordNew_confirm:{
            equalTo : "Mật khẩu không trùng khớp."
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
        changePasswork();
    }
});

jQuery.validator.addMethod("specialKey_password", function(value, element) {
    return this.optional(element) || /[!@#$%^&*]/i.test(value);
});

$.validator.addMethod("unicode", function(value,element) {
    return this.optional(element) || /^[\u0000-\u007f]*$/.test(value); 
});

$.validator.addMethod("checkSpace", function(value, element) {
    var a= this.optional(element) || /[^!\S]/.test(value);;
    return !a;
});

$.validator.addMethod("checklower", function(value) {
    return /[a-z]/.test(value);
});

$.validator.addMethod("checkupper", function(value) {
    return /[A-Z]/.test(value);
});

$.validator.addMethod("checkdigit", function(value) {
    return /[0-9]/.test(value);
});