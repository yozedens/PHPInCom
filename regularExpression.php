<HTML>

<BODY>
     
    <form action="regularExpression.php" method="post">
        <input type="hidden" name="action" value="submit">
        <input type="text" name="string" autofocus>
        <input type="submit" value="检查匹配">
    </form>  

    <?php
        if (isset($_POST["action"])&&$_POST["action"]=="submit") {//检查是否已提交
            $str = $_POST["string"];
            $regForImg = '/^\d{1,2}$/';
            if (preg_match($regForImg,$str)) {
                echo "pwd=$str 符合条件。";
            }
            else {
                echo "pwd=$str 不符合条件。";
            }
        }
    ?> 
</BODY>

</HTML>
