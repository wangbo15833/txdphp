<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

require_once("session.php");
$web_root_part = "../";
require_once($web_root_part."lib/db.php");
require_once($web_root_part."lib/function.php");

$ID = trim($_GET['id']);
$querySel = "select * from Log where ID=".$ID."";
if( !($result = $db->sql_query($querySel)) )
{
	message_die(DB_MESSAGE, 'Could not query Log');
		
} else {
	$row = $db->sql_fetchrow($result);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="css/cp.css" type="text/css">
<Script language = "JavaScript1.2" src="js/log_check.js"></Script>
</head>
<body leftMargin="0" topMargin="0" marginwidth="0">
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="40"><table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="84" height="24" align="center" background="images/tbgg.gif"><a href="log.php" class="lmenu">日志管理</a></td>
        <td width="23"><img src="images/jt.gif" width="23" height="24"></td>
        <td width="10">&nbsp;</td>
        <td width="83" align="center" background="images/tbgg.gif"><a href="log_show.php?id=<?php echo $_GET['id']?>&page=<?php echo $_GET['page']?>" class="lmenu">查看日志</a></td>
        <td width="10"><img src="images/jt.gif" width="23" height="24"></td>
        <td width="10"></td>
        <td width="84" align="center">&nbsp;</td>
        <td width="23" align="center">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
<table width='98%' border=0 align="center" cellpadding=0 cellspacing=1 bgcolor="#EBEBEB">
<form method="post" name="log" action="log_edit_do.php">
  <tr bgcolor="#FFFFFF">
    <td width="15%" height="40" align="right">行为：</td>
    <td width="85%" height="23" align="center"><table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="16%" align="left"><?php echo $row['Oper']?></td>
        </tr>
    </table></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="40" align="right">IP地址：</td>
    <td height="23" align="center"><table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="16%"><table width="98%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="16%" align="left"><?php echo $row['IP']?></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="40" align="right">操作语句：</td>
    <td height="23" align="center"><table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="16%" align="left"><?php echo $row['LSql']?></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="40" align="right">操作人：</td>
    <td height="23" align="center"><table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="16%" align="left"><?php echo $row['UserName']?></td>
        </tr>
    </table></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="40" align="right">操作时间：</td>
    <td height="23" align="center"><table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="16%" align="left"><?php echo $row['Addtime']?></td>
        </tr>
    </table></td>
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
