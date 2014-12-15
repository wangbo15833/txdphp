<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

require_once("session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="css/cp.css" type="text/css">
<Script language = "JavaScript1.2" src="js/uclass_check.js"></Script>
</head>
<body leftMargin="0" topMargin="0" marginwidth="0">
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="40"><table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="84" height="24" align="center" background="images/tbgg.gif"><a href="uclass.php" class="lmenu">会员分类</a></td>
        <td width="23"><img src="images/jt.gif" width="23" height="24" /></td>
        <td width="10"><a href="admin_add.php" class="lmenu"></a></td>
        <td width="84" align="center" background="images/tbgg.gif"><a href="uclass_add.php" class="lmenu">添加分类</a></td>
        <td width="23" align="center"><img src="images/jt.gif" width="23" height="24" /></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width='98%' border=0 align="center" cellpadding=0 cellspacing=1 bgcolor="#EBEBEB">
<form method="post" name="uclass" action="uclass_add_do.php" onSubmit="return uclass_sub();">
  <tr bgcolor="#FFFFFF">
    <td width="15%" height="40" align="right">分类名称：</td>
    <td width="85%" height="23" align="center"><table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="16%"><input name=ClassName type=TEXT class="inp" id="ClassName" size="30"></td>
        <td width="84%" align="left"><div id="DispClassName"></div></td>
        </tr>
      </table></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="40" align="right">确认提交：</td>
    <td height="23">　<input name="" type="submit" value="提 交" class="sunmits">　<input name="" type="reset" class="sunmits" value="重 填" /></td>
  </tr>
</form>
</table>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
