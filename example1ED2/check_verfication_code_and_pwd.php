<?php
    session_start();
    if(!isset($_POST["submit"])){//检查是否通过submit访问本页
        echo "请通过正确途径访问本页！";
        die;
    }
    if($_POST["checks"] != $_SESSION["check_checks"]){//检查验证码是否输入正确
        echo "验证码错误，返回重新登录！";
        //跳转
        header('Refresh:2; url=index.php');
        die;
    }
    //查询数据库验证用户名是否存在、密码是否正确
    require_once("DBINFO.inc");
    $conn = new mysqli($DBHOST,$DBUSER,$DBPWD,$DBNAME);//连接数据库
    if(!$conn){//数据库连接失败
        echo "服务数据库连接失败，请重试或联系管理员。";
        header('Refresh:2; url=index.php');
        die;
    }
    $sql = 'select name,pwd,category from users where name=\''.$_POST["username"].'\';';
    $result = $conn->query($sql);//查询用户信息
    if($result){
        if($result->num_rows == 0){//没有查询到该用户名的相关数据
            echo "用户不存在，返回重新登录！";
            header('Refresh:2; url=index.php');
            die;
        }else{//查询到用户名
            $row = $result->fetch_assoc();//取得该用户名相关数据
            if($row["pwd"] != $_POST["pwd"]){//密码错误
                echo "密码错误，返回重新登录！";
                header('Refresh:2; url=index.php');
                die;
            }else{//密码正确
                $_SESSION["curUserName"] = $_POST["username"];//将当前用户简要信息存入session
                $_SESSION["category"] = $row["category"];
                $sql = 'update users set is_online = 1 where name=\''.$_POST["username"].'\';';
                $result = $conn->query($sql);//更改用户登录状态
                if(!$result){//更改用户登录状态失败
                    echo "服务数据库发生错误，请重试或联系管理员。";
                    header('Refresh:2; url=index.php');
                    die;
                }else{//更改用户登录状态成功
                    header("location:main.php");
                }

            }
        }
    }
    $conn->close();//关闭数据库连接
?>