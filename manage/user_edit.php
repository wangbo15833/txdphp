<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

require_once("session.php");
$web_root_part = "../";
require_once($web_root_part."lib/db.php");
require_once($web_root_part."lib/function.php");

$ID = trim($_GET['id']);
$Page = trim($_GET['page']);

$querySel = "select * from user where ID=".$ID."";
if( !($result = $db->sql_query($querySel)) )
{
	message_die(DB_MESSAGE, 'Could not query user');
		
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
<Script language = "JavaScript1.2" src="js/user_edit_check.js"></Script>
</head>
<body leftMargin="0" topMargin="0" marginwidth="0">
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="40"><table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="84" height="24" align="center" background="images/tbgg.gif"><a href="user.php" class="lmenu">用户管理</a></td>
        <td width="23"><img src="images/jt.gif" width="23" height="24"></td>
        <td width="10">&nbsp;</td>
        <td width="83" align="center" background="images/tbgg.gif"><a href="user_add.php" class="lmenu">添加用户</a></td>
        <td width="10"><img src="images/jt.gif" width="23" height="24"></td>
        <td width="10"></td>
        <td width="84" align="center" background="images/tbgg.gif"><a href="user_edit.php?id=<?php echo $_GET['id']?>&page=<?php echo $_GET['page']?>" class="lmenu">编辑用户</a></td>
        <td width="23" align="center"><img src="images/jt.gif" width="23" height="24"></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width='98%' border=0 align="center" cellpadding=0 cellspacing=1 bgcolor="#EBEBEB">
<form method="post" name="user" action="user_edit_do.php" enctype="multipart/form-data" onSubmit="return user_sub();">
  <tr bgcolor="#FFFFFF">
    <td width="15%" height="40" align="right">用户ID：</td>
    <td width="85%" height="23" align="center"><table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="16%"><input name="UserID" type="text" class="inp" id="UserID" value="<?php echo $row['UserID']?>" size="30" disabled/></td>
        <td width="84%" align="left"><div id="DispUserID"></div></td>
      </tr>
    </table></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="40" align="right">会员类别：</td>
    <td height="23" align="center"><table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="9%"><select name="UserClass" id="UserClass" class="sel">
          <?php
		  $querySel = "select * from uclass";
		  $result_sub = mysql_query($querySel) or die(mysql_error()); 
		  $i = 0; 
		  while($row_sub=mysql_fetch_array($result_sub)) 
			{
				$result_show[$i] = $row_sub;
				if ($row['UserClass'] == $result_show[$i]['ID']) $sel_c = "selected";			
				echo "<option ".$sel_c." value='". $result_show[$i]['ID'] ."'>". $result_show[$i]['ClassName'] ."</option>";
				$sel_c = "";
				$i++; 
 			}
			
		 ?>
          </select></td>
        <td width="91%" align="left">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="40" align="right">EMail：</td>
    <td height="23" align="center"><table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="16%"><input name="EMail" type="text" class="inp" id="EMail" value="<?php echo $row['EMail']?>" size="50" /></td>
        <td width="84%" align="left">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="40" align="right">联系电话：</td>
    <td height="23" align="center"><table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="16%"><input name="Tel" type="text" class="inp" id="Tel" value="<?php echo $row['Tel']?>" size="30" /></td>
        <td width="84%" align="left">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="40" align="right">手机：</td>
    <td height="23" align="center"><table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="16%"><input name="Mob" type="text" class="inp" id="Mob" value="<?php echo $row['Mob']?>" size="30" /></td>
        <td width="84%" align="left">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="160" align="right">备注：</td>
    <td height="23" align="center"><table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="34%" align="left"><textarea name="Content" cols="80" rows="10" class="inps" id="Content"><?php echo $row['Content']?></textarea></td>
        <td width="66%" align="left">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="40" align="right">确认提交：</td>
    <td height="23">　<input name="" type="submit" value="提 交" class="sunmits">　<input name="" type="reset" class="sunmits" value="重 填" />
      <input name="id" type="hidden" id="id" value="<?php echo $row['ID']?>">
      <input name="page" type="hidden" id="page" value="<?php echo $Page?>" />
      <input name="UserID" type="hidden" id="UserID" value="<?php echo $row['UserID']?>" /></td>
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
