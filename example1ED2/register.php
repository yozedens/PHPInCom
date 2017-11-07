<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset=UTF-8>
    <title>用户注册</title>
    <h3 style="text-align:center">用户注册</h3>
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
        if(isset($_POST["registerSubmit"])){
            //全部检查无误后进行数据库操作
            require_once("DBINFO.inc");//加载数据库信息
            //连接数据库
            $conn = new mysqli($DBHOST,$DBUSER,$DBPWD,$DBNAME);
            if(!$conn){//数据库连接失败
                echo "服务数据库连接失败，请重试或联系管理员。";
                header('Refresh:2; url=register.php');
                die;
            }else{
                echo "数据库连接成功";
            }
            //查看数据库内用户名是否存在
            $sql = 'select name,pwd from users where name=\''.$_POST["registername"].'\';';
            $result = $conn->query($sql);
            if($result){
                if($result->num_rows){//查询到该用户名的相关数据
                    $row = $result->fetch_assoc();
                    if ($row["name"] == $_POST["registername"]) {//保险起见，再次对比用户名
                        header("Refresh:2;url=register.php");
                        die("用户名已存在，重新注册！");
                    }
                }
            }
            //若用户名可以使用，插入数据到数据库
            $sql = 'insert into users (name, pwd, sex, idcard, img, email, addr, category) values (\''.$_POST["registername"].'\',\''.$_POST["registerpwd"].'\',\''.$_POST["sex"].'\',\''.$_POST["idcard"].'\',\''.$_POST["img"].'\',\''.$_POST["email"].'\',\''.$_POST["addr"].'\',\''.$_POST["category"].'\');';
            echo "<br>".$sql."<br>";
            $result = $conn->query($sql);
            //返回登录界面
            if($result){
                $conn->close();//关闭连接
                header("Refresh:2;url=index.php");
                die("注册成功，正返回登录页面！");
            }else{
                $conn->close();//关闭连接
                header("Refresh:2;url=register.php");
                die("注册失败，可能是注册信息与已有信息冲突！请检查注册信息");
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
                <option value="000">000</option>
                <option value="001" selected>001</option>
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
            </select>
            <span><img id="show" src="img//001.jpg" alt="头像预览" style="width:100px;height:130px;border-style:solid;border-width:5px"></span>
            <img width="10px" height="10px" src="img/wenhao.jpg" alt="X" onMouseOver="showTip('img');" onMouseOut="hiddenTip('img');"><br>
            <span id="imgTipsArea"></span>
            <br>

            <label for="name">用户名:<font color="red">*</font></label>
            <input type="text" name="registername" id="registername" required="required">
            <img width="10px" height="10px" src="img/wenhao.jpg" alt="X" onMouseOver="showTip('registername');" onMouseOut="hiddenTip('registername');"><br>
            <span id="registernameTipsArea"></span>
            <br>

            <label for="pwd">用户密码：<font color="red">*</font></label>
            <input type="password" name="registerpwd" id="registerpwd" required="required">
            <img width="10px" height="10px" src="img/wenhao.jpg" alt="X" onMouseOver="showTip('registerpwd');" onMouseOut="hiddenTip('registerpwd');"><br>
            <span id="registerpwdTipsArea"></span>
            <br>

            <label for="">用户性别：</label>
            男<input type="radio" name="sex" value="m" checked>女<input type="radio" name="sex" value="f">
            <img width="10px" height="10px" src="img/wenhao.jpg" alt="X" onMouseOver="showTip('sex');" onMouseOut="hiddenTip('sex');"><br>
            <span id="sexTipsArea"></span>
            <br>

            <label for="idcard">身份证号：</label>
            <input type="text" name="idcard" id="idcard">
            <img width="10px" height="10px" src="img/wenhao.jpg" alt="X" onMouseOver="showTip('idcard');" onMouseOut="hiddenTip('idcard');"><br>
            <span id="idcardTipsArea"></span>
            <br>

            <label for="email">邮件地址：</label>
            <input type="text" name="email" id="email">
            <img width="10px" height="10px" src="img/wenhao.jpg" alt="X" onMouseOver="showTip('email');" onMouseOut="hiddenTip('email');"><br>
            <span id="emailTipsArea"></span>
            <br>

            <label for="addr">联系地址：</label>
            <input type="text" name="addr" id="addr">
            <img width="10px" height="10px" src="img/wenhao.jpg" alt="X" onMouseOver="showTip('addr');" onMouseOut="hiddenTip('addr');"><br>
            <span id="addrTipsArea"></span>
            <br>

            <label for="category">用户类别：</label>
            <!--<input type="text" name="category" id="category"><br>-->
            <select name="category">
                <option value="0">超级管理员</option>
                <option value="1">管理员</option>
                <option value="10">重要用户</option>
                <option value="11" selected>一般用户</option>
                <option value="12">标黑用户</option>
            </select>
            <img width="10px" height="10px" src="img/wenhao.jpg" alt="X" onMouseOver="showTip('category');" onMouseOut="hiddenTip('category');"><br>
            <span id="categoryTipsArea"></span>
            <br>

            <input style="margin-left: 75px;" type="submit" name="registerSubmit" value="注册" onclick="return checkRegisterForm();">
            <input type="reset" value="重置">&nbsp;&nbsp;<a href="index.php">取消注册</a>
        </form>
        
        </div>
    </div>
</body>
</html>