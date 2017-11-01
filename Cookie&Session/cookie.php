<?php
    if (!isset($_COOKIE["visittime"])) {
        setcookie("visittime",date("y-m-d H:i:s"),time()+60,"http://localhost/yzd/cookie/");
        echo "欢迎您第一次访问网站！"."<br>";
    }else{
        setcookie("visittime",date("y-m-d H:i:s"),time()+60,"http://localhost/yzd/cookie/");
        echo "您上次访问网站的时间为：".$_COOKIE["visittime"]."<br>";
        
    }
    echo "您本次访问网站的时间为：".date("y-m-d H:i:s");
    //header("Location:readcookie.php");
    
?>