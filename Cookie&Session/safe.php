<?php
    //$path = '/temp/';
    //session_save_path($path);
    session_start();
    echo $_SESSION["username"]."<br>".$_SESSION["pwd"];
    unset($_SESSION["username"]);
    unset($_SESSION["pwd"]);
    session_destroy();
    header("location:login.html");
?>