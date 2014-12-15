<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

require_once("session.php");
$web_root_part = "../";
require_once($web_root_part."lib/db.php");
require_once($web_root_part."lib/function.php");
header('Content-type:text/html;charset=utf-8');   

$ClassName = trim($_POST['ClassName']);
$Addtime = date("Y-m-d H:i:s");

$sql="insert into uclass (ClassName,Addtime) values('".$ClassName."','".$Addtime."')";
	if( !($result = $db->sql_query($sql)) )
	{
		//echo $sql;
		message_die(DB_MESSAGE, 'Could not query uclass');
		    
	}else{
				
		echo "<script>location.replace('uclass.php');</script>";				
			 
	}
			
?>