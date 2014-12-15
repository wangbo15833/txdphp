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
<Script language = "JavaScript1.2" src="js/admin_check.js"></Script>
</head>
<body leftMargin="0" topMargin="0" marginwidth="0">
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="40"><table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="84" height="24" align="center" background="images/tbgg.gif"><a href="admin.php" class="lmenu">管理员管理</a></td>
        <td width="23"><img src="images/jt.gif" width="23" height="24" /></td>
        <td width="10"><a href="admin_add.php" class="lmenu"></a></td>
        <td width="84" align="center" background="images/tbgg.gif"><a href="admin_add.php" class="lmenu">添加管理员</a></td>
        <td width="23" align="center"><img src="images/jt.gif" width="23" height="24" /></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width='98%' border=0 align="center" cellpadding=0 cellspacing=1 bgcolor="#EBEBEB">
<form method="post" name="admin" action="admin_add_do.php" onSubmit="return admin_sub();">
  <tr bgcolor="#FFFFFF">
    <td height="40" align="right">管理员ID：</td>
    <td height="23" align="center"><table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="16%"><input name="AdminID" type="text" class="inp" id="AdminID" size="30" /></td>
        <td width="84%" align="left"><div id="DispAdminID"></div></td>
      </tr>
    </table></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="15%" height="40" align="right">登录密码：</td>
    <td width="85%" height="23" align="center"><table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="16%"><input name="PassWord" type="password" class="inp" id="PassWord" value="" size="30" /></td>
        <td width="84%" align="left"><div id="DispPassWord"></div></td>
        </tr>
      </table></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="40" align="right">确认密码：</td>
    <td height="23" align="center"><table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="16%"><input name=PassWordOK type=password class="inp" id="PassWordOK" size="30"></td>
        <td width="84%" align="left"><div id="DispPassWordOK"></div></td>
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
