<?php
    $str = 'This is an example!izd';
    echo '加密前的字符串为：'.$str;
    $crypttostr = crypt($str,'_S4..some');
    echo '<p>加密后的字符串为：'.$crypttostr;

    echo "<br>";
    $otherStr = "This is an example!izd";
    echo '加密前的字符串为：'.$otherStr;
    $crypttootherstr = crypt($otherStr,'_S4..some');
    echo '<p>加密后的字符串为：'.$crypttootherstr;

    if(crypt($otherStr,'_S4..some')==$crypttostr){
        echo "<p>验证成功！";
    }else{
        echo "<p>验证失败！";
    }
?>