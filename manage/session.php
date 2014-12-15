<?php
//.....判断用户是否登陆......

session_start();
//session_register("AdminID");
//session_register("LoginIP");
//session_register("LoginTime");

if($_SESSION['AdminID'] == "")
{
	
	echo "<script>location.replace('index.php');</script>";
	
}

if($_SESSION['LoginIP'] != $_SERVER['REMOTE_ADDR']){
	
	echo "<script>location.replace('index.php');</script>";
	
}
  
?>