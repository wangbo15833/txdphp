<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

require_once("session.php");
$web_root_part = "../";
require_once($web_root_part."lib/db.php");
require_once($web_root_part."lib/function.php");
header('Content-type:text/html;charset=utf-8');   

$PClassID = trim($_POST['PClassID']);
$PUrl = trim($_POST['PUrl']);
$Addtime = date("Y-m-d H:i:s");
$PFileName = date("YmdHis").rand(1000,9999);

$upimages = $_FILES['upimages']['tmp_name'];
$upimages_name = $_FILES['upimages']['name'];
$upimages_size = $_FILES['upimages']['size'];
$upimages_type = $_FILES['upimages']['type'];

if($upimages_size > 2048000)
{
	echo "<script>alert('提示：文件大小不要超过2M!');location.replace('javascript:history.back(-1);');</script>";
	exit;
} else{
	
	if($upimages_name)
	{
		$upimages_lsp=explode(".",strtolower($upimages_name));
		$upimages_extname=$upimages_lsp[count($upimages_lsp)-1];
		if( ($upimages_extname != 'jpg') && ($upimages_extname != 'jpeg') && ($upimages_extname != 'gif') && ($upimages_extname != 'png') && ($upimages_extname != 'swf') )
		{
			echo "<script>alert('提示：请上传JPG、JPEG、GIF或者PNG文件!');location.replace('javascript:history.back(-1);');</script>";
			exit;
				
		} else{
			
			move_uploaded_file($upimages, "..//pic//".$PFileName.".".$upimages_extname);
			$PFileName = $PFileName . ".".$upimages_extname;
		}
	}					
}


//写入记录

$sql="insert into pic(PClassID,PFileName,PUrl,PShow,Addtime) values('".$PClassID."','".$PFileName."','".$PUrl."','1','".$Addtime."')";
	if( !($result = $db->sql_query($sql)) )
	{
		//echo $sql;
		message_die(DB_MESSAGE, 'Could not query pic');
		    
	}else{
				
		echo "<script>location.replace('pic.php');</script>";				
			 
	}
		
?>