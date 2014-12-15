<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

session_start();
$_SESSION['AdminID'] = null;
$_SESSION['LoginIP'] = null;
$_SESSION['LoginTime'] = null;

$web_root_part = "../";
require_once($web_root_part."lib/db.php");
require_once($web_root_part."lib/function.php");
header('Content-type:text/html;charset=utf-8');   

$AdminID = trim($_POST['AdminID']);
$PassWord = trim($_POST['PassWord']);
$Rand = strtoupper(trim($_POST['Rand']));
$Addtime = date("Y-m-d H:i:s");

if ($Rand == $_SESSION['login_check_number']) {
	
     $querySel = "select * from admin where AdminID='".$AdminID."' and PassWord='".md5($PassWord)."' ";
	 if( !($result = $db->sql_query($querySel)) )
	 {
		message_die(DB_MESSAGE, 'Could not query admin');
		
	 } else {
		
		$row = $db->sql_fetchrow($result);
		//$db->sql_freeresult($result);
		
		if (($row['AdminID']==$AdminID) && ($row['PassWord']==md5($PassWord)))
		{
			//
			//echo $_SERVER['REMOTE_ADDR'];
			$_SESSION['AdminID'] = $row['AdminID'];
			$_SESSION['LoginIP'] = $_SERVER['REMOTE_ADDR'];
			$_SESSION['LoginTime'] = $Addtime;
			
			$sql="update admin set IP='".$_SERVER['REMOTE_ADDR']."',LoginTime='".$Addtime."' where ID=".$row['ID']."";
			if( !($result = $db->sql_query($sql)) )
			{
				  message_die(DB_MESSAGE, 'Could not query admin');
			}
				 
			$sql="insert into log (UserName,Oper,IP,Addtime) values('".$AdminID."','登录','".$_SERVER['REMOTE_ADDR']."','".$Addtime."')";
	        if( !($result = $db->sql_query($sql)) )
	         {
		         //echo $sql;
		         message_die(DB_MESSAGE, 'Could not query log');
		    
	         }else{
				
				 echo "<script>location.replace('manage.php');</script>";				
			 
			 }
			
		}else{
			
			echo "<Script Language='Javascript'>";
			echo "alert('提示：用户名密码错误，请重新输入！');";
			echo "history.go(-1);";
			echo "</Script>";
			//
		}
	
	 }
  }
else {
	
	echo "<Script Language='Javascript'>";
	echo "alert('提示：验证码错误，请重新输入！');";
	echo "history.go(-1);";
	echo "</Script>";
	
}
?>