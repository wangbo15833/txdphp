<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

require_once("session.php");
$web_root_part = "../";
require_once($web_root_part."lib/db.php");
require_once($web_root_part."lib/function.php");
header('Content-type:text/html;charset=utf-8');   

$Tit = trim($_POST['Tit']);
$ClassID = trim($_POST['NClass']);
if (!empty($_POST['content'])) {
	if (get_magic_quotes_gpc()) {
		$Content = stripslashes($_POST['content']);
	} else {
		$Content = $_POST['content'];
	}
}

$Addtime = date("Y-m-d H:i:s");

$sql="insert into news (Tit,Content,ClassID,Addtime) values('".$Tit."','".$Content."','".$ClassID."','".$Addtime."')";
	if( !($result = $db->sql_query($sql)) )
	{
		//echo $sql;
		message_die(DB_MESSAGE, 'Could not query news');
		    
	}else{
			
	    echo "<script>location.replace('news.php');</script>";				
			 
	}
			
?>