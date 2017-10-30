<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>用户登录</title>
    <style>
    form label{
        display: inline-block;
        width:100px;
        text-align:right;
    }
    #submitButton{
        display:inline;
        padding-left:100px;
    }
    </style>
</head>
<body>
    <div style="text-align:center;">
    <img src="img//logo.jpg" alt="logo.jpg">
    <form action="user_check.php" method="post">
        <label for="name">用户名：</label><input type="text" name="username" id="name" autofocus><br>
        <label for="pwd">密码：</label><input type="password" name="password" id="pwd"><br>
        <div id="submitButton">
            <input type="submit" value="登录">
            <input type="reset" value="重置">
        </div>
        <a href="register.php">立即注册</a>
    </form>
    </div>
    
</body>
</html>