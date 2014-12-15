<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

require_once("session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>拓信贷网站后台管理系统</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<frameset rows="90,*,30" cols="*" framespacing="0" frameborder="no" border="0">
  <frame src="top.php" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" />
  <frame src="main.php" name="mainFrame" id="mainFrame" />
  <frame src="bottom.php" name="bottomFrame" scrolling="No" noresize="noresize" id="bottomFrame" />
</frameset><noframes></noframes>
<body>
</body>
</html>