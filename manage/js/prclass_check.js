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
function GetClassName(){
	var ClassName = document.getElementById('ClassName').value;
	if (ClassName==""){
		document.getElementById('DispClassName').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16"> 请输入分类名称!';
		return false;
	}else{
		document.getElementById('DispClassName').innerHTML='';
		return true;
	}
}

//验证
function GetClassName_NL(){
	var ClassName_NL = document.getElementById('ClassName_NL').value;
	if (ClassName_NL==""){
		document.getElementById('DispClassName_NL').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16"> 请输入分类名称!';
		return false;
	}else{
		document.getElementById('DispClassName_NL').innerHTML='';
		return true;
	}
}


function pclass_sub(){
if (GetClassName()==false){
    return false;
}
if (GetClassName_NL()==false){
    return false;
}

return true;
}