<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="css/cp.css" type="text/css">
<title></title>
<script>
function switchSysBar(){ 
var locate=location.href.replace('middel.php','');
var ssrc=document.all("img1").src.replace(locate,'');
if (ssrc=="images/open.gif")
{ 
document.all("img1").src="images/close.gif";
document.all("frmTitle").style.display="none" 
} 
else
{ 
document.all("img1").src="images/open.gif";
document.all("frmTitle").style.display="" 
} 
} 
</script>
</head>
<body style="overflow:hidden">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="164" id=frmTitle noWrap name="fmTitle" align="center" valign="top">
	<iframe name="I1" height="100%" width="164" src="left.php" border="0" frameborder="0" scrolling="no">
	浏览器不支持嵌入式框架，或被配置为不显示嵌入式框架。</iframe></td>
    <td width="4" valign="middle" background="images/mbg.gif" onclick=switchSysBar()><span class=navPoint 
id=switchPoint title=关闭/打开左栏><img src="images/open.gif" name="img1" width=4 height=47 id=img1></span></td>
    <td align="center" valign="top"><iframe name="I2" height="100%" width="100%" border="0" frameborder="0" src="right.php"> 浏览器不支持嵌入式框架，或被配置为不显示嵌入式框架。</iframe></td>
  </tr>
</table>
</body>
</html>
