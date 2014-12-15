<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

require_once("session.php");
$web_root_part = "../";
require_once($web_root_part."lib/db.php");
require_once($web_root_part."lib/function.php");

$ID = trim($_GET['id']);
$Page = trim($_GET['page']);

$querySel = "select * from pic where ID=".$ID."";
if( !($result = $db->sql_query($querySel)) )
{
	message_die(DB_MESSAGE, 'Could not query pic');
		
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
</head>
<body leftMargin="0" topMargin="0" marginwidth="0">
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="40"><table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="84" height="24" align="center" background="images/tbgg.gif"><a href="pic.php" class="lmenu">展示列表</a></td>
        <td width="23"><img src="images/jt.gif" width="23" height="24"></td>
        <td width="10">&nbsp;</td>
        <td width="83" align="center" background="images/tbgg.gif"><a href="pic_add.php" class="lmenu">添加展示</a></td>
        <td width="10"><img src="images/jt.gif" width="23" height="24"></td>
        <td width="10"></td>
        <td width="84" align="center" background="images/tbgg.gif"><a href="pic_edit.php?id=<?php echo $_GET['id']?>&page=<?php echo $_GET['page']?>" class="lmenu">编辑展示</a></td>
        <td width="23" align="center"><img src="images/jt.gif" width="23" height="24"></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width='98%' border=0 align="center" cellpadding=0 cellspacing=1 bgcolor="#EBEBEB">
<form method="post" name="pic" enctype="multipart/form-data" action="pic_edit_do.php">
  <tr bgcolor="#FFFFFF">
    <td height="40" align="right">展示类别：</td>
    <td height="23" align="center"><table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="23%"><select name="PClassID" id="PClassID" class="sel">
          <?php
		  $querySel = "select * from pclass";
		  $result_sub = mysql_query($querySel) or die(mysql_error()); 
		  $i = 0; 
		  while($row_sub=mysql_fetch_array($result_sub)) 
			{
				$result_show[$i] = $row_sub;
				if ($row['PClassID'] == $result_show[$i]['ID']) $sel_c = "selected";	
				echo "<option ".$sel_c." value='". $result_show[$i]['ID'] ."'>". $result_show[$i]['ClassName'] ."</option>";
				$sel_c = "";
				$i++; 
 			}
			
		 ?>
        </select></td>
        <td width="77%" align="left"></td>
      </tr>
    </table></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="150" align="right">&nbsp;</td>
    <td height="23" align="left">  　
      <?php echo "<img src='../pic/". $row['PFileName'] ."' width='281' height='100' />";?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="15%" height="40" align="right">展示图片：</td>
    <td width="85%" height="23" align="center"><table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="16%"><input name = "upimages" type="file" id="upimages" size="50" class="sel" /></td>
        <td width="84%" align="left"></td>
      </tr>
    </table></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="40" align="right">&nbsp;</td>
    <td height="23" align="center"><table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="23%" align="left">950 × 340像素</td>
        <td width="77%" align="left"></td>
      </tr>
    </table></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="40" align="right">链接地址：</td>
    <td height="23" align="center"><table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="16%"><input name="PUrl" type="text" class="inp" id="PUrl" value="<?php echo $row['PUrl']?>" size="59" /></td>
        <td width="84%" align="left"></td>
      </tr>
    </table></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="40" align="right">确认提交：</td>
    <td height="23">　<input name="" type="submit" value="提 交" class="sunmits">　<input name="" type="reset" class="sunmits" value="重 填" />
      <input name="id" type="hidden" id="id" value="<?php echo $row['ID']?>">
      <input name="page" type="hidden" id="page" value="<?php echo $Page?>" /></td>
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
