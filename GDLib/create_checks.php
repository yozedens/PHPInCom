<?php
    session_start();
    header("content-type:image/png");
    $image_width=70;
    $image_height=18;
    srand(microtime()*100000);//生成随机数的种子

    
    for ($i=0; $i < 4; $i++) { //循环输出一个4位的随机数
        do{
            $asc = rand(48,122);
        }while(!isNumberOrLetter($asc));
        if(isset($new_number)){
            $new_number .= chr($asc);
        }else{
            $new_number = chr($asc);
        }
    }
    //echo $new_number;
    $_SESSION["check_checks"]=$new_number;//将获取的随机数验证码写入到Session变量中

    $num_image = imagecreate($image_width,$image_height);//创建一个画布
    imagecolorallocate($num_image,255,255,255);
    for ($i=0; $i < strlen($_SESSION["check_checks"]); $i++) { //循环读取Session变量中的验证码
        $font = mt_rand(3,5);//设置随机的字体
        $x = mt_rand(1,8)+$image_width*$i/4;//设置随机字体所在位置的X坐标
        $y = mt_rand(1,$image_height/4);//y坐标
        $color = imagecolorallocate($num_image,mt_rand(0,100),mt_rand(0,150),mt_rand(0,200));//随机颜色
        imagestring($num_image,$font,$x,$y,$_SESSION["check_checks"][$i],$color);//水平输出字符
    }
    
    imagepng($num_image);
    imagedestroy($num_image);
    
    function isNumberOrLetter($characterASCII){
        if(($characterASCII>=48&&$characterASCII<=57)||($characterASCII>=65&&$characterASCII<=90)||($characterASCII>=97&&$characterASCII<=122)){
            return true;
        }else{
            return false;
        }
    }

?>