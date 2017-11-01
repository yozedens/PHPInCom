<?php
    //$path = '/temp/';//相对系统根目录
    //session_save_path($path);//如果设置自定义路径，则session_destory()等操作之前都要制定好路径
    session_start();
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["pwd"] = $_POST["pwd"];
    if($_SESSION["username"]==""){
        echo '<script language="javascript">alert("请通过正确途径登录本系统！");history.back();</script>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>default</title>
    <style>
        a{
            color:black;
        }
    </style>
</head>
<body>
    <span>当前用户：<?php echo $_SESSION["username"];?></span>
    <?php
        if($_SESSION["username"]=="tsoft"&&$_SESSION["pwd"]=="111")
            echo "(管理员)";
        else
            echo "(普通用户)";
    ?>&nbsp;&nbsp;
    <a href="default.php">博客首页</a>&nbsp;|&nbsp;
    <a href="default.php">我的文章</a>&nbsp;|&nbsp;
    <a href="default.php">我的相册</a>&nbsp;|&nbsp;
    <a href="default.php">音乐在线</a>&nbsp;|&nbsp;
    <a href="default.php">修改密码</a>&nbsp;|&nbsp;
    <?php
        if($_SESSION["username"]=="tsoft"&&$_SESSION["pwd"]=="111"){//如果是管理员s
    ?>
    <a href="default.php">用户管理</a>&nbsp;|&nbsp;
    <?php
        }//一段PHP代码可以分两块写？
    ?>
    <a href="safe.php">注销用户</a>
</body>
</html>