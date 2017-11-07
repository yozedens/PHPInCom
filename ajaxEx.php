<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ajax test</title>
    <script language="javascript">
        function loadUser(url,areaid){
            var xmlhttp;
            if(window.XMLHttpRequest){
                xmlhttp = new XMLHttpRequest();
            }else{
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function()
            {
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
                {
                    document.getElementById(areaid).innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open('GET',url,true);
            xmlhttp.send();
        }

        function blabla(){
            document.getElementById("userSpan").innerHTML = "what is the fuck!";
        }
    </script>
</head>
<body>
    <span id="userSpan"></span><br>
    <button onclick="loadUser('loadUser.php','userSpan');">查询</button>
</body>
</html>