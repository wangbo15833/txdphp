<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

require_once("session.php");
$web_root_part = "../";
require_once($web_root_part."lib/db.php");
require_once($web_root_part."lib/function.php");
header('Content-type:text/html;charset=utf-8');  

$show = trim($_GET['show']);
$ID = trim($_GET['id']);
$Addtime = date("Y-m-d H:i:s");

if ($show == "0") {
	$sql="update news set DShow = 0 where ID = ".$ID."";
	if( !($result = $db->sql_query($sql)) )
	{
		message_die(DB_MESSAGE, 'Could not query news');
	}
}
if ($show == "1") {
	
	$sql="update news set DShow = 1 where ID = ".$ID."";
	if( !($result = $db->sql_query($sql)) )
	{
		message_die(DB_MESSAGE, 'Could not query news');
	}
}
			 
echo "<script>location.replace('". $_SERVER['HTTP_REFERER'] ."');</script>";

?>