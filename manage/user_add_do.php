<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

require_once("session.php");
$web_root_part = "../";
require_once($web_root_part."lib/db.php");
require_once($web_root_part."lib/function.php");
header('Content-type:text/html;charset=utf-8');   

$UserID = trim($_POST['UserID']);
$PassWord = trim($_POST['PassWord']);
//$UserClass = trim($_POST['UserClass']);
$EMail = trim($_POST['EMail']);
$Tel = trim($_POST['Tel']);
$Mob = trim($_POST['Mob']);
$Content = trim($_POST['Content']);

$Addtime = date("Y-m-d H:i:s");

$querySel = "select * from user where UserID='".$UserID."'";

if( !($result = $db->sql_query($querySel)) )
{
	message_die(DB_MESSAGE, 'Could not query user');
		
}else{
	
	$row = $db->sql_fetchrow($result);	
	//$db->sql_freeresult($result);
		
	if ($row['UserID']==$UserID){

		echo "<Script Language='Javascript'>";
		echo "alert('提示：用户ID已存在,请重新输入！');";
		echo "history.go(-1);";
		echo "</Script>"; 
		
	}else{
		
		$querySel="insert into user (UserID,UserClass,EMail,Tel,Mob,Content,Addtime) values('".$UserID."',".$UserClass.",'".$EMail."','".$Tel."','".$Mob."','".$Content."','".$Addtime."')";
		if(!($result = $db->sql_query($querySel)))
		{
			//echo $sql;
			message_die(DB_MESSAGE, 'Could not query user');
				
		}
		echo "<script>location.replace('user.php');</script>";
		
	}
}		
?>