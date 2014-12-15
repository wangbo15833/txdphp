<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

require_once("session.php");
$web_root_part = "../";
require_once($web_root_part."lib/db.php");
require_once($web_root_part."lib/function.php");
require_once($web_root_part."lib/page.php");

//搜索
$Oper = $_GET["oper"]; 
$IP = $_GET["ip"]; 
$UserName = $_GET["username"]; 
$ATime = $_GET["atime"]; 

$querySel = "select * from Log where ID > 0";

if($Oper) $querySel = $querySel . " and Oper like '%". $Oper ."%'";
if($IP) $querySel = $querySel . " and IP like '%". $IP ."%'";
if($UserName) $querySel = $querySel . " and UserName like '%". $UserName ."%'";
if($ATime) $querySel = $querySel . " and Addtime like '%". $ATime ."%'";

$querySel = $querySel . " order by ID desc"; 

$result = mysql_query($querySel) or die(mysql_error()); 
$total_records = mysql_num_rows($result);   //取得总记录数

$page_size = 20;  //每页显示的条数
$nums = $total_records;  //总条目数
$sub_pages = 5;   //每次显示的页数
$pageCurrent = $_GET["page"];     //得到当前是第几页    

if(!$pageCurrent) $pageCurrent = 1;

//$begin_record = 0;   //显示记录的首行序号
$begin_record = ($pageCurrent - 1) * $page_size;

if($total_records> 0) 
{ 

	//利用LIMIT关键字获取本页所要显示的记录,注意limit两边要"空格"； 
	$querySel = $querySel. " limit ".$begin_record. ", ".$page_size; 
	
	$result = mysql_query($querySel)   or   die(mysql_error()); 
	$current_records = mysql_num_rows($result); //取得本页的记录总数 
	
	//将查询结果放在$result_show 数组
	$result_show = array(); 

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="css/cp.css" type="text/css">
<link type="text/css" rel="stylesheet" href="css/calendar.css" >
<script type="text/javascript" src="js/calendar.js" ></script>  
<script type="text/javascript" src="js/calendar-zh.js" ></script>
<script type="text/javascript" src="js/calendar-setup.js"></script>
<Script language = "JavaScript1.2" src="js/log_all.js"></Script>
<Script Language = "Javascript">
function SureDel(id,page)
{
	if (confirm("您确定要删除该条信息吗？")){
		window.location.href = "log_del_do.php?id=" + id +"&page=" + page
	}
}
</Script>
</head>
<body leftMargin="0" topMargin="0" marginwidth="0">
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="40"><table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="84" height="24" align="center" background="images/tbgg.gif"><a href="log.php" class="lmenu">日志管理</a></td>
        <td width="23"><img src="images/jt.gif" width="23" height="24"></td>
        <td width="10"></td>
        </tr>
    </table></td>
  </tr>
</table>
<table width='98%' border=0 align="center" cellpadding=0 cellspacing=1 bgcolor="#EEEEEE">
  <tr>
    <td height="40" align="right" bgcolor="#FFFFFF"><table border="0" cellspacing="0" cellpadding="0">
      <form name="search" method="get" action="log.php">
        <tr>
          <td width="10">&nbsp;</td>
          <td width="56" align="center">IP地址：</td>
          <td width="137" align="center"><input name="ip" type="text" class="inp" id="ip" value="<?php echo $_GET["ip"]?>" size="20"></td>
          <td width="56" align="center">日期：</td>
          <td width="136" align="center"><input name="atime" type="text" class="inp" id="atime" value="<?php echo $_GET["atime"]?>" size="20" onClick="return showCalendar('atime', 'y-mm-dd');"></td>
          <td width="64" align="center"><input name="Submit" type="submit" class="sunmits" value="搜索"></td>
        </tr>
      </form>
    </table></td>
  </tr>
  <form method="get" name="thisform">
  <tr>
    <td height="40" bgcolor="#FFFFFF"><table width="95%" border="0" cellpadding="0" cellspacing="0" align="center" height="40">
      <tr>
        <td align="right"><input name="page" type="hidden" id="page" value="<?php echo $pageCurrent ?>">
          <input type="checkbox" name="chkall" value="on" onClick="CheckAll(this.form)">
          全部选择/取消
          <input name="submit" type="submit" onClick="delit(this.form)" value="删除所选" class="sunmits"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="100%" height="40" bgcolor="#EEEEEE"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="3%" align="center">ID</td>
        <td width="23%" align="center">行为</td>
        <td width="29%" align="center">IP地址</td>
        <td width="19%" align="center">管理员ID</td>
        <td width="10%" align="center">删除</td>
        <td width="16%" align="center">创建日期</td>
      </tr>
    </table></td>
  </tr>
  <?php
    $i = 0; 
	while($row=mysql_fetch_array($result)) 
	{ 
	$result_show[$i] = $row; 
	?>
  <tr>
    <td height="40" bgcolor="#FFFFFF" onMouseOver="this.style.background='#F6F6F6'" onMouseOut="this.style.background='#FFFFFF'"><table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
        <td width="4%" height="30" align="center"><input name="id[]" type="checkbox" id="id" value="<?php echo $result_show[$i]["ID"];?>"></td>
        <td width="22%">　<?php echo $result_show[$i]["Oper"];?></td>
        <td width="29%">　<?php echo $result_show[$i]["IP"];?></td>
        <td width="19%" align="center"><?php echo $result_show[$i]["UserName"];?></td>
        <td align="center"><a href="Javascript:SureDel(<?php echo $result_show[$i]['ID'] ?>,<?php echo $pageCurrent ?>)" class="tmain">删除</a></td>
        <td width="16%" align="center"><?php echo $result_show[$i]['Addtime'] ?></td>
      </tr>
    </table></td>
  </tr>
  <?php
  $i++; 
  } 
  ?>
  <tr>
    <td height="40" align="right" bgcolor="#FFFFFF"><div class="pageclass"><?php $subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,"log.php?oper=". $Oper ."&ip=". $IP ."&username=". $UserName ."&page=",2);?></div></td>
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