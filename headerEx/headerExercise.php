<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>main page</title>
</head>
<body>
    <span>输出信息</span>
    <form action="headerExercise.php" method="post">
        <input type="text" name="user" id=""><br>
        <input type="password" name="pwd" id=""><br>
        <input type="submit" name="submit" value="登录">
    </form>

    <?php
    
        if(isset($_POST["submit"])){
            echo "输出测试";//理论上会报错，但实测时没有发生？
            header('location: target.php');
        }
            
    ?>
</body>
</html>
