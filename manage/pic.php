<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

require_once("session.php");
$web_root_part = "../";
require_once($web_root_part."lib/db.php");
require_once($web_root_part."lib/function.php");
require_once($web_root_part."lib/page.php");

//搜索
$PClassID = $_GET["pclassid"]; 
$querySel = "select *,(select ClassName from pclass where ID = pic.PClassID) as PClassName from pic";
if($PClassID) $querySel = $querySel . " where PClassID = ". $PClassID ."";
$querySel = $querySel . " order by ID desc"; 

$result = mysql_query($querySel) or die(mysql_error()); 
$total_records = mysql_num_rows($result);   //取得总记录数

$page_size = 10;  //每页显示的条数
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
		window.location.href = "pic_del_do.php?id=" + id +"&page=" + page
	}
}
</Script>
</head>
<body leftMargin="0" topMargin="0" marginwidth="0">
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="40"><table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="84" height="24" align="center" background="images/tbgg.gif"><a href="pic.php" class="lmenu">展示列表</a></td>
        <td width="23"><img src="images/jt.gif" width="23" height="24"></td>
        <td width="10"></td>
        <td width="84" align="center" background="images/tbgg.gif"><a href="pic_add.php" class="lmenu">添加展示</a></td>
        <td width="23" align="center"><img src="images/jt.gif" width="23" height="24"></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width='98%' border=0 align="center" cellpadding=0 cellspacing=1 bgcolor="#EEEEEE">
  <tr>
    <td height="40" align="right" bgcolor=#FFFFFF><table border="0" cellspacing="0" cellpadding="0">
      <form action="pic.php" method="get" name="search" id="search">
        <tr>
          <td width="10">&nbsp;</td>
          <td width="39" align="center">分类：</td>
          <td><select name="pclassid" id="pclassid" class="sel">
          <option value="">全部类别</option>
            <?php
		  $querySel = "select * from pclass";
		  $result_sub = mysql_query($querySel) or die(mysql_error()); 
		  $i = 0; 
		  while($row_sub=mysql_fetch_array($result_sub)) 
			{
				$result_show[$i] = $row_sub;
				if ($PClassID == $result_show[$i]['ID']) $sel_c = "selected";	
				echo "<option ".$sel_c." value='". $result_show[$i]['ID'] ."'>". $result_show[$i]['ClassName'] ."</option>";
				$sel_c = "";
				$i++; 
 			}
			
		 ?>
          </select></td>
          <td width="68" align="center"><input name="Submit2" type="submit" class="sunmits" value="搜索" /></td>
        </tr>
      </form>
    </table></td>
  </tr>
  <tr>
    <td width="100%" height="40" bgcolor=#F5F5F5><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="28%" align="center">展示图片</td>
        <td width="32%" align="center">介绍</td>
        <td width="15%" align="center">排序</td>
        <td width="9%" align="center">编辑/删除</td>
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
    <td height="40" bgcolor="#FFFFFF" onMouseOver="this.style.background='#F5F5F5'" onMouseOut="this.style.background='#FFFFFF'"><table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
        <td width="28%" height="150">　
          <?php echo "<img src='../pic/". $result_show[$i]['PFileName'] ."' width='281' height='100' />";?></td>
        <td width="32%" align="left">展示类别：<?php echo $result_show[$i]['PClassName'] ?><br />
          链接地址：<?php echo $result_show[$i]['PUrl'] ?></td>
        <td width="14%" align="center"><table width="91" border="0" cellspacing="0" cellpadding="0">
          <form action="pic_update_order.php?id=<?php echo $result_show[$i]['ID'] ?>" method="post" name="update_order" id="update_order">
            <tr>
              <td width="91" height="30" align="center"><input name="POrder" type="text" id="POrder" value="<?php echo $result_show[$i]['POrder'] ?>" size="3" class="inpzz" />
                <input name="Submit" type="submit" class="sunmit_px" value="确" /></td>
              </tr>
            </form>
        </table></td>
        <td width="5%" align="center"><a href="pic_edit.php?id=<?php echo $result_show[$i]['ID'] ?>&page=<?php echo $pageCurrent ?>" class="tmain">编辑</a></td>
        <td width="5%" align="center"><a href="Javascript:SureDel(<?php echo $result_show[$i]['ID'] ?>,<?php echo $pageCurrent ?>)" class="tmain">删除</a></td>
        <td width="16%" align="center"><?php echo $result_show[$i]['Addtime'] ?></td>
      </tr>
    </table></td>
  </tr>
  <?php
  $i++; 
  } 
  ?>
  <tr>
    <td height="40" align="right" bgcolor="#FFFFFF"><div class="pageclass"><?php $subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,"pic.php?pclassid=".$PClassID."&page=",2);?></div></td>
  </tr>
</table>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
