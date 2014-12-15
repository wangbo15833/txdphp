
//验证
function GetUserID(){
	var UserID = document.getElementById('UserID').value;
	if (UserID==""){
		document.getElementById('DispUserID').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16"> 请输入用户ID!';
		return false;
	}else{
		document.getElementById('DispUserID').innerHTML='';
		return true;
	}
}

//验证是否为空
function GetPassWord(){
	var PassWord = document.getElementById('PassWord').value;
	if (PassWord==""){
		document.getElementById('DispPassWord').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16"> 登录密码不能为空!';
		return false;
	}else{
		if (PassWord.length < 6){
			document.getElementById('DispPassWord').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16"> 登录密码长度不能小于6位!';
			return false;
		}else{
			document.getElementById('DispPassWord').innerHTML='';
			return true;
		}
		
	}
}

function getPassWordOK(){
	var PassWordOK = document.getElementById('PassWordOK').value;
	if (PassWordOK==""){
		document.getElementById('DispPassWordOK').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16"> 请输入确认密码!';
		return false;
	}else{
		if(PassWordOK.length < 6){
			document.getElementById('DispPassWordOK').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16"> 登录密码长度不能小于6位!';
			return false;
		}else{
			if (document.getElementById('PassWord').value != document.getElementById('PassWordOK').value){
				document.getElementById('DispPassWordOK').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16"> 您输入的两次密码不相同!';
				return false;
			}else{
				document.getElementById('DispPassWordOK').innerHTML='';
				return true;
			}
		}
	}
}


function user_sub(){
if (GetUserID()==false){
    return false;
}
/*if (GetPassWord()==false){
    return false;
}
if (getPassWordOK()==false){
    return false;
}*/
return true;
}