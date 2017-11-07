function showImg() {
    var val = document.getElementById("imgSelect").value;
    document.getElementById("show").src = "img//" + val + ".jpg";
}

function showTip(name) {
    switch (name) {
        case "img":
            imgTipsArea.innerHTML = '<font color="red" size="1px">选择已有头像，之后在用户设置中可修改</font>'
            break;
        case "registername":
            registernameTipsArea.innerHTML = '<font color="red" size="1px">3-16位字母数字下划线组合，且不能以数字开头</font>';
            break;
        case "registerpwd":
            registerpwdTipsArea.innerHTML = '<font color="red" size="1px">6-16位字母数字半角特殊字符组合，且必须包含字母和数字！</font>';
            break;
        case "sex":
            sexTipsArea.innerHTML = '<font color="red" size="1px">选择性别，之后再用户设置中可修改.</font>';
            break;
        case "idcard":
            idcardTipsArea.innerHTML = '<font color="red" size="1px">18位数字或17位数字后跟X.</font>';
            break;
        case "email":
            emailTipsArea.innerHTML = '<font color="red" size="1px">填写电子邮箱地址，以example123@service.abc格式.</font>';
            break;
        case "addr":
            addrTipsArea.innerHTML = '<font color="red" size="1px">填写联系地址.</font>';
            break;
        case "category":
            categoryTipsArea.innerHTML = '<font color="red" size="1px">选择用户类别，管理员会审核并进行权限修改.</font>';
            break;
    }
}

function hiddenTip(name) {
    switch (name) {
        case "img":
            imgTipsArea.innerHTML = '';
            break;
        case "registername":
            registernameTipsArea.innerHTML = '';
            break;
        case "registerpwd":
            registerpwdTipsArea.innerHTML = '';
            break;
        case "sex":
            sexTipsArea.innerHTML = '';
            break;
        case "idcard":
            idcardTipsArea.innerHTML = '';
            break;
        case "email":
            emailTipsArea.innerHTML = '';
            break;
        case "addr":
            addrTipsArea.innerHTML = '';
            break;
        case "category":
            categoryTipsArea.innerHTML = '';
            break;
    }
}

function checkRegisterForm() {
    //判断各字段不为空时是否满足格式要求，正则表达式匹配
    var regForName = /^[a-zA-Z_][\w_]{2,15}$/;
    var regForpwd = /^(?![0-9]+$)(?![a-zA-Z]+$)\S{6,16}$/;
    var regForIDCard = /^(\d{18}|\d{17}X)$/;
    var regForEmail = /^[\w_\.]+@(\w+\.\w+)+$/;
    //检查用户名格式
    var objExp = new RegExp(regForName);
    if (!objExp.test(document.getElementById("registername").value)) {
        alert('用户名格式错误！3-16位字母数字下划线组合，且不能以数字开头');
        document.getElementById("registername").focus();
        return false;
    }
    //检查密码格式
    objExp = new RegExp(regForpwd);
    if (!objExp.test(document.getElementById("registerpwd").value)) {
        alert('密码格式错误！6-16位字母数字半角特殊字符组合，且必须包含字母和数字！');
        document.getElementById("registerpwd").focus();
        return false;
    }
    //如果身份证号不为空，检查其格式
    if(document.getElementById("idcard").value){
        objExp = new RegExp(regForIDCard);
        if (!objExp.test(document.getElementById("idcard").value)) {
            alert('身份证号格式错误！18位数字或17位数字后跟X！');
            document.getElementById("idcard").focus();
            return false;
        }
    }
    
    //如果email不为空，检查其格式
    if(document.getElementById("email").value){
        objExp = new RegExp(regForEmail);
        if (!objExp.test(document.getElementById("email").value)) {
            alert('email格式错误！以example123@service.abc格式！');
            document.getElementById("email").focus();
            return false;
        }
    }
}



function checkRegUsername(username) {
    var name = username;
    var reg = /^[_a-zA-Z]\w{5,15}$/;
    var objExp = new RegExp(reg);
    if (objExp.test(name)) {
        return true;
    } else {
        return false;
    }
}

function checkUsername() {
    //document.write("调用了函数！");
    if (loginForm.username.value == "") {
        alert("用户名称不能为空！");
        form1.username.focus();
        return false;
    } else if (!checkRegUsername(form1.username.value)) {
        alert("用户名格式错误！\n用户名应该为6-16位字母数字下划线组合，且不能以数字开头！");
        form1.username.focus();
        return false;
    }

}