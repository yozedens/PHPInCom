<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>show info</title>
    <script src="../jquery-3.2.1.min.js"></script>
    <script>
        $(function () {
            $("#load").on('click', function () {
                $.ajax({
                    type: 'POST',
                    url: 'loadInfo.php',
                    data: $('form').serialize(),
                    dataType: 'json',
                    success: function (msg) {
                        alert(msg);
                        $('#userSpan').attr("value",msg);
                    }
                    //, async: false
                });
            });
        });
    </script>
</head>
<body>
    <span id="userSpan" value=""></span><br>
    <button id="load">查询</button>
</body>
</html>