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
<script type="text/javascript" src="js/loadframes.js" ></script>  
</head>
<body scroll="no">
<div class="mtbg">
  <div class="mtlogo"><img src="images/slogo.png" width="396" height="89"></div>  
  <div class="mt_list">
  	 <div class="mt_list_top">
     <div class="mt_list_js"><img src="images/dl.gif" width="16" height="16">当前用户：<?php echo $_SESSION['AdminID']?> 角色：管理员</div>
     <div class="mt_list_gn">
   	      <img src="images/home.gif" width="14" height="14" /><a href="manage.php" target="_parent" class="ma_main">首页</a>
          <img src="images/back.gif" width="14" height="14" /><a href="javascript:history.go(-1);" class="ma_main">后退</a>
          <img src="images/next.gif" width="14" height="14" /><a href="javascript:history.go(1);" class="ma_main">前进</a>
          <img src="images/xx.gif" width="14" height="14" /><a href="javascript:history.go(0);" class="ma_main">刷新</a>
          <img src="images/out.gif" width="14" height="14" /><a href="out.php" target="_parent" class="ma_main">退出</a>
        </div>
     </div>
     <div class="mt_list_bottom">
     	<ul>
        	<li><a href="top_log.php" target="_self" onClick="loadFrames_log();">日志管理</a></li>
            <li><a href="top_product.php" target="_self" onClick="loadFrames_product();">信贷管理</a></li>
            <li id="sele">管理首页</li>
        </ul>
     </div>
  </div>
</div>
</body>
</html>