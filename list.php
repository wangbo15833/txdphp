<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

require_once($web_root_part."lib/db.php");
require_once($web_root_part."lib/function.php");
require_once($web_root_part."lib/ubstr.php");
require_once($web_root_part."lib/safe.php");
require_once($web_root_part."lib/page.php");
require_once($web_root_part."lib/config.php");
$lid=$_GET['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $cfg_hostname?></title>
<link href="css/style.css" rel="stylesheet" media="screen" type="text/css" />
<link href="css/tabMenu.css" rel="stylesheet" media="screen" type="text/css" />
<link href="css/cp.css" rel="stylesheet" media="screen" type="text/css" />

<link rel="stylesheet" type="text/css" href="jdt/css/jquery.jslides.css" media="screen" />
<script type="text/javascript" src="jdt/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="jdt/js/jquery.jslides.js"></script>

</head>

<body class="newslist">
<?php include 'header.php'; ?>
<div class="w992">
<?php include 'left.php'; ?>
    <div class="right">
		<div class="position">您的位置：拓信贷首页>新闻中心 </div>
        <div class="content">
			<ul>
            <?php
$querySel = "select * from news where ClassID ='".$lid."' and DShow=1 order by Addtime desc";


$result = mysql_query($querySel) or die(mysql_error()); 
$total_records = mysql_num_rows($result);   //取得总记录数

$page_size = 12;  //每页显示的条数
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

 $i = 0; 
	while($row=mysql_fetch_array($result)) 
	{ 
	$result_show[$i] = $row; 
?>

<li><a href="NewsInfo.php?id=<?php echo $result_show[$i]['ID'] ?>" target="_blank" class="tmain"><?php echo ($result_show[$i]['Tit']) ?></a><span class="riqi"><?php echo date('Y-m-d', strtotime($result_show[$i]['Addtime'])); ?></span></li>
<?php
}
?>
            </ul>    
            
        <div class="pageclass"><?php $subPages=new SubPages($page_size,$nums,$pageCurrent,$sub_pages,"list.php?id=".$lid."&page=",2);?></div>    
        </div>
 
    </div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>