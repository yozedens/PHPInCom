<?php
    ob_clean();
    //header("Content-Type:text/html; charset=utf-8");
    header('content-type:image/png');//设置内容类型
    
/*     $im = imagecreate(200,60);//创建一个画布
    $white = imagecolorallocate($im,255,66,159);//设置画布的背景颜色为粉色
    imagegif($im);//输出图像 */

    $im = @imagecreatefrompng("../example1/img/logo.jpg");//载入图片
    $textcolor = imagecolorallocate($im,56,73,136);//设置字体颜色，值为RGB颜色值
    $fnt = "c:/windows/fonts/simhei.ttf";//定义字体
    imagettftext($im,9,0,10,10,$textcolor, $fnt, "php图标");//写TTF文字到图中
    imagepng($im);//建立JPEG图形
    imagedestroy($im);//结束图形，释放资源  
?>