<?php
if(!isset($_POST["name"])){
    echo json_encode(["text"=>"error! No post information"]);
    die;
}

$conn = new mysqli("localhost","root","","aliendatabase");
if(!$conn){
    echo json_encode(["text"=>"error! Database connect error"]);
    die;
}

$sql = "insert into guitarwars(name,score,img)values ('$_POST[name]','$_POST[score]','$_POST[imgname]');";

if($conn->query($sql)){
    echo json_encode(["text"=>"success"]);
}else{
    echo json_encode(["text"=>$sql."error! Database insert error"]);
}

$conn->close();