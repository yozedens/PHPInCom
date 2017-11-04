function selectAll() {
    //var checklist = document.getElementsByName("userID");
    var checklist = document.getElementsByClassName("userid");
    if (document.getElementById("selectAll").checked) {
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
    var checklist = document.getElementsByName("userID");
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