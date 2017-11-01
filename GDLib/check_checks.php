<?php
    session_start();
    if(isset($_POST["submit"])){
        if($_POST["checks"]==$_SESSION["check_checks"]){
            echo "验证码正确！";
            //跳转
        }else{
            echo "验证码错误！";
        }
    }
?>