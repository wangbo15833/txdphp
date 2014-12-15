<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

require_once($web_root_part."lib/db.php");
require_once($web_root_part."lib/function.php");
require_once($web_root_part."lib/ubstr.php");
require_once($web_root_part."lib/safe.php");
require_once($web_root_part."lib/config.php");
$aid=$_GET['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $cfg_hostname?></title>
<link href="css/style.css" rel="stylesheet" media="screen" type="text/css" />
<link href="css/tabMenu.css" rel="stylesheet" media="screen" type="text/css" />

<link rel="stylesheet" type="text/css" href="jdt/css/jquery.jslides.css" media="screen" />
<script type="text/javascript" src="jdt/js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="jdt/js/jquery.jslides.js"></script>

</head>

<body class="singlepage">
<?php include 'header.php'; ?>
<div class="w992">
<?php include 'left.php'; ?>
<?php
$querySel = "select * from news where ID =".$aid ;
$result = mysql_query($querySel) or die(mysql_error()); 
$row=mysql_fetch_array($result);
?>
    <div class="right">
		<div class="position">您的位置：拓信贷首页>新闻中心 </div>
        <div class="content">
        <center><h2><?php echo $row['Tit'];?></h2></center>
        <br />
			<?php echo $row['Content'];?> 
        
        </div>
 
    </div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>