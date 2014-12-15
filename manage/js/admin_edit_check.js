

//验证是否为空
function getAdminID(){
	var AdminID = document.getElementById('AdminID').value;
	if (AdminID==""){
		document.getElementById('DispAdminID').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16"> 请输入管理员ID';
		return false;
	}else{
		document.getElementById('DispAdminID').innerHTML='';
		return true;
	}
}

//验证是否为空
function getPassWord(){
	var PassWord = document.getElementById('PassWord').value;
	if (PassWord == ""){
		document.getElementById('DispPassWord').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16"> 提示：请您输入新密码!';
		return false;
	}else{
		
		if (PassWord.length > 0 && PassWord.length < 6){
			document.getElementById('DispPassWord').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16"> 提示：为了您的安全，请您输入六位以上的密码!';
			return false;
		}else{
			document.getElementById('DispPassWord').innerHTML='';
			return true;
		}
		
	}
}

function getPassWordOK(){
	var PassWord = document.getElementById('PassWord').value;
	var PassWordOK = document.getElementById('PassWordOK').value;
	if (PassWord != "" && PassWordOK == ""){
		document.getElementById('DispPassWordOK').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16"> 提示：请您输入确认密码!';
		return false;
	}else{
		
		if (PassWord != PassWordOK){
			document.getElementById('DispPassWordOK').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16"> 提示：密码不统一!';
			return false;
						
		} else {
		document.getElementById('DispPassWordOK').innerHTML='';
		return true;
		}
	}
}

function admin_sub(){
if (getAdminID()==false){
    return false;
}
if (getPassWord()==false){
    return false;
}
if (getPassWordOK()==false){
    return false;
}
return true;
}