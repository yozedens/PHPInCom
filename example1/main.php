<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户管理页面</title>
</head>
<!--     <frameset rows="15%,60%,25%">
        <frame src="showCurrUserInfo.php" noresize="noresize">
        <frame src="showAllUserInfo.php" noresize="noresize">
        <frame src="managePage.php" noresize="noresize">
    </frameset> -->
<body>
    <?php
        if(isset($_REQUEST["logoff"])&&$_REQUEST["logoff"]){//点击了注销
            require_once("DBINFO.inc");
            
            $conn = new mysqli($DBHOST,$DBUSER,$DBPWD,$DBNAME);
            $sql = 'update users set is_online = 0 where name=\''.$_SESSION["curUserName"].'\';';
            if($conn->query($sql)){
                //用户成功注销，跳转到登录界面
                echo '<meta http-equiv="Refresh" content="1;login.php">';
                session_destroy();
                die("注销成功，期待您的下次使用！");
            }
        }
        else if(isset($_REQUEST["close"])&&$_REQUEST["close"]){//点击了退出
            require_once("DBINFO.inc");
                    
            $conn = new mysqli($DBHOST,$DBUSER,$DBPWD,$DBNAME);
            $sql = 'update users set is_online = 0 where name=\''.$_SESSION["curUserName"].'\';';
            if($conn->query($sql)){
                //用户成功退出，关闭窗口
                session_destroy();
                //echo '<script language="javascript">window.close();</script>';
                die("退出成功，期待您的下次使用！");
            }
        }
            ?>
    <div id="main">
        <div id="showCurrUserFrame"><!--回头把frameborder都去掉-->
        <span>当前用户：
            <?php 
                if(isset($_SESSION["curUserName"]))
                    echo $_SESSION["curUserName"];
            ?>
        </span>
        <span>用户类别：
            <?php
                require_once("DBINFO.inc");

                $conn = new mysqli($DBHOST,$DBUSER,$DBPWD,$DBNAME);
                if ($conn) {
                    $sql = 'select category from users where name=\''.$_SESSION["curUserName"].'\';';
                    $result = $conn->query($sql);
                    if ($result) {
                        $row = $result->fetch_assoc();
                        switch ($row["category"]) {
                            case 0:
                                echo "超级管理员";
                                break;
                            case 1:
                                echo "管理员";
                                break;
                            case 10:
                                echo "重要用户";
                                break;
                            case 11:
                                echo "一般用户";
                                break;
                            case 12:
                                echo "标黑用户";
                                break;
                        }
                    }
                }
                $conn->close();
            ?>
        </span>
        <span>
            <form action="main.php" method="post">
                <input type="submit" name="logoff" value="注销">
                <input type="submit" name="close" value="退出">
            </form>
        </span>
        </div>
        <div>
            <a href="main.php">刷新</a>
            <a href="addUser.php">增加用户</a>
        </div>
        <div id="showAllUserFrame">
            <?php
                require_once("DBINFO.inc");
        
                $conn = new mysqli($DBHOST,$DBUSER,$DBPWD,$DBNAME);
                $userInfo = array();//数组存放所有用户信息
                if ($conn) {
                    $sql = 'select * from users;';
                    $result = $conn->query($sql);
                    if($result&&$result->num_rows){
                        $index = 0;
                        while ($row = $result->fetch_assoc()) {
                            //全部存入数组    
                            $userInfo[$index] = $row;
                            $index++;
                        }
                    }
                }
            ?>
            <form action="main.php" method="post">
            <table border="1" class="">
                <thead><tr>
                    <th> <input type="radio" name="selectAll" id="">全选
                    </th><th >id
                    </th><th >name
                    </th><th >pwd
                    </th><th >sex
                    </th><th >idcard
                    </th><th >img
                    </th><th >email
                    </th><th >addr
                    </th><th >category
                    </th><th >is_online
                    </th>   
                </tr></thead>
                <?php
                    echo "......";
                ?>
                <tbody>
                
                <?php
                //以表格形式打印用户信息
                    foreach($userInfo as $user){//遍历数组，每个用户信息输出一行，用html元素输出
                        echo '<tr>';
                        //选择用户对应的复选框
                        echo '<td> <input type="checkbox" name="userID[]" value="'.$user["id"].'"><a href="updateUserInfo.php?userID='.$user["id"].'">编辑</a></td>';
                        foreach($user as $item){//遍历单个用户信息，每个字段作为表格的一个td输出，
                            echo '<td>';
                            echo $item;
                            echo '</td>';
                        }
                        echo '</tr>';
                    }       
            
                ?>
                
                </tbody>
            </table>
            对选中项：<!--<input type="submit" name="edit" value="编辑">-->
            <input type="submit" name="delete" value="删除">
            </form>
            <?php
                $conn->close();
            ?>
        </div>
        <div id="manage">
        <?php
            if(isset($_POST["userID"])&&$_POST["userID"]){//保证选择用户对应的复选框有值，即有行被选择
                //echo 'userID = ';print_r($_POST["userID"]);
/*                 if (isset($_REQUEST["edit"])&&$_REQUEST["edit"]) {
                    //做修改处理
                    echo "点击了编辑";
                    $_SESSION["updateUserID"] = $_POST["userID"];
                    echo '<meta http-equiv="Refresh" content="1;updateUserInfo.php">';
                } 
                else */if(isset($_REQUEST["delete"])&&$_REQUEST["delete"]){
                    //做删除处理
                    require_once("DBINFO.inc");

                    $conn = new mysqli($DBHOST,$DBUSER,$DBPWD,$DBNAME);
                    if($conn){
                        foreach($_POST["userID"] as $id){
                            $sql = 'delete from users where id = \''.$id.'\';';
                            $result = $conn->query($sql);
                        }
                    }
                    $conn->close();
                    echo "删除成功";
                    echo '<meta http-equiv="Refresh" content="1;main.php">';
                }
            }
        ?>
        </div>
    </div>

 <!--   用户管理页面。
    //显示目前用户
    //查看所有用户列表的功能按钮
    //行选择按钮
    //针对已选行的删改
    //增加用户的功能按钮
    -->
</body>
</html>