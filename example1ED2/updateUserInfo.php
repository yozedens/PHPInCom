<?php
    session_start();
    require_once("DBINFO.inc");//加载数据库信息
    //连接数据库
    
    $conn = new mysqli($DBHOST,$DBUSER,$DBPWD,$DBNAME);
    $sql = 'select * from users where id=\''.$_GET["userID"].'\';';
    //需要添加数据库相关错误处理
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset=UTF-8>
    <title>修改用户信息</title>
    <h3 style="text-align:center">修改用户信息</h3>
    <style>
    form label{
        display: inline-block;
        width: 100px;
    }
    </style>
    <script src="registerCheck.js"></script>

</head>
<body>
    <?php
        //响应完onclick事件之后，开始进行数据库操作
        if(isset($_POST["modifySubmit"])){
            //全部检查无误后进行数据库操作
            
            if(!$conn){//数据库连接失败
                echo "服务数据库连接失败，请重试或联系管理员。";
                header('Refresh:2; url=register.php');
                die;
            }
            $sql = 'update users set pwd=\''.$_POST["registerpwd"].'\', sex=\''.$_POST["sex"].'\', idcard=\''.$_POST["idcard"].'\', img= \''.$_POST["img"].'\',email= \''.$_POST["email"].'\',addr= \''.$_POST["addr"].'\',category= \''.$_POST["category"].'\'where id=\''.$row["id"].'\';';
            //echo $sql;
            //$sql = 'insert into users (pwd, sex, idcard, img, email, addr, category) values (\''.$_POST["registerpwd"].'\',\''.$_POST["sex"].'\',\''.$_POST["idcard"].'\',\''.$_POST["img"].'\',\''.$_POST["email"].'\',\''.$_POST["addr"].'\',\''.$_POST["category"].'\');';
            $result = $conn->query($sql);
            //返回登录界面
            if($result){
                $conn->close();//关闭连接
                header("Refresh:2; url=main.php");
                die("修改成功，正返回管理页面！");
            }
            else{
                echo "修改执行失败";
            }
        }
        
    ?>
    <!--注册表单-->
    <div style="margin:0 auto;width:350px;height:500px;background-color:lightblue">
        <div >
        
        <form action="" method="post">
            <input type="hidden" name="action" value="submit"><!--用隐藏提交信息判断是否已经提交-->
            <label for="imgSelect">头像：</label>
            <select name="img" id="imgSelect" onchange="showImg()">
                <option value="000" <?php if($row["img"]=="000") echo "selected";?>>000</option>
                <option value="001" <?php if($row["img"]=="001") echo "selected";?>>001</option>
                <option value="002" <?php if($row["img"]=="002") echo "selected";?>>002</option>
                <option value="003" <?php if($row["img"]=="003") echo "selected";?>>003</option>
                <option value="004" <?php if($row["img"]=="004") echo "selected";?>>004</option>
                <option value="005" <?php if($row["img"]=="005") echo "selected";?>>005</option>
                <option value="006" <?php if($row["img"]=="006") echo "selected";?>>006</option>
                <option value="007" <?php if($row["img"]=="007") echo "selected";?>>007</option>
                <option value="008" <?php if($row["img"]=="008") echo "selected";?>>008</option>
                <option value="009" <?php if($row["img"]=="009") echo "selected";?>>009</option>
                <option value="010" <?php if($row["img"]=="010") echo "selected";?>>010</option>
                <option value="011" <?php if($row["img"]=="011") echo "selected";?>>011</option>
                <option value="012" <?php if($row["img"]=="012") echo "selected";?>>012</option>
                <option value="013" <?php if($row["img"]=="013") echo "selected";?>>013</option>
                <option value="014" <?php if($row["img"]=="014") echo "selected";?>>014</option>
            </select>
            <span><img id="show" src="img//<?php echo $row["img"];?>.jpg" alt="头像预览" style="width:100px;height:130px;border-style:solid;border-width:5px"></span>
            <img width="10px" height="10px" src="img/wenhao.jpg" alt="X" onMouseOver="showTip('img');" onMouseOut="hiddenTip('img');"><br>
            <span id="imgTipsArea"></span>
            <br>

            <label for="name">用户名:</label>
            <?php echo $row["name"];?>
            <br>
            <span id="registernameTipsArea"></span>
            <br>

            <label for="pwd">用户密码：<font color="red">*</font></label>
            <input type="text" name="registerpwd" id="registerpwd" value="<?php echo $row["pwd"];?>" required="required">
            <img width="10px" height="10px" src="img/wenhao.jpg" alt="X" onMouseOver="showTip('registerpwd');" onMouseOut="hiddenTip('registerpwd');"><br>
            <span id="registerpwdTipsArea"></span>
            <br>

            <label for="">用户性别：</label>
            男<input type="radio" name="sex" value="m" <?php if($row["sex"]=="m") echo "checked"; ?>>
            女<input type="radio" name="sex" value="f" <?php if($row["sex"]=="f") echo "checked"; ?>>
            <img width="10px" height="10px" src="img/wenhao.jpg" alt="X" onMouseOver="showTip('sex');" onMouseOut="hiddenTip('sex');"><br>
            <span id="sexTipsArea"></span>
            <br>

            <label for="idcard">身份证号：</label>
            <input type="text" name="idcard" id="idcard" value="<?php echo $row["idcard"];?>">
            <img width="10px" height="10px" src="img/wenhao.jpg" alt="X" onMouseOver="showTip('idcard');" onMouseOut="hiddenTip('idcard');"><br>
            <span id="idcardTipsArea"></span>
            <br>

            <label for="email">邮件地址：</label>
            <input type="text" name="email" id="email" value="<?php echo $row["email"];?>">
            <img width="10px" height="10px" src="img/wenhao.jpg" alt="X" onMouseOver="showTip('email');" onMouseOut="hiddenTip('email');"><br>
            <span id="emailTipsArea"></span>
            <br>

            <label for="addr">联系地址：</label>
            <input type="text" name="addr" id="addr" value="<?php echo $row["addr"];?>">
            <img width="10px" height="10px" src="img/wenhao.jpg" alt="X" onMouseOver="showTip('addr');" onMouseOut="hiddenTip('addr');"><br>
            <span id="addrTipsArea"></span>
            <br>

            <label for="category">用户类别：</label>
            <!--<input type="text" name="category" id="category"><br>-->
            <select name="category">
                <option value="0" <?php if($row["category"]=="0") echo "selected"; ?>>超级管理员</option>
                <option value="1" <?php if($row["category"]=="1") echo "selected"; ?>>管理员</option>
                <option value="10"<?php if($row["category"]=="10") echo "selected"; ?>>重要用户</option>
                <option value="11"<?php if($row["category"]=="11") echo "selected"; ?>>一般用户</option>
                <option value="12"<?php if($row["category"]=="12") echo "selected"; ?>>标黑用户</option>
            </select>
            <img width="10px" height="10px" src="img/wenhao.jpg" alt="X" onMouseOver="showTip('category');" onMouseOut="hiddenTip('category');"><br>
            <span id="categoryTipsArea"></span>
            <br>

            <input style="margin-left: 75px;" type="submit" name="modifySubmit" value="执行修改" onclick="return checkRegisterForm();">
            &nbsp;&nbsp;
            <a href="main.php">取消修改</a>
        </form>
        
        </div>
    </div>
</body>
</html>