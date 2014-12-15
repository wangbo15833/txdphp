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

$querySel = "select ID,UserID,UserClass,(select ClassName from uclass where ID = user.UserClass) as UserClassName,Tel,Mob,EMail,Addtime from user where ID > 0";
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
		window.location.href = "user_del_do.php?id=" + id +"&page=" + page
	}
}
</Script>
</head>
<body leftMargin="0" topMargin="0" marginwidth="0">
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="27%" height="40"><table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="84" height="24" align="center" background="images/tbgg.gif"><a href="user.php" class="lmenu">用户管理</a></td>
        <td width="23"><img src="images/jt.gif" width="23" height="24"></td>
        <td width="10"><a href="user_add.php" class="lmenu"></a></td>
        <td width="84" align="center" background="images/tbgg.gif"><a href="user_add.php" class="lmenu">添加用户</a></td>
        <td width="23" align="center"><img src="images/jt.gif" width="23" height="24"></td>
      </tr>
    </table></td>
    <td width="73%" align="right"><table border="0" cellspacing="0" cellpadding="0">
      <form action="user.php" method="get" name="search" id="search">
        <tr>
          <td width="10">&nbsp;</td>
          <td width="55" align="center">用户：</td>
          <td width="85" align="center"><select name="userclass" id="userclass" class="sel">
            <option value="">全部类别</option>
            <?php
		  $querySel = "select * from uclass";
		  $result_sub = mysql_query($querySel) or die(mysql_error()); 
		  $i = 0; 
		  while($row_sub=mysql_fetch_array($result_sub)) 
			{
				$result_show[$i] = $row_sub;
				if ($UserClass == $result_show[$i]['ID']) $sel_c = "selected";	
				echo "<option ".$sel_c." value='". $result_show[$i]['ID'] ."'>". $result_show[$i]['ClassName'] ."</option>";
				$sel_c = "";
				$i++; 
 			}
			
		 ?>
          </select></td>
          <td width="140" align="center"><input name="k" type="text" class="inp" id="k" value="<?php echo $_GET["k"]?>" size="20" /></td>
          <td width="68" align="center"><input name="Submit2" type="submit" class="sunmits" value="搜索" /></td>
        </tr>
      </form>
    </table></td>
  </tr>
</table>
<table width='98%' border=0 align="center" cellpadding=0 cellspacing=1 bgcolor="#EEEEEE">
  <tr>
    <td width="100%" height="40" bgcolor=#F5F5F5><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="10%" align="center">用户名</td>
        <td width="11%" align="center">会员类别</td>
        <td width="12%" align="center">联系电话</td>
        <td width="13%" align="center">手机号</td>
        <td width="18%" align="center">电子邮件</td>
        <td width="19%" align="center">&nbsp;</td>
        <td width="6%" align="center"> 编辑/删除</td>
        <td width="11%" align="center">创建日期</td>
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
        <td width="10%" height="30" align="center">　<?php echo $result_show[$i]['UserID'] ?></td>
        <td width="11%" align="center"><?php echo $result_show[$i]['UserClassName'] ?></td>
        <td width="12%" align="center"><?php echo $result_show[$i]['Tel'] ?></td>
        <td width="13%" align="center"><?php echo $result_show[$i]['Mob'] ?></td>
        <td width="18%" align="center"><?php echo $result_show[$i]['EMail'] ?></td>
        <td align="center">&nbsp;</td>
        <td width="3%" align="center"><a href="user_edit.php?id=<?php echo $result_show[$i]['ID'] ?>&page=<?php echo $pageCurrent ?>" class="tmain">编辑</a></td>
        <td width="3%" align="center"><a href="Javascript:SureDel(<?php echo $result_show[$i]['ID'] ?>,<?php echo $pageCurrent ?>)" class="tmain">删除</a></td>
        <td width="11%" align="center"><?php echo $result_show[$i]['Addtime'] ?></td>
      </tr>
    </table></td>
  </tr>
  <?php
  $i++; 
  } 
  ?>
  <tr>
    <td height="40" align="right" bgcolor="#FFFFFF"><div class="pageclass"><?php $subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,"user.php?userclass=".$UserClass."&k=".$UserID."&page=",2);?></div></td>
  </tr>
</table>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
