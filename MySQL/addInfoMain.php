<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Your High Score</title>
    <style>
        form label {
            width: 100px;
            display: inline-block;
        }
    </style>
</head>

<body>
    <h2>Guitar Wars - Add Your High Score</h2>
    <form action="addInfoMain.php" method="post" enctype='multipart/form-data'>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php if(isset($_POST["name"])) echo $_POST["name"];?>">
        <br>
        <label for="score">Score:</label>
        <input type="text" name="score" id="score" value="<?php if(isset($_POST["score"])) echo $_POST["score"];?>">
        <br>
        <label for="img">Img:</label>
        <?php if(isset($_FILES["img"])){?>

        <img width="100px" height="78px" src="<?php echo "upfile/".$_FILES["img"]["name"];?>" alt="图片加载失败">
        <input type="hidden" name="imgname" value="<?php echo $_FILES["img"]["name"];?>">
        <br>
        <br><input type="submit" name="submit" id="submit" value="Add">
        
        <?php }else{ ?>
        
        <input type="file" name="img" id="img">
        <br>
        <br><input type="submit" name="upload" id="upload" value="upload">
        

        <?php } ?> 
        
    </form>
    <?php
    //print_r($_FILES);
    if(isset($_POST["upload"])){
        if(!is_dir("./upfile")){
            mkdir("./upfile");
        }
        $path = "upfile/".$_FILES["img"]["name"];

        @move_uploaded_file($_FILES["img"]["tmp_name"],$path);
    }

    ?>
    <script src="../jquery-3.2.1.min.js"></script>
    <script>
        $(function () {
            $("#submit").on('click', function () {
                $.ajax({
                    type: 'POST',
                    url: 'addInfo.php',
                    data: $('form').serialize(),
                    dataType: 'json',
                    success: function (msg) {
                        alert(msg.text);
                    }
                    , async: false
                });
            });
        });
    </script>
</body>

</html>