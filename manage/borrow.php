<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

require_once("session.php");
$web_root_part = "../";
require_once($web_root_part."lib/db.php");
require_once($web_root_part."lib/function.php");
require_once($web_root_part."lib/page.php");

//搜索
$UserID = $_GET["k"]; 
$UserClass = $_GET["userclass"];

$querySel = "select ID,Name,Amount,Interest,Deadline,Province,City,Cotype,CoPosition,Tel,QQ,Remark,Addtime,IsAudit from borrow";
if($UserID) $querySel = $querySel . " and UserID like '%". $UserID ."%'";
if($UserClass) $querySel = $querySel . " and UserClass = ". $UserClass ."";
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
<Script Language = "Javascript">
function SureDel(id,page)
{
	if (confirm("您确定要删除该条信息吗？")){
		window.location.href = "borrow_del_do.php?id=" + id +"&page=" + page
	}
}
</Script>
</head>
<body leftMargin="0" topMargin="0" marginwidth="0">
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="27%" height="40"><table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="84" height="24" align="center" background="images/tbgg.gif"><a href="borrow.php" class="lmenu">借款管理</a></td>
        <td width="23"><img src="images/jt.gif" width="23" height="24"></td>
        <td width="10"><a href="user_add.php" class="lmenu"></a></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width='98%' border=0 align="center" cellpadding=0 cellspacing=1 bgcolor="#EEEEEE">
  <tr>
    <td width="100%" height="40" bgcolor=#F5F5F5><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="6%" align="center">姓名</td>
        <td width="6%" align="center">借款数额</td>
        <td width="6%" align="center">可接受月息</td>
        <td width="6%" align="center">借款期限</td>
        <td width="6%" align="center">借款人省份</td>
        <td width="6%" align="center">借款人城市</td>
        <td width="6%" align="center">抵押物种类</td>
        <td width="10%" align="center">抵押物位置</td>
        <td width="7%" align="center">联系电话</td>
        <td width="7%" align="center">联系QQ</td>
        <td width="15%" align="center">信息备注</td>
        <td width="9%" align="center"> 审核/删除</td>
        <td width="10%" align="center">添加日期</td>
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
    <td height="40" bgcolor="#FFFFFF" onMouseOver="this.style.background='#F5F5F5'" onMouseOut="this.style.background='#FFFFFF'"><table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
        <td width="6%" height="30" align="center"><?php echo $result_show[$i]['Name'] ?></td>
        <td width="6%" align="center"><?php echo $result_show[$i]['Amount'] ?></td>
        <td width="6%" align="center"><?php echo $result_show[$i]['Interest'] ?></td>
        <td width="6%" align="center"><?php echo $result_show[$i]['Deadline'] ?></td>
        <td width="6%" align="center"><?php echo $result_show[$i]['Province'] ?></td>
        <td width="6%" align="center"><?php echo $result_show[$i]['City'] ?></td>
        <td width="6%" align="center"><?php echo $result_show[$i]['Cotype'] ?></td>
        <td width="10%" align="center"><?php echo $result_show[$i]['CoPosition'] ?></td>
        <td width="7%" align="center"><?php echo $result_show[$i]['Tel'] ?></td>
        <td width="7%" align="center"><?php echo $result_show[$i]['QQ'] ?></td>
        <td width="15%" align="center"><?php echo $result_show[$i]['Remark'] ?></td>
        <td width="6%" align="center">
        <?php
			if ($result_show[$i]['IsAudit'] == true) echo "<a href = 'borrow_sh.php?id=".$result_show[$i]['ID']."&sh=0' class='lmenu'><font color='#FF0000'>已审核</font></a>";
			if ($result_show[$i]['IsAudit'] == false) echo "<a href = 'borrow_sh.php?id=".$result_show[$i]['ID']."&sh=1' class='lmenu'>未审核</a>";
		?>
        </td>
        <td width="3%" align="center"><a href="Javascript:SureDel(<?php echo $result_show[$i]['ID'] ?>,<?php echo $pageCurrent ?>)" class="tmain">删除</a></td>
        <td width="10%" align="center"><?php echo $result_show[$i]['Addtime'] ?></td>
      </tr>
    </table></td>
  </tr>
  <?php
  $i++; 
  } 
  ?>
  <tr>
    <td height="40" align="right" bgcolor="#FFFFFF"><div class="pageclass"><?php $subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,"borrow.php?page=",2);?></div></td>
  </tr>
</table>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
