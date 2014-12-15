<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

require_once("session.php");
$web_root_part = "../";
require_once($web_root_part."lib/db.php");
require_once($web_root_part."lib/function.php");
header('Content-type:text/html;charset=utf-8');   

$ID = floor(trim($_GET['id']));
$Addtime = date("Y-m-d H:i:s");

if(trim($_POST['POrder']) <> ""){
	$POrder = floor(trim($_POST['POrder']));
}else{
	$POrder = 0;
}

$sql="update pic set POrder='".$POrder."' where ID=".$ID."";

if( !($result = $db->sql_query($sql)) )
{
	  message_die(DB_MESSAGE, 'Could not query pic');
}

echo "<script>location.replace('". $_SERVER['HTTP_REFERER'] ."');</script>";

?>