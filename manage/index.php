<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>拓信贷网站管理后台 - 登录页</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<Script language = "JavaScript1.2" src="js/chkadmin.js"></Script>
<script language="JavaScript" src="js/softkeyboard.js"></script>
</head>
<body>
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#f1f1f1">
  <tr>
    <td height="100%" align="center" valign="middle">
    	<div id="warp_bg">
    <div id="warp_login">
            	<div id="warp_logo"><img src="images/logo.png" width="265" height="137" /></div>  	            	
            	<div id="warp_dl">
                <form action="chklogin.php" method="post" name="login" id="login" onSubmit="return chklogin();">
               	  <div class="dl_inp"><div class="dl_wz">用户名：</div><input name="AdminID" type="text" class="inps" size="30" id="AdminID"><div class="dl_Disp" id="dl_AdminID"></div></div>
                  <div class="dl_inp"><div class="dl_wz">密　码：</div><input name="PassWord" type="password" class="inps" size="30" id="PassWord"><div class="dl_rand_Disp"><a href="#1" onClick="SoftKeyboard.Display('PassWord', event)"><img src="images/keyboards.gif" width="20" height="15" border="0"></a></div><div class="dl_Disp" id="dl_PassWord"></div></div>
                  <div class="dl_inp"><div class="dl_wz">验证码：</div><input name="Rand" type="text" class="inp" id="Rand" size="10" maxlength="4"><div class="dl_rand"><img style="cursor:pointer" title="刷新验证码" id="refresh" border='0' src='../lib/code.php' onClick="document.getElementById('refresh').src='../lib/code.php?t='+Math.random()"/></div><div class="dl_Disp" id="dl_Rand"></div></div>
                  <div class="dl_inp"><input name="" type="submit" value="提 交" class="sunmit"> <input name="" type="reset" value="重 填" class="sunmit"></div>
              </form>    
            </div>
          </div>
          <div id="warp_bq">Copyright © 2013 拓信贷版权所有 All rights reserved.</div>
        </div>
    </td>
  </tr>
</table>
</body>
</html>
