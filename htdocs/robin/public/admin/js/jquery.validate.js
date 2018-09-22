$(document).ready(function() {
    
    $.validator.methods.customValidation = function (value, element) {
    if (/^\s/.test(value) == !0) ab = !1;
    else ab = !0;
    return ab
};
$.validator.methods.emailVal = function(value) {
           var reg = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            if(reg.test(value) != true)
                ab = false;
            else 
                ab = true;
            return ab; 
        };
$.validator.methods.alphabetsOnly = function (value, element) {
    if (/^[a-zA-Z ]*$/.test(value) != !0) 
        ab = !1;
    else 
        ab = !0;
    return ab
};


$.validator.methods.zeroNotAllowed = function (value, element) {
    var str = value;
    var res = str.charAt(0);
    var len = str.length;
    if (str == '0000000000') {
        return !1
    }if (str == '00000000000') {
        return !1
    }if (str == '000000000000') {
        return !1
    }if (str == '0000000000000') {
        return !1
    }if (str == '00000000000000') {
        return !1
    }if (str == '000000000000000') {
        return !1
    }if (str == '0000000000000000') {
        return !1
    }if (str == '00000000000000000') {
        return !1
    }if (str == '000000000000000000') {
        return !1
    }if (str == '0000000000000000000') {
        return !1
    }if (str == '00000000000000000000') {
        return !1
    }else{
        return !0
    }
    };

 
   
    $("#registration").validate({
        rules: {
            Name:
            {
                required: !0,
            minlength: 2,
            maxlength: 30,
            alphabetsOnly: !0,
            
            customValidation:!0
              
            },
            Email: {
                required: !0,
            minlength: 6,
            maxlength: 30,
            customValidation:!0,
            email:!0
            
            
            },
            MobileNo: {
               /* required: true,
                   required: true
                */
            

            },
            
            
            Location: {
                required: true,
                minlength: 2
                

                
            },
            Password: {
                required: !0,
            customValidation:!0,
            minlength:8,
            maxlength:16
            },
            Marital_status:{
                required:true
            },
            Gender:{
                required:true
            },
           
            agree: "required"
        },

         messages: {
            Name: 
            {
            required : "Enter a valid name",
            minlength:"Minimum 2 characters allowed.",
            maxlength: "Maximum 30 characters required.",
           alphabetsOnly :"Numbers not allowed."
            },
            Email:{ 
               required:"please enter a  valid email address",
              
               required: "starts with no special character",
               maxlength: "email should be  only 30 character"
                   },
            MobileNo: {
                /*required: "Please enter your phone number",
                required:"enter only numeric value.",
                minlength: "Please enter min 10 digits",
                maxlength: "Please enter 10 digit no."*/
            },
            Location: {
                required: "Please enter a location",
                minlength: "Minimum 2 characters are allowed"
                
               
            },
            Password: {
                required: "Please provide a password",
                maxlength: "Your password must be accept 16 characters."
            },
          Marital_status:{
            required:"please enter Marital_status"
          },
          Gender:{
            required:"please enter Gender"
          },
            agree: "Please accept our policy"
        },
        submitHandler: function(form) {
      form.submit();
    }
});

});
    
