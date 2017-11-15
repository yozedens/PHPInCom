<?php
if(!isset($_POST["firstname"]))
    die("无数据传入");
$conn = new mysqli("localhost","root","","aliendatabase") or die("数据库连接错误！");

$sql = 'insert into aliens_abduction values
        ("'.$_POST["firstname"].'","'.$_POST["lastname"].'","'.$_POST["whenithappened"].'","'.$_POST["howlong"].'","'.$_POST["howmany"].'"
        ,"'.$_POST["aliensdescription"].'","'.$_POST["whattheydid"].'","'.$_POST["fangspotted"].'","'.$_POST["other"].'","'.$_POST["email"].'")';
//echo $sql;
$result = $conn->query($sql) or die("数据提交失败");

echo json_encode(["msg"=>"数据提交成功！"]);

$conn->close();

/* $conn = new mysqli("localhost","root","");
$result = $conn->query("create database abc") or die("数据库创建失败");
$conn->close(); */
//echo json_encode(["name"=>"yzd"]);