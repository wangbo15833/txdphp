<?php
session_start();
header('Content-type:text/html;charset=utf-8');

$_SESSION['AdminID'] = "";
$_SESSION['LoginIP'] = "";
$_SESSION['LoginTime'] = "";

echo "<script>alert('提示：退出成功,欢迎您再次登录!');location.replace('index.php');</script>";

?>
