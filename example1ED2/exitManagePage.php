<?php
session_start();
$conn1 = new mysqli('localhost','root','','yzd');
if(!$conn1)
{
    die('Could not connet:'.$conn1->error);
}

//$username = $_GET["username"];
$sql = 'update users set is_online = 0 where name=\''.$_SESSION["curUserName"].'\';';
if($conn1->query($sql)){
    //用户成功注销，跳转到登录界面
    $conn1->close();
    session_destroy();
    header('Refresh:2;url=index.php');
    die("注销成功，期待您的下次使用！");
}


?>