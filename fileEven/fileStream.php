
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
/*         readfile("file/testfile.txt");
        $lines = file("file/testFile.txt");
        foreach ($lines as $lineNum => $line) {
            echo "Line $lineNum :".$line;
        }

        $str = file_get_contents("file/testFile.txt");
        echo $str;
        echo "<br>";

        $handle = @fopen("file/testfile.txt","r");
        if($handle){
            while(!feof($handle)){
                $buffer = fgets($handle);
                echo $buffer;
            }
            fclose($handle);
        } */
/*         $handle = @fopen("file/testfile.txt","rb");
        echo filesize("file/testfile.txt")."<br>";
        if($handle){
            while($chr=fgetc($handle)){
                echo $chr;
            }
            echo "~~~~~~";
            fclose($handle);
        } */
/*         $arr = pathinfo("file/testfile.txt");
        print_r($arr);
        $arr = stat("file/testfile.txt");
        print_r($arr); */


            if($handle = fopen("http://localhost/yzd/fileeven/file/testfile.txt","rb")){

                echo "成功打开文件";
                while ($line = fgets($handle)) {
                    echo $line."<br>";
                }
                
                fclose($handle);
            }

    ?>
</body>
</html>