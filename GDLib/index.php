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
        margin-left: 100px;
    }
    </style>
    <script language="javascript">
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
        function changeImg(){
            document.getElementById("checkImg").src = "create_checks.php";
            <?php print_r($_SESSION["check_checks"]);?>
        }
    </script>
</head>
<body>   
    <form action="check_checks.php" method="post">
        <label for="username">用户名：</label>
        <input type="text" name="username" id="username"><br>
        <label for="pwd">密码：</label>
        <input type="password" name="pwd" id="pwd"><br>
        <label for="checks">验证码：</label>
        <input style="width:80px" type="text" name="checks" id="checks">
        <img id="checkImg" src='create_checks.php' onclick="changeImg();"/>
        <br>
        <input type="submit" name="submit" id="submit" value="登录" onclick="return checkForm();">
    </form>
    
</body>
</html>