function button_onclick(){
	//这里写你要执行的语句
	//alert("这是调用函数");
	window.location.href='./login/register.html';
}
function forgetPsw()
{
	alert("请联系管理员找回密码!");
}

 
    var code ; //在全局定义验证码
    //产生验证码
    function createCode(){
        code = "";
        var codeLength = 4;//验证码的长度
        var checkCode = document.getElementById("code");
        var random = new Array(0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R', 'S','T','U','V','W','X','Y','Z');//随机数
        for(var i = 0; i < codeLength; i++) {//循环操作
            var index = Math.floor(Math.random()*36);//取得随机数的索引（0~35）
            code += random[index];//根据索引取得随机数加到code上
        }
        checkCode.value = code;//把code值赋给验证码

        //校验验证码
    document.getElementById("Yzm").addEventListener("change",validate);
    }
    
 
    function validate(){
        var inputCode = document.getElementById("Yzm").value.toUpperCase(); //取得输入的验证码并转化为大写
        if(inputCode.length <= 0) { //若输入的验证码长度为0
            alert("请输入验证码！"); //则弹出请输入验证码
            //$("#Yzm").focus();
            YZM = false;
            document.getElementById("yzmconent").value="null";
        }
        else if(inputCode != code ) { //若输入的验证码与产生的验证码不一致时
            alert("验证码输入错误！@_@"); //则弹出验证码输入错误
            createCode();//刷新验证码
            //$("#Yzm").val("");//清空文本框
            //$("#Yzm").focus();//重新聚焦验证码框
            YZM = false;
            document.getElementById("yzmconent").value="null";
        }
        else { //输入正确时
            //$("#Yzm").blur();//绑定验证码输入正确时要做的事
            YZM = true;
            document.getElementById("yzmconent").value=inputCode;
        }
    };
