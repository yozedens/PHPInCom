<?php
    //print_r($_FILES);
    if(!is_dir("./upfile")){
        mkdir("./upfile");
    }
    //array_push($_FILES["picture"]["name"],"");
    $array = array_unique($_FILES["picture"]["name"]);
    //array_pop($array);
    for($i=0;$i<count($array);$i++){
        $path = "upfile/".$_FILES["picture"]["name"][$i];
        //echo $path;
        
        if(move_uploaded_file($_FILES["picture"]["tmp_name"][$i],$path)){
            $result = true;
        }else{
            $result = false;
        }
    }
    if($result){
        echo "文件上传成功，请稍等...";
        echo "<meta http-equiv=\"refresh\" content=\"3;url=fileUpload.php\">";
    }else{
        echo "文件上传失败，请稍等...";
        echo "<meta http-equiv=\"refresh\" content=\"3;url=fileUpload.php\">";
    }

?>