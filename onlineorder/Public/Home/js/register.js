$.validator.setDefaults({
submitHandler: function() {
    alert("提交成功!");
    document.getElementById('register_form').action = "/onlineorder/index.php/Home/Index/register_handle.html";  
    document.getElementById("register_form").submit();  
    }
});
$().ready(function() {
    // validate signup form on keyup and submit
    $("#register_form").validate({
        
        rules: {
            username: {
                required: true,
                minlength: 6
            },
            telephone:{
                required:true,
                rangelength: [11,11]
            },
            password: {
                required: true,
                rangelength: [6,20]
            },
            confirm_password: {
                required: true,
                rangelength: [6,20],
                equalTo: "#password"
            },
                agree: "required"
        },
        messages: {
            username: {
                required: "请输入用户名",
                minlength: "用户名必需由6位以上的字母组成"
            },
            telephone: {
                required:"请输入手机号码",
                rangelength: "请输入11位数字的手机号码"
            },
            password: {
                required: "请输入密码",
                rangelength: "密码是由6-20个字母、数字或下划线组成"
            },
            confirm_password: {
                required: "请输入密码",
                rangelength: "密码是由6-20个字母、数字或下划线组成",
                equalTo: "两次密码输入不一致"
          }
        }
    });
});