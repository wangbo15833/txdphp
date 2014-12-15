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
function GetPic(){
	var upimages = document.getElementById('upimages').value;
	if (upimages==""){
		document.getElementById('Dispupimages').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16"> 请选择图片!';
		return false;
	}else{
		document.getElementById('Dispupimages').innerHTML='';
		return true;
	}
}

function pic_sub(){
if (GetPic()==false){
    return false;
}

return true;
}