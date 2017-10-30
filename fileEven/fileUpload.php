<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文件上传</title>
    <script language="javascript">
        function func(){
            document.write("点击了按钮！");
        }
    </script>
</head>
<body>
    <form action="fileUpload_ok.php" method="post" enctype="multipart/form-data">
        <label for="file1">文件1：</label>
        <input type="file" name="picture[]" id="file1"><br>
        <label for="file2">文件2：</label>
        <input type="file" name="picture[]" id="file2"><br>
        <input type="submit" name="submit" value="上传">
    </form>
</body>
</html>