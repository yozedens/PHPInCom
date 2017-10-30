
    <?php
        if(!$_POST["username"]||!$_POST["password"]){
            //跳转回relogin.php
            echo "用户名或密码为空，请重新登录!";
            echo '<meta http-equiv="Refresh" content="1;login.php">';
        }
        else{
        
        require_once("DBINFO.inc");
        
        $conn = new mysqli($DBHOST,$DBUSER,$DBPWD,$DBNAME);
/*         if($conn)
            echo "连接成功！"."<br>";
        else
            echo "连接失败！"."<br>";//错误处理 */
        $sql = 'select name,pwd from users where name=\''.$_POST["username"].'\';';
        //查询语句变量必须加引号，一般是单引号，例如select * from users where name = 'yzd';中的yzd必须加引号
        $result = $conn->query($sql);

        if($result){
            $row = $result->fetch_assoc();
            if($row&&$row["pwd"]==$_POST["password"]){
                $sql = 'update users set is_online = 1 where name=\''.$_POST["username"].'\';';
                if($conn->query($sql)){
                    //登录成功，跳转到main.php
                    //<form action="main.php" method="post"><input type="hidden" name="submitUser" value="$_POST[username]"></form>
                    session_start();//记得在退出页面销毁unset($_SESSION['views']);或session_destroy();
                    $_SESSION["curUserName"] = $_POST["username"];
                    echo '<meta http-equiv="Refresh" content="1;main.php">';
                }
                else{
                    //处理数据库操作错误
                }
                
            }   
            else{
                echo "密码错误，请重新登录！";
                echo '<meta http-equiv="Refresh" content="1;login.php">'; 
            }
                         
        }
        $conn->close();
            
        }
    ?>
