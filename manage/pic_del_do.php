<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

require_once("session.php");
$web_root_part = "../";
require_once($web_root_part."lib/db.php");
require_once($web_root_part."lib/function.php");
header('Content-type:text/html;charset=utf-8');  

$ID = trim($_GET['id']);
$Page = trim($_GET['page']);
$Addtime = date("Y-m-d H:i:s");

//读取文件地址
$querySel = "select PFileName from pic where ID=".$ID."";
if( !($result = $db->sql_query($querySel)) )
{
	message_die(DB_MESSAGE, 'Could not query pic');
		
} else {
	$row = $db->sql_fetchrow($result);
	$PFileName  = $row['PFileName'];
}

//删除文件					
if (file_exists("../pic/".$PFileName )) {
	unlink("../pic/".$PFileName );
}

$sql="delete from pic where ID=".$ID."";

if( !($result = $db->sql_query($sql)) )
{
	message_die(DB_MESSAGE, 'Could not query pic');
}

if ($Page > 1) {
	echo "<script>location.replace('pic.php?page=". $Page ."');</script>";	
}
else{
	echo "<script>location.replace('pic.php');</script>";	
}

?>