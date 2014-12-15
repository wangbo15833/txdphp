<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

require_once("session.php");
$web_root_part = "../";
require_once($web_root_part."lib/db.php");
require_once($web_root_part."lib/function.php");
require_once($web_root_part."lib/page.php");

//搜索

$querySel = "select * from doc";
$querySel = $querySel . " order by DOrder"; 

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
	if (confirm("您确定要删除该条文档吗？")){
		window.location.href = "doc_del_do.php?id=" + id +"&page=" + page
	}
}
</Script>
</head>
<body leftMargin="0" topMargin="0" marginwidth="0">
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="40"><table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="84" height="24" align="center" background="images/tbgg.gif"><a href="doc.php" class="lmenu">公司文档</a></td>
        <td width="23"><img src="images/jt.gif" width="23" height="24"></td>
        <td width="10"><a href="admin_add.php" class="lmenu"></a></td>
        <td width="84" align="center" background="images/tbgg.gif"><a href="doc_add.php" class="lmenu">添加文档</a></td>
        <td width="23" align="center"><img src="images/jt.gif" width="23" height="24"></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width='98%' border=0 align="center" cellpadding=0 cellspacing=1 bgcolor="#EEEEEE">
  <tr>
    <td width="100%" height="40" bgcolor=#F5F5F5><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="5%" align="center">ID</td>
        <td align="center">文档标题</td>
        <td width="14%" align="center">排序</td>
        <td width="9%" align="center">显示</td>
        <td width="9%" align="center">编辑/删除</td>
        <td width="17%" align="center">创建日期</td>
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
        <td width="5%" height="30" align="center"><?php echo $result_show[$i]['ID'] ?></td>
        <td align="center"><?php echo $result_show[$i]['Tit'] ?></td>
        <td width="14%" align="center"><table width="91" border="0" cellspacing="0" cellpadding="0">
          <form action="doc_update_order.php?id=<?php echo $result_show[$i]['ID'] ?>" method="post" name="update_order" id="update_order">
            <tr>
              <td width="91" height="30" align="center"><input name="DOrder" type="text" id="DOrder" value="<?php echo $result_show[$i]['DOrder'] ?>" size="3" class="inpzz" />
                <input name="Submit" type="submit" class="sunmit_px" value="确" /></td>
              </tr>
            </form>
        </table></td>
        <td width="9%" align="center"><?php
if ($result_show[$i]['DShow'] == true) echo "<a href = 'doc_show.php?id=".$result_show[$i]['ID']."&show=0' class='lmenu'><font color='#FF0000'>显示</font></a>";
if ($result_show[$i]['DShow'] == false) echo "<a href = 'doc_show.php?id=".$result_show[$i]['ID']."&show=1' class='lmenu'>不显示</a>";
?></td>
        <td width="4%" align="center"><a href="doc_edit.php?id=<?php echo $result_show[$i]['ID'] ?>&page=<?php echo $pageCurrent ?>" class="tmain">编辑</a></td>
        <td width="5%" align="center"><a href="Javascript:SureDel(<?php echo $result_show[$i]['ID'] ?>,<?php echo $pageCurrent ?>)" class="tmain">删除</a></td>
        <td width="17%" align="center"><?php echo $result_show[$i]['Addtime'] ?></td>
      </tr>
    </table></td>
  </tr>
  <?php
  $i++; 
  } 
  ?>
  <tr>
    <td height="40" align="right" bgcolor="#FFFFFF"><div class="pageclass"><?php $subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,"doc.php?page=",2);?></div></td>
  </tr>
</table>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
