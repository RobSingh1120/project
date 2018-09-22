$(document).ready(function() {


    $.validator.methods.PrefixNotSpace = function (value, element) {
        if (/^\S*[\da-zA-Z][\da-zA-Z\S]*$/.test(value) != !0) 
            ab = !1;
        else 
            ab = !0;
        return ab
    };
    $.validator.methods.PrefixByZero = function (value, element) {
        if (/^[1-9][0-9]*$/.test(value) != !0) 
            ab = !1;
        else 
            ab = !0;
        return ab
    };
    $.validator.methods.NoSpace = function (value, element) {
        if (/^\S*$/.test(value) != !0) 
            ab = !1;
        else 
            ab = !0;
        return ab
    };
    $.validator.methods.customValidation = function (value, element) {
        if (/^\S/.test(value) !== !0) ab = !1;
        else ab = !0;
        return ab
    };
    $.validator.methods.PhoneValidation = function (value, element) {
    if (/^(?!(\d)\1{9})(?!0123456789|1234567890|0987654321|9876543210)\d{10}$/.test(value) != !0) 
        ab = !1;
    else 
        ab = !0;
    return ab
};
$.validator.methods.alphabetsOnly = function (value, element) {
    if (/^[a-zA-Z ]*$/.test(value) != !0) 
        ab = !1;
    else 
        ab = !0;
    return ab
};
$.validator.methods.alphaNumericOnly = function (value, element) {
    if (/^(?![0-9]*$)[a-zA-Z0-9' ']+$/i.test(value) != !0) 
        ab = !1;
    else 
        ab = !0;
    return ab
};



    $("#edit12").validate({
        /*ignore: "",*/
        rules: {
              name:
                {
                 required: true,
                 minlength:5,
                 maxlength:30,
                 //NoSpace: true,
                 //PrefixNotSpace : true,
                 customValidation : true,
                 alphabetsOnly :true
                 },
                zone:
                {
                 required: true,
                 minlength:5,
                 maxlength:30,
                 PrefixNotSpace : true,
                 customValidation : true,
                 alphaNumericOnly : true

                 },
            role:
                {
                 required: true,
                 minlength:5,
                 maxlength:30,
                 PrefixNotSpace : true,
                 customValidation : true,
                  alphabetsOnly :true
                 },
                 mobile:
                {
                 required: true,
                 maxlength:10,
                 PrefixNotSpace : true,
                 PrefixByZero : true,
                PhoneValidation : true
                 },
            username:
                {
                 required: true,
                 minlength:5,
                 maxlength:30,
                 PrefixNotSpace : true,
                 customValidation : true,
                 alphaNumericOnly : true
                 },
            password: {
                required: true,
                minlength: 6,
                maxlength: 30,
                PrefixByZero: true,
                PrefixNotSpace : true,
                customValidation : true
            }
        },
        messages: {
            name: 
            {  
                required: "Please enter your name",
                minlength:"enter minimum 5 character",
                maxlength:"enter maximum 30 character",
                //PrefixNotSpace: "Space not allowed",
               // NoSpace: "white space in usrname is not allowed",
                customValidation : "username should not prefix by zero",
                alphabetsOnly : "only alphabets are allowed"
            },
             zone: 
            {  
                required: "Please enter zone",
                minlength:"enter minimum 5 character",
                maxlength:"enter maximum 30 character",
                PrefixNotSpace: "Space not allowed",
               // NoSpace: "white space in usrname is not allowed",
                customValidation : "zone name should not prefix by zero",
                alphaNumericOnly : "only alphabets and number are allowed"
            },
             role: 
            {  
                required: "Please enter role",
                minlength:"enter minimum 5 character",
                maxlength:"enter maximum 30 character",
                PrefixNotSpace: "Space not allowed",
               // NoSpace: "white space in usrname is not allowed",
                customValidation : "role name should not prefix by zero",
                alphabetsOnly : "only alphabets are allowed"
            },
             mobile: 
            {  
                required: "Please enter your role",
                minlength:"enter minimum 5 character",
                maxlength:"enter maximum 30 character",
                PrefixNotSpace: "Space not allowed",
               // NoSpace: "white space in usrname is not allowed",
                PrefixByZero : "0 not allowed before number",
                 PhoneValidation : "please enter valid phone number"

            },
             username: 
            {  
                required: "Please enter your name",
                minlength:"enter minimum 5 character",
                maxlength:"enter maximum 30 character",
                PrefixNotSpace: "Space not allowed",
               // NoSpace: "white space in usrname is not allowed",
                customValidation : "username should not prefix by zero",
                  alphaNumericOnly : "only alphabets and number are allowed"
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6 characters long",
                maxlength: "Your password must be not more than 30 character",
               // NoSpace: "white space in password not allowed",
                PrefixByZero: "Please enter valid number",
                customValidation : "password should not prefix by zero"
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
}); 
