<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

require_once("session.php");
$web_root_part = "../";
require_once($web_root_part."lib/db.php");
require_once($web_root_part."lib/function.php");
header('Content-type:text/html;charset=utf-8');   

$Tit = trim($_POST['Tit']);
if (!empty($_POST['content'])) {
	if (get_magic_quotes_gpc()) {
		$Content = stripslashes($_POST['content']);
	} else {
		$Content = $_POST['content'];
	}
}

$Addtime = date("Y-m-d H:i:s");

$sql="insert into doc (Tit,Content,Addtime) values('".$Tit."','".$Content."','".$Addtime."')";
	if( !($result = $db->sql_query($sql)) )
	{
		//echo $sql;
		message_die(DB_MESSAGE, 'Could not query doc');
		    
	}else{
			
	    echo "<script>location.replace('doc.php');</script>";				
			 
	}
			
?>