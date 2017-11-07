<?php session_start();
    require_once("DBINFO.inc");
    
    $conn = new mysqli($DBHOST,$DBUSER,$DBPWD,$DBNAME);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Users</title>
    <script src="mainpageManage.js"></script>
</head>
<body>
<div id="mainDiv">
    <div id="showCurrUserDiv">
        <span>
            <?php 
                if(isset($_SESSION["curUserName"])){
                    echo "当前用户：&nbsp;&nbsp;".$_SESSION["curUserName"];
                }else{
                    echo "无效登录！";
                }
            ?>
        </span>
        <span id="userCategoryArea">(
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
        <a href="exitManagePage.php">退出</a>
        </span>
        </div>
        <div>
            <button onclick="reqURLtoArea('loadUser.php','tableUserInfo');">刷新</button>
            <a href="addUser.php">增加用户</a>
            
        </div><br>
        <div id="showAllUserFrame">
            <form action="main.php" method="post">
            <span id='tableUserInfo'><?php include_once('loadUser.php');?></span>
            <br><input type="submit" name="delete" value="删除选中项">
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
                else */
                if(isset($_REQUEST["delete"])&&$_REQUEST["delete"]){
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
            if($conn)
                $conn->close();
        ?>
        </div>
    </div>
</body>
</html>
