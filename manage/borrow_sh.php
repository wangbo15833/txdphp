<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

require_once("session.php");
$web_root_part = "../";
require_once($web_root_part."lib/db.php");
require_once($web_root_part."lib/function.php");
require_once($web_root_part."lib/safe.php");
header('Content-type:text/html;charset=utf-8');  

if($_SESSION['AdminID'] == "admin"){

$sh = trim($_GET['sh']);
if (is_string($_GET['id'])) {
	$ID = trim($_GET['id']);
}

if (is_array($_GET['id'])) {
	$ID = implode(",",$_GET['id']); 
}

if ($sh == "0") {
	$sql="update borrow set IsAudit = 0 where ID in (".$ID.")";
	if( !($result = $db->sql_query($sql)) )
	{
		message_die(DB_MESSAGE, 'Could not query borrow');
	}
}
if ($sh == "1") {
	
	$sql="update borrow set IsAudit =1 where ID in (".$ID.")";
	if( !($result = $db->sql_query($sql)) )
	{
		message_die(DB_MESSAGE, 'Could not query borrow');
	}
}
			 
echo "<script>location.replace('". $_SERVER['HTTP_REFERER'] ."');</script>";

}
?>