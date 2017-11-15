<?php
$conn = new mysqli("localhost","root","","aliendatabase") or die('Could not connet:'.$conn->error);

$sql = 'select * from guitarwars';
$result = $conn->query($sql);
echo '<table border="1" cellspacing="0" width="50%" align="center">
<thead><tr>
    <th >id
    </th><th >data
    </th><th >name
    </th><th >score
    </th><th >img
    </th>   
</tr></thead>';

while($row = $result->fetch_assoc()){
    echo '<tr>';
    //选择用户对应的复选框
    foreach($row as $key=>$item){//遍历单个用户信息，每个字段作为表格的一个td输出，
        echo '<td>';
        if($key=="img"){
            echo "<img width='100px' height='78px'  src='upfile/$item'>";
        }else{
            echo $item;
        }
        echo '</td>';
    }
    echo '</tr>';
}
echo "</tbody></table>";
$conn->close();
?>