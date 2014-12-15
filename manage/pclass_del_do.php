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

$sql="delete from pclass where ID=".$ID."";

if( !($result = $db->sql_query($sql)) )
{
	message_die(DB_MESSAGE, 'Could not query pclass');
}

if ($Page > 1) {
	echo "<script>location.replace('pclass.php?page=". $Page ."');</script>";	
}
else{
	echo "<script>location.replace('pclass.php');</script>";	
}

?>