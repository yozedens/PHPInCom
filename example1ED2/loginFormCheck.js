//检查表单各项是否为空，可在表单中直接用required="required"代替
function checkForm() {
    if(document.getElementById("username").value==""){
        alert("请输入用户名");
        document.getElementById("username").focus();//获得焦点
        return false;//返回false终止跳转
    }else if(document.getElementById("pwd").value==""){
        alert("请输入密码");
        document.getElementById("pwd").focus();
        return false;
    }else if(document.getElementById("checks").value==""){
        alert("请输入验证码");
        document.getElementById("checks").focus();
        return false;
    }
}
//更改验证码图片
function changeImg(){
    document.getElementById("checkImg").src = "create_checks.php";
}

        
