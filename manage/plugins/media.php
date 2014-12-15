<?php
require_once("../session.php");
?>
<!doctype html>
<html>
	<head>
		<meta charset="gb2312" />
		<title>Media</title>
		<style type="text/css" rel="stylesheet">
			body {
				margin: 0;
				font:12px/1.5 "sans serif",tahoma,verdana,helvetica;
				background-color:#F0F0EE;
				color:#222222;
				overflow:hidden;
			}
			label {
				cursor:pointer;
			}
			.main {
				margin: 0 10px;
			}
			.table  {
				list-style-image:none;
				list-style-position:outside;
				list-style-type:none;
				margin:0;
				padding:0;
				display:block;
			}
			.table li {
				padding:0;
				margin-bottom:10px;
				display:list-item;
				line-height:1.5;
			}
			.table li label {
				font-weight:bold;
			}
			.table li input {
				vertical-align:middle;
			}
			.table li img {
				vertical-align:middle;
			}
		</style>
		<script type="text/javascript">
			var KE = parent.KindEditor;
			location.href.match(/\?id=([\w-]+)/i);
			var id = RegExp.$1;
			KE.event.ready(function() {
				KE.util.pluginLang('media', document);
				KE.util.hideLoadingPage(id);
			}, window, document);
		</script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>
	  <div class="main">
			<ul class="table">
				<li>
					<label for="url"><span id="lang.url"></span></label>
					<input type="text" id="url" name="url" value="http://" maxlength="255" style="width:90%;" />
				</li>
				<li>
					<label for="width"><span id="lang.width"></span></label>&nbsp;
					<input type="text" id="width" name="width" value="550" maxlength="4" style="width:50px;text-align:right;" /> px
				</li>
				<li>
					<label for="height"><span id="lang.height"></span></label>&nbsp;
					<input type="text" id="height" name="height" value="400" maxlength="4" style="width:50px;text-align:right;" /> px
				</li>
				<li>
					<label for="autostart"><span id="lang.autostart"></span></label>&nbsp;
					<input type="checkbox" id="autostart" name="autostart" value="1" />
				</li>
			</ul>
		</div>
	</body>
</html>
