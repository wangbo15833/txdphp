<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

require_once("session.php");
$web_root_part = "../";
require_once($web_root_part."lib/db.php");
require_once($web_root_part."lib/function.php");

$ID = trim($_POST['id']);
$Page = trim($_POST['page']);

$Tit = trim($_POST['Tit']);
if (!empty($_POST['content'])) {
	if (get_magic_quotes_gpc()) {
		$Content = stripslashes($_POST['content']);
	} else {
		$Content = $_POST['content'];
	}
}

$Addtime = date("Y-m-d H:i:s");

$sql="update doc set Tit='".$Tit."',Content='".$Content."' where ID=".$ID."";

if( !($result = $db->sql_query($sql)) )
{
	  message_die(DB_MESSAGE, 'Could not query doc');
}

if ($Page > 1) {
	echo "<script>location.replace('doc.php?page=". $Page ."');</script>";	
}
else{
	echo "<script>location.replace('doc.php');</script>";	
}

?>