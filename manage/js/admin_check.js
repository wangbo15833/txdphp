 function CreateAjax()
 {
    var XMLHttp;
    try
    {
        XMLHttp = new ActiveXObject("Microsoft.XMLHTTP");   //IE的创建方式
    }
    catch(e)
    {
        try
        {
            XMLHttp = new XMLHttpRequest();     //FF等浏览器的创建方式
        }
        catch(e)
        {
            XMLHttp = false;        //创建失败，返回false
        }
    }
    return XMLHttp;     //返回XMLHttp实例
 }

//验证是否为空
function getAdminID(){
	var AdminID = document.getElementById('AdminID').value;
	if (AdminID==""){
		document.getElementById('DispAdminID').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16"> 请输入管理员用戶名!';
		return false;
	}else{
		document.getElementById('DispAdminID').innerHTML='';
		return true;
	}
}

//验证是否为空
function getPassWord(){
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