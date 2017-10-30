<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset=UTF-8>
    <title>添加用户</title>
    <h3>添加用户</h3>
    <link rel="stylesheet" href="register.css">

    <script type="text/javascript">
    function showImg()
    {
        var val = document.getElementById("imgSelect").value;
        document.getElementById("show").src = "img//" + val + ".jpg";
    }
    </script>
</head>
<body>
    <?php
        if(isset($_POST["action"])&&$_POST["action"]=="submit"){
            //判断各字段是否满足条件
            //.....正则表达式匹配
            $regForName = '/^[a-zA-Z_][\w_]{2,15}$/';
            $regForpwd = '/^(?![0-9]+$)(?![a-zA-Z]+$)\S{6,16}$/';
            $regForSex = '/^(m|f){1}$/';
            $regForIDCard = '/^(\d{18}|\d{17}X)$/';
            //$regForImg = '/^[\d\/]+$/';
            $regForEmail = '/^[\w_\.]+@(\w+\.\w+)+$/';
            //$regForCategory = '/^\d{1,2}$/';

            //检查用户名格式
            if (!preg_match($regForName,$_POST["registername"])) {
                echo '<meta http-equiv="Refresh" content="2;addUser.php">';
                die("用户名格式错误，重新注册！");
            }
            //检查密码格式
            if (!preg_match($regForpwd,$_POST["registerpwd"])) {
                echo '<meta http-equiv="Refresh" content="2;addUser.php">';
                die("密码格式错误，重新注册！");
            }
            //检查性别格式
            if (!preg_match($regForSex,$_POST["sex"])) {
                echo '<meta http-equiv="Refresh" content="2;addUser.php">';
                die("性别格式错误，重新注册！");
            }
            //检查身份证号格式
            if (!preg_match($regForIDCard,$_POST["idcard"])) {
                echo '<meta http-equiv="Refresh" content="2;addUser.php">';
                die("身份证号格式错误，重新注册！");
            }
            //检查邮箱格式
            if (!preg_match($regForEmail,$_POST["email"])) {
                echo '<meta http-equiv="Refresh" content="2;addUser.php">';
                die("邮箱格式错误，重新注册！");
            }
            //全部检查无误后进行数据库操作
            require_once("DBINFO.inc");//加载数据库信息

            //连接数据库
            $conn = new mysqli($DBHOST,$DBUSER,$DBPWD,$DBNAME);
            /* if($conn){

            }
            else{

            } */
            //查看数据库内用户名是否存在
            $sql = 'select name,pwd from users where name=\''.$_POST["registername"].'\';';
            $result = $conn->query($sql);
            if($result){
                $row = $result->fetch_assoc();
                if ($row["name"]==$_POST["registername"]) {
                    echo '<meta http-equiv="Refresh" content="2;addUser.php">';
                    die("用户名已存在，重新注册！");
                }
            }
            //若无上述错误，插入数据到数据库
            $sql = 'insert into users (name, pwd, sex, idcard, img, email, addr, category) values (\''.$_POST["registername"].'\',\''.$_POST["registerpwd"].'\',\''.$_POST["sex"].'\',\''.$_POST["idcard"].'\',\''.$_POST["img"].'\',\''.$_POST["email"].'\',\''.$_POST["addr"].'\',\''.$_POST["category"].'\');';
            $result = $conn->query($sql);
            //返回登录界面
            if($result){
                $conn->close();//关闭连接
                echo "注册成功，正返回管理页面！";
                echo '<meta http-equiv="Refresh" content="2;main.php">';
            }   
        }
        
    ?>

    <div >
        <div style="width:300px;text-align:left;float:left">
        <font color="red">提示信息：.......</font>
        <!--应该添加各种提示信息，如提示各条目要求格式，等-->
        <form action="addUser.php" method="post">
            <input type="hidden" name="action" value="submit"><!--用隐藏提交信息判断是否已经提交-->
            <label for="imgSelect">头像：</label>
            <select name="img" id="imgSelect" onchange="showImg()">
                <option value="000" selected>000</option>
                <option value="001">001</option>
                <option value="002">002</option>
                <option value="003">003</option>
                <option value="004">004</option>
                <option value="005">005</option>
                <option value="006">006</option>
                <option value="007">007</option>
                <option value="008">008</option>
                <option value="009">009</option>
                <option value="010">010</option>
                <option value="011">011</option>
                <option value="012">012</option>
                <option value="013">013</option>
                <option value="014">014</option>
            </select><br>
            <label for="name">用户名:</label>
            <input type="text" name="registername" id="name"><br>
            <label for="pwd">用户密码：</label>
            <input type="password" name="registerpwd" id="pwd"><br>
            <label for="">用户性别：</label>
            男<input type="radio" name="sex" value="m" checked>女<input type="radio" name="sex" value="f"><br>
            <label for="idcard">身份证号：</label>
            <input type="text" name="idcard" id="idcard"><br>
            <label for="email">邮件地址：</label>
            <input type="text" name="email" id="email"><br>
            <label for="addr">联系地址：</label>
            <input type="text" name="addr" id="addr"><br>
            <label for="category">用户类别：</label>
            <!--<input type="text" name="category" id="category"><br>-->
            <select name="category">
                <option value="0">超级管理员</option>
                <option value="1">管理员</option>
                <option value="10">重要用户</option>
                <option value="11">一般用户</option>
                <option value="12">标黑用户</option>
            </select>
            <input type="submit" value="注册">
        </form>
        </div>
        <div style="float:left">
            <center>头像预览</center>
            <img id="show" src="img//000.jpg" alt="头像" style="width:100px;height:130px;border-style:solid;border-width:5px">
        </div>
    </div>
    <?php

    ?>
</body>
</html>