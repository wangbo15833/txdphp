<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');
session_start();

$web_root_part = "";
require_once($web_root_part."lib/db.php");
require_once($web_root_part."lib/function.php");
header('Content-type:text/html;charset=utf-8');   

$Name = trim($_POST['Name']);
$Amount = trim($_POST['Amount']);
$Interest = trim($_POST['Interest']);
$Deadline = trim($_POST['Deadline']);
$Province = trim($_POST['selectp']);
$City = trim($_POST['selectc']);
$Tel = trim($_POST['Tel']);
$QQ = trim($_POST['QQ']);
$Remark = trim($_POST['Remark']);
$Addtime = date("Y-m-d H:i:s");
$Rand = strtoupper(trim($_POST['Rand']));

if ($Rand == $_SESSION['login_check_number']) {
	
	$sql="insert into lend (Name,Amount,Interest,Deadline,Province,City,Tel,QQ,Remark,IsAudit,Addtime) values('".$Name."','".$Amount."','".$Interest."','".$Deadline."','".$Province."','".$City."','".$Tel."','".$QQ."','".$Remark."',0,'".$Addtime."')";
		if( !($result = $db->sql_query($sql)) )
		{
			//echo $sql;
			message_die(DB_MESSAGE, 'Could not query lend');
				
		}else{
				
			echo "<script>location.replace('lend.php');</script>";				
				 
		}
}
else{
	echo "<Script Language='Javascript'>";
	echo "alert('提示：验证码错误，请重新输入！');";
	echo "history.go(-1);";
	echo "</Script>";
}
?>