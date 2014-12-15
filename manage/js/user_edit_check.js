//验证是否为空
function GetPassWord(){
	var PassWord = document.getElementById('PassWord').value;
	if (PassWord.length > 0 && PassWord.length < 6){
		document.getElementById('DispPassWord').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16"> 提示：为了您的安全，请您输入六位以上的密码!';
		return false;
	}else{
		document.getElementById('DispPassWord').innerHTML='';
		return true;
	}
}

function GetPassWordOK(){
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



function user_sub(){
/*if (GetPassWord()==false){
    return false;
}*/
/*if (GetPassWordOK()==false){
    return false;
}*/
return true;
}