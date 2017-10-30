    <?php
        //print_r($_POST);
        if(isset($_POST["submit"])){
            echo nl2br($_POST["textarea"]);
        }
        if(isset($_GET["text"])){
            echo $_GET["text"];
        }


    ?>