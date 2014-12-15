<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

require_once("session.php");
$web_root_part = "../";
require_once($web_root_part."lib/db.php");
require_once($web_root_part."lib/function.php");

$ID = trim($_POST['id']);
$Page = trim($_POST['page']);

$UserID = trim($_POST['UserID']);
//$PassWord = trim($_POST['PassWord']);
$UserClass = trim($_POST['UserClass']);
$EMail = trim($_POST['EMail']);
$Tel = trim($_POST['Tel']);
$Mob = trim($_POST['Mob']);
$Content = trim($_POST['Content']);

//if($PassWord <> "") {
//	$sql="update User set PassWord='".substr(md5($PassWord),8,16)."',UserClass=".$UserClass.",EMail='".$EMail."',Tel='".$Tel."',Mob='".$Mob."',Content='".$Content."' where UserID='".$UserID."' and ID=".$ID."";
//}else{
	$sql="update user set UserClass=".$UserClass.",EMail='".$EMail."',Tel='".$Tel."',Mob='".$Mob."',Content='".$Content."' where UserID='".$UserID."' and ID=".$ID."";
//}

if( !($result = $db->sql_query($sql)) )
{
	  message_die(DB_MESSAGE, 'Could not query user');
}

if ($Page > 1) {
	echo "<script>location.replace('user.php?page=". $Page ."');</script>";	
}
else{
	echo "<script>location.replace('user.php');</script>";	
}

?>