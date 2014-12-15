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
function GetTit(){
	var Tit = document.getElementById('Tit').value;
	if (Tit==""){
		document.getElementById('DispTit').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16"> 请输入文档标题!';
		return false;
	}else{
		document.getElementById('DispTit').innerHTML='';
		return true;
	}
}

function doc_sub(){
if (GetTit()==false){
    return false;
}
return true;
}