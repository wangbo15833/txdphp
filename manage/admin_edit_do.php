<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

require_once("session.php");
$web_root_part = "../";
require_once($web_root_part."lib/db.php");
require_once($web_root_part."lib/function.php");

$ID = trim($_POST['id']);
$Page = trim($_POST['page']);

$AdminID = trim($_POST['AdminID']);
$PassWord = trim($_POST['PassWord']);
$Addtime = date("Y-m-d H:i:s");

if($PassWord <> "") {
	$sql="update admin set PassWord='".md5($PassWord)."' where AdminID='".$AdminID."' and ID=".$ID."";
}
if( !($result = $db->sql_query($sql)) )
{
	  message_die(DB_MESSAGE, 'Could not query admin');
}

if ($Page > 1) {
	echo "<script>location.replace('admin.php?page=". $Page ."');</script>";	
}
else{
	echo "<script>location.replace('admin.php');</script>";	
}

?>