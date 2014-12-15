<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

require_once("session.php");
$web_root_part = "../";
require_once($web_root_part."lib/db.php");
require_once($web_root_part."lib/function.php");
header('Content-type:text/html;charset=utf-8');   

$AdminID = trim($_POST['AdminID']);
$PassWord = trim($_POST['PassWord']);
$Addtime = date("Y-m-d H:i:s");

$querySel = "select * from admin where AdminID='".$AdminID."'";
if( !($result = $db->sql_query($querySel)) )
{
	message_die(DB_MESSAGE, 'Could not query admin');
		
}else{
	
	$row = $db->sql_fetchrow($result);	
	//$db->sql_freeresult($result);
		
	if ($row['AdminID']==$AdminID){

		echo "<Script Language='Javascript'>";
		echo "alert('提示：管理员ID已存在,请重新输入！');";
		echo "history.go(-1);";
		echo "</Script>"; 
		
	}else{
		
		$querySel="insert into admin (AdminID,PassWord,Addtime) values('".$AdminID."','".md5($PassWord)."','".$Addtime."')";
		if(!($result = $db->sql_query($querySel)))
		{
			//echo $sql;
			message_die(DB_MESSAGE, 'Could not query admin');
				
		}
		echo "<script>location.replace('admin.php');</script>";
		
	}
}		
?>