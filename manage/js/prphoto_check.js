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

function Getupimages(){
	var upimages = document.getElementById('upimages').value;
	if (upimages==""){
		document.getElementById('Dispupimages').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16"> 请选择小图片!';
		return false;
	}else{
		document.getElementById('Dispupimages').innerHTML='';
		return true;
	}
}
function Getupimageb(){
	var upimageb = document.getElementById('upimageb').value;
	if (upimageb==""){
		document.getElementById('Dispupimageb').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16"> 请选择大图片!';
		return false;
	}else{
		document.getElementById('Dispupimageb').innerHTML='';
		return true;
	}
}


function prphoto_sub(){
if (Getupimages()==false){
    return false;
}
if (Getupimageb()==false){
    return false;
}
return true;
}
