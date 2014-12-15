<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

require_once("session.php");
$web_root_part = "../";
require_once($web_root_part."lib/db.php");
require_once($web_root_part."lib/function.php");

$ID = trim($_POST['id']);
$Page = trim($_POST['page']);
$Img = 0;

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
			$Img = 1;
		}
	}					
}

if($Img == 1){
	$sql="update pic set PClassID='".$PClassID."',PFileName='".$PFileName."',PUrl='".$PUrl."',Addtime='".$Addtime."' where ID=".$ID."";

}else{
	
	$sql="update pic set PClassID='".$PClassID."',PUrl='".$PUrl."',Addtime='".$Addtime."' where ID=".$ID."";

}

if( !($result = $db->sql_query($sql)) )
{
	  message_die(DB_MESSAGE, 'Could not query pic');
}

if ($Page > 1) {
	echo "<script>location.replace('pic.php?page=". $Page ."');</script>";	
}
else{
	echo "<script>location.replace('pic.php');</script>";	
}

?>