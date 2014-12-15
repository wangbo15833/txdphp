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

//验证用户名是否为空
function GetAdminID(){
	var AdminID = document.getElementById('AdminID').value;
	if (AdminID==""){
		document.getElementById('dl_AdminID').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16"> 请输入用户名!';
		return false;
	}else{
		document.getElementById('dl_AdminID').innerHTML='';
		return true;
	}
}

//验证密码是否为空
function GetPassWord(){
	var PassWord = document.getElementById('PassWord').value;
	if (PassWord==""){
		document.getElementById('dl_PassWord').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16"> 请输入密码!';
		return false;
	}else{
		document.getElementById('dl_PassWord').innerHTML='';
		return true;
	}
}

//验证码是否为空
function GetRand(){
	var Rand = document.getElementById('Rand').value;
	if (Rand==""){
		document.getElementById('dl_Rand').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16"> 请输入验证码!';
		return false;
	}else{
		document.getElementById('dl_Rand').innerHTML='';
		return true;
	}
}

function chklogin(){
if (GetAdminID()==false){
    return false;
}
if (GetPassWord()==false){
	return false;
}
if (GetRand()==false){
	return false;
}
return true;
}