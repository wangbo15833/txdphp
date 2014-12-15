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
function GetCPwd(){
	var CPwd = document.getElementById('CPwd').value;
	if (CPwd==""){
		document.getElementById('DispCPwd').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16"> 请输入新品密码!';
		return false;
	}else{
		document.getElementById('DispCPwd').innerHTML='';
		return true;
	}
}
//验证
function GetSDate(){
	var SDate = document.getElementById('SDate').value;
	if (SDate==""){
		document.getElementById('DispSDate').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16"> 请输入开始日期!';
		return false;
	}else{
		document.getElementById('DispSDate').innerHTML='';
		return true;
	}
}
//验证
function GetEDate(){
	var EDate = document.getElementById('EDate').value;
	if (EDate==""){
		document.getElementById('DispEDate').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16"> 请输入结束日期!';
		return false;
	}else{
		document.getElementById('DispEDate').innerHTML='';
		return true;
	}
}

function newp_sub(){

if (GetCPwd()==false){
    return false;
}
if (GetSDate()==false){
    return false;
}
if (GetEDate()==false){
    return false;
}
return true;
}