

function reqURLtoArea(url,areaid){
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

function selectAll() {
    var checklist = document.getElementsByName("userID[]");
    //var checklist = document.getElementsByClassName("selectAll");
    if (document.getElementById("SA").checked) {
        for (var i = 0; i < checklist.length; i++) {
            checklist[i].checked = true;
        }
    }
    else {
        for (var i = 0; i < checklist.length; i++) {
            checklist[i].checked = false;
        }
    }
}

function switchAll() {
    //static var switchFlag = false;
    var checklist = document.getElementsByName("userID[]");
    ///if (document.getElementById("switch").checked) {
        for (var i = 0; i < checklist.length; i++) {
            if(checklist[i].checked){
                checklist[i].checked=false;
            }else{
                checklist[i].checked = true;
            }
        }
    //}
}