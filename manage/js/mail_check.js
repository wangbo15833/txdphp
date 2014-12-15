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

//验证
function GetSmtp(){
	var Smtp = document.getElementById('Smtp').value;
	if (Smtp==""){
		document.getElementById('DispSmtp').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16"> 请输入SMTP地址!';
		return false;
	}else{
		document.getElementById('DispSmtp').innerHTML='';
		return true;
	}
}

function GetFMail(){
	var FMail = document.getElementById('FMail').value;
	if (FMail==""){
		document.getElementById('DispFMail').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16"> 请输入发送邮箱地址!';
		return false;
	}else{
		document.getElementById('DispFMail').innerHTML='';
		return true;
	}
}

function GetFPassWord(){
	var FPassWord = document.getElementById('FPassWord').value;
	if (FPassWord==""){
		document.getElementById('DispFPassWord').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16"> 请输入发送邮箱密码!';
		return false;
	}else{
		document.getElementById('DispFPassWord').innerHTML='';
		return true;
	}
}

function GetFUser(){
	var FUser = document.getElementById('FUser').value;
	if (FUser==""){
		document.getElementById('DispFUser').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16"> 请输入发件人!';
		return false;
	}else{
		document.getElementById('DispFUser').innerHTML='';
		return true;
	}
}



function mail_sub(){
if (GetSmtp()==false){
    return false;
}

if (GetFMail()==false){
    return false;
}
if (GetFPassWord()==false){
    return false;
}
if (GetFUser()==false){
    return false;
}

return true;
}