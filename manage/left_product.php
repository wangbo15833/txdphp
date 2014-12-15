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
    <div class="lmenua" id="treePic1">借款管理</div>
	<div id="LM1">
        <div class="lmenud"><a href="borrow.php" target="I2" class="lmenu">借款列表</a></div>
  </div>
      <div class="lmenua" id="treePic1">放款管理</div>
	<div id="LM1">
        <div class="lmenud"><a href="lend.php" target="I2" class="lmenu">放款列表</a></div>
  </div>
    <div class="lmenua" id="treePic1">会员管理</div>
	<div id="LM1">
	  	<div class="lmenud"><a href="uclass.php" target="I2" class="lmenu">会员类别</a></div>
        <div class="lmenud"><a href="user.php" target="I2" class="lmenu">会员列表</a></div>
  </div>

</body>
</html>