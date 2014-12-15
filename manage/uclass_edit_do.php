<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

require_once("session.php");
$web_root_part = "../";
require_once($web_root_part."lib/db.php");
require_once($web_root_part."lib/function.php");

$ID = trim($_POST['id']);
$Page = trim($_POST['page']);

$ClassName = trim($_POST['ClassName']);
$Addtime = date("Y-m-d H:i:s");

$sql="update uclass set ClassName='".$ClassName."' where ID=".$ID."";

if( !($result = $db->sql_query($sql)) )
{
	  message_die(DB_MESSAGE, 'Could not query uclass');
}

if ($Page > 1) {
	echo "<script>location.replace('uclass.php?page=". $Page ."');</script>";	
}
else{
	echo "<script>location.replace('uclass.php');</script>";	
}

?>