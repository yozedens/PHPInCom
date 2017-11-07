<?php

$conn1 = new mysqli('localhost','root','','yzd');
if(!$conn1)
{
    die('Could not connet:'.$conn1->error);
}

$sql = 'select * from users';
$result = $conn1->query($sql);
echo '<table border="1" class="">
<thead><tr>
    <th> <input type="checkbox" name="selectAll" id="SA" onclick="selectAll();">全选<input type="checkbox" name="switchAll" id="">反选
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
</tr></thead>';

while($row = $result->fetch_assoc()){
    echo '<tr>';
    //选择用户对应的复选框
    echo '<td> <input type="checkbox" name="userID[]" value="'.$row["id"].'"><a href="updateUserInfo.php?userID='.$row["id"].'">编辑</a></td>';
    foreach($row as $item){//遍历单个用户信息，每个字段作为表格的一个td输出，
        echo '<td>';
        echo $item;
        echo '</td>';
    }
    echo '</tr>';
}
echo "</tbody></table>";
$conn1->close();
?>