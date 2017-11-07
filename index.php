<?php
    session_start();
    if(isset($_SESSION["id"])){
        echo '$_SESSION["id"] = '.$_SESSION["id"];
    }else{
        echo 'no $_SESSION["id"]';
    }
    

?>

<html>
    <head>
    </head>
    <body>
        <?php
            //date_default_timezone_set('PRC');//当没有在php.ini中设置默认时区的话，此函数可以临时设置
/*             echo date('h:i:s d-m-y').'<br>';
            echo "mktime函数返回的时间戳:".mktime().'<br>';
            echo "当前时间：".date('h:i:s d-m-y',mktime()).'<br>';
            echo "time函数输出:".time().'<br>';
            echo "各种格式输出当前时间：".'<br>';
            echo "DATE_ATOM =".date(DATE_ATOM).'<br>';
            echo "DATE_COOKIE = ".date(DATE_COOKIE).'<br>';
            echo "DATE_ISO8601 = ".date(DATE_ISO8601).'<br>';
            echo "DATE_RFC822 = ".date(DATE_RFC822).'<br>';
            echo "DATE_RFC850 = ".date(DATE_RFC850).'<br>';
            echo "DATE_RSS = ".date(DATE_RSS).'<br>';
            echo "DATE_W3C = ".date(DATE_W3C).'<br>';
            $arr = getdate();
            print_r($arr);
            echo "<br>";
            echo strftime('%A')."<br>";
            function run_time(){
                list($msec,$sec) = explode(" ",microtime());
                return ((float)$msec+(float)$sec);
            }
            $start_time = run_time();
            $sum = 0;
            for ($i=0; $i < 1000000; $i++) { 
                $sum += $i;
            }echo $sum."<br>";
            $end_time = run_time();
            echo "测试代码运行时间为：".($end_time-$start_time); */
        ?>
    </body>
</html>