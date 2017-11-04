
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改用户信息</title>
    <style>
    form label{
        display: inline-block;
        width: 100px;
        text-align:left;
    }
    </style>
    <script type="text/javascript">
    function showImg()
    {
        var val = document.getElementById("imgSelect").value;
        document.getElementById("show").src = "img//" + val + ".jpg";
    }
    </script>
</head>
<body>
    <h3>修改用户信息</h3>
    <?php
        $row=array();
        if(isset($_GET["userID"])){
 /*            echo "需要修改："."<br>";
            foreach($_SESSION["updateUserID"] as $id){
                echo $id."<br>";
            } */

            $userID = $_GET["userID"];
            echo "需要修改：".$userID;
            require_once("DBINFO.inc");
            $conn = new mysqli($DBHOST,$DBUSER,$DBPWD,$DBNAME);
            //需要添加错误处理
            $sql = 'select * from users where id=\''.$userID.'\';';
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        }
        if (isset($_POST["action"])&&$_POST["action"]=="submit") {//点击了提交
            if(isset($_REQUEST["doUpdate"])&&$_REQUEST["doUpdate"]){//点击了执行修改
                //判断各字段是否满足条件
                //.....正则表达式匹配

                echo "提交成功！";
                $row["id"] = $_POST["updateUserID"];

                $regForName = '/^[a-zA-Z_][\w_]{2,15}$/';
                $regForpwd = '/^(?![0-9]+$)(?![a-zA-Z]+$)\S{6,16}$/';
                $regForSex = '/^(m|f){1}$/';
                $regForIDCard = '/^(\d{18}|\d{17}X)$/';
                //$regForImg = '/^[\d\/]+$/';
                $regForEmail = '/^[\w_\.]+@(\w+\.\w+)+$/';
                //$regForCategory = '/^\d{1,2}$/';


                //检查密码格式
                if (!preg_match($regForpwd,$_POST["registerpwd"])) {
                    echo '<meta http-equiv="Refresh" content="2;updateUserInfo.php?userID='.$row["id"].'">';
                    die("密码格式错误，重新填写！");
                }
                //检查性别格式
                if (!preg_match($regForSex,$_POST["sex"])) {
                    echo '<meta http-equiv="Refresh" content="2;updateUserInfo.php?userID='.$row["id"].'">';
                    die("性别格式错误，重新填写！");
                }
                //检查身份证号格式
                if (!preg_match($regForIDCard,$_POST["idcard"])) {
                    echo '<meta http-equiv="Refresh" content="2;updateUserInfo.php?userID='.$row["id"].'">';
                    die("身份证号格式错误，重新填写！");
                }
                //检查邮箱格式
                if (!preg_match($regForEmail,$_POST["email"])) {
                    echo '<meta http-equiv="Refresh" content="2;updateUserInfo.php?userID='.$row["id"].'">';
                    die("邮箱格式错误，重新填写！");
                }
            
                //若无上述错误，插入数据到数据库
                require_once("DBINFO.inc");
                $conn = new mysqli($DBHOST,$DBUSER,$DBPWD,$DBNAME);
                $sql = 'update users set pwd=\''.$_POST["registerpwd"].'\', sex=\''.$_POST["sex"].'\', idcard=\''.$_POST["idcard"].'\', img= \''.$_POST["img"].'\',email= \''.$_POST["email"].'\',addr= \''.$_POST["addr"].'\',category= \''.$_POST["category"].'\'where id=\''.$row["id"].'\';';
                //echo $sql;
                //$sql = 'insert into users (pwd, sex, idcard, img, email, addr, category) values (\''.$_POST["registerpwd"].'\',\''.$_POST["sex"].'\',\''.$_POST["idcard"].'\',\''.$_POST["img"].'\',\''.$_POST["email"].'\',\''.$_POST["addr"].'\',\''.$_POST["category"].'\');';
                $result = $conn->query($sql);
                //返回登录界面
                if($result){
                    $conn->close();//关闭连接
                    echo '<meta http-equiv="Refresh" content="2;main.php">';
                    die("修改成功，正返回管理页面！");
                }
                else{
                    echo "修改执行失败";
                }
            }
            else if(isset($_REQUEST["cancel"])&&$_REQUEST["cancel"]){//点击了取消修改
                echo '<meta http-equiv="Refresh" content="1;main.php">';
                die("已经取消修改");
            }
        }
    ?>
            <!--用表单显示需要修改的数据-->
    <form action="updateUserInfo.php" method="post">
    <div >
        <div style="width:300px;text-align:left;float:left">
        <font color="red">提示信息：.......</font><br>
        <!--应该添加各种提示信息，如提示各条目要求格式，等-->
        
            <input type="hidden" name="action" value="submit"><!--用隐藏提交信息判断是否已经提交-->
            <input type="hidden" name="updateUserID" value="<?php echo $row["id"];?>"><!--传递用户id用于重新修改-->
            <label for="imgSelect">头像：</label>
            <select name="img" id="imgSelect" onchange="showImg()">
                <option value="000" <?php if($row["img"]=="000") echo "selected"; ?>>000</option>
                <option value="001" <?php if($row["img"]=="001") echo "selected"; ?>>001</option>
                <option value="002" <?php if($row["img"]=="002") echo "selected"; ?>>002</option>
                <option value="003" <?php if($row["img"]=="003") echo "selected"; ?>>003</option>
                <option value="004" <?php if($row["img"]=="004") echo "selected"; ?>>004</option>
                <option value="005" <?php if($row["img"]=="005") echo "selected"; ?>>005</option>
                <option value="006" <?php if($row["img"]=="006") echo "selected"; ?>>006</option>
                <option value="007" <?php if($row["img"]=="007") echo "selected"; ?>>007</option>
                <option value="008" <?php if($row["img"]=="008") echo "selected"; ?>>008</option>
                <option value="009" <?php if($row["img"]=="009") echo "selected"; ?>>009</option>
                <option value="010" <?php if($row["img"]=="010") echo "selected"; ?>>010</option>
                <option value="011" <?php if($row["img"]=="011") echo "selected"; ?>>011</option>
                <option value="012" <?php if($row["img"]=="012") echo "selected"; ?>>012</option>
                <option value="013" <?php if($row["img"]=="013") echo "selected"; ?>>013</option>
                <option value="014" <?php if($userID=="014") echo "selected"; ?>>014</option>
            </select><br>
            <label for="pwd">用户密码：</label>
            <input type="password" name="registerpwd" id="pwd" value="<?php echo $row["pwd"];?>"><br>
            <label for="">用户性别：</label>
            男<input type="radio" name="sex" value="m" <?php if($row["sex"]=="m") echo "checked"; ?>>
            女<input type="radio" name="sex" value="f" <?php if($row["sex"]=="f") echo "checked"; ?>><br>
            <label for="idcard">身份证号：</label>
            <input type="text" name="idcard" id="idcard" value="<?php echo $row["idcard"];?>"><br>
            <label for="email">邮件地址：</label>
            <input type="text" name="email" id="email" value="<?php echo $row["email"];?>"><br>
            <label for="addr">联系地址：</label>
            <input type="text" name="addr" id="addr" value="<?php echo $row["addr"];?>"><br>
            <label for="category">用户类别：</label>
            <!--<input type="text" name="category" id="category"><br>-->
            <select name="category">
                <option value="0" <?php if($row["category"]=="0") echo "selected"; ?>>超级管理员</option>
                <option value="1" <?php if($row["category"]=="1") echo "selected"; ?>>管理员</option>
                <option value="10" <?php if($row["category"]=="10") echo "selected"; ?>>重要用户</option>
                <option value="11" <?php if($row["category"]=="11") echo "selected"; ?>>一般用户</option>
                <option value="12" <?php if($row["category"]=="12") echo "selected"; ?>>标黑用户</option>
            </select><br>
            <br>
            <input type="submit" name="doUpdate" value="执行修改">
            <input type="submit" name="cancel" value="取消修改">
            
        </div>
        <div style="float:left">
            <center>头像预览</center>
            <img id="show" src="img//<?php echo $row["img"];?>.jpg" alt="头像" style="width:100px;height:130px;border-style:solid;border-width:5px">
        </div>
    </div>
    </form>
            
        
    <?php
        $conn->close(); 
    ?>
</body>
</html>