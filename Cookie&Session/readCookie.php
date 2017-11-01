<?php
    if (!isset($_COOKIE)) {
       // echo '读取$_COOKIE["visittime"]为：'.$_COOKIE["visittime"]."<br>";
       print_r($_COOKIE);
    }else{
        echo '无法读取$_COOKIE';
        
    }

?>