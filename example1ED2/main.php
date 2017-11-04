<?php session_start();
    require_once("DBINFO.inc");
    
    $conn = new mysqli($DBHOST,$DBUSER,$DBPWD,$DBNAME);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="selectAllorNot.js"></script>
</head>
<body>
<div id="mainDiv">
    <div id="showCurrUserDiv">
        <span>当前用户：
            <?php 
                if(isset($_SESSION["curUserName"]))
                    echo $_SESSION["curUserName"];
            ?>
        </span>
        <span>(
            <?php
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
            ?>)
        </span>
        <span>
            <form action="main.php" method="post">
                <input type="submit" name="logoff" value="退出">
            </form>
            <?php
            //做退出处理
                if(isset($_REQUEST["logoff"])&&$_REQUEST["logoff"]){//点击了退出
                    $sql = 'update users set is_online = 0 where name=\''.$_SESSION["curUserName"].'\';';
                    if($conn->query($sql)){
                        //用户成功注销，跳转到登录界面
                        $conn->close();
                        session_destroy();
                        header('Refresh:2;url=index.php');
                        die("注销成功，期待您的下次使用！");
                    }
                }
            ?>
        </span>
        </div>
        <div>
            <a href="main.php">刷新</a>
            <a href="addUser.php">增加用户</a>
        </div>
        <div id="showAllUserFrame">
            <?php
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
                    <th> <input type="checkbox" name="selectAll" id="selectAll" onchange="selectAll();">全选
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
                        echo '<td> <input type="checkbox" class="userid" name="userID[]" value="'.$user["id"].'"><a href="updateUserInfo.php?userID='.$user["id"].'">编辑</a></td>';
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
                    //做删除处理s
                    if($conn){
                        foreach($_POST["userID"] as $id){
                            $sql = 'delete from users where id = \''.$id.'\';';
                            $result = $conn->query($sql);
                        }
                    }
                    $conn->close();
                    header('Location:main.php');
                    die;
                }
            }
            $conn->close();
        ?>
        </div>
    </div>
</body>
</html>
