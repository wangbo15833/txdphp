<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

require_once("session.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="css/cp.css" type="text/css">
<link rel="stylesheet" href="css/leftmenu.css" type="text/css">
<style type="text/css">
body {
	background-color: #F7F7F7;
}
</style>
</head>
<body scroll="no">
<div class="leftmenu_top"><img src="images/gncd.gif" width="164" height="30"></div>
<div class="leftmenu">
	<div class="lmenua" id="treePic1">公司管理</div>
	<div id="LM1">
	  	<div class="lmenud"><a href="doc.php" target="I2" class="lmenu">公司文档</a></div>
  </div>
  
  <div class="lmenua" id="treePic1">新闻管理</div>
	<div id="LM1">
	  	<div class="lmenud"><a href="news.php" target="I2" class="lmenu">新闻列表</a></div>
  </div>
  <div class="lmenua" id="treePic2">展示管理</div>
	<div id="LM2">
	  	<div class="lmenud"><a href="pclass.php" target="I2" class="lmenu">展示类别</a></div>
        <div class="lmenud"><a href="pic.php" target="I2" class="lmenu">展示列表</a></div>
  </div>
  <div class="lmenua" id="treePic6">管理员管理</div>
  <div id="LM6">
  		<div class="lmenud"><a href="admin.php" target="I2" class="lmenu">管理员管理</a></div>
  </div>
</div>
</body>
</html>