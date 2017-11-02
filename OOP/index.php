<?php
    function __autoload($className){
        $classPath = $className.'.class.php';
        if(file_exists($classPath)){
            include_once($classPath);
        }else{
            echo "类路径错误。";
        }
    }
    
    $myObj = new SportObject("blablablabla");
    echo $myObj;
?>