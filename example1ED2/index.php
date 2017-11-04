<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <style>
    form label{
        display: inline-block;
        width:70px;
    }
    #submit{
        margin-left: 75px;
    }
    #formGround{
        margin:100px auto;
        width:400px;
        height:200px;
        
    }
    #loginFrom{

    }
    </style>
    <script src="loginFormCheck.js"></script>
</head>
<body>   
    <div id="formGround">
    <div id="loginForm">
    <form name="loginForm" action="check_verfication_code_and_pwd.php" method="post">
        
        <label for="username">用户名：</label>
        <input type="text" name="username" id="username" placeholder="Enter username..." required="required" autofocus>
        <br>
        <label for="pwd">密码：</label>
        <input type="password" name="pwd" id="pwd" placeholder="Enter password..." required="required">
        <br>
        <label for="checks">验证码：</label>
        <input style="width:80px" type="text" name="checks" id="checks" required="required">
        <img id="checkImg" src='create_checks.php' onclick="changeImg();"/>
        <br>
        <input type="submit" name="submit" id="submit" value="登录"><!-- onclick="return checkForm();"  JS表单检查是否为空直接用required="required"属性代替-->
        <input type="reset" name="reset" value="重置">
        <a href="register.php">立即注册</a>
    </form>
    </div>
    </div>
    
    
</body>
</html>