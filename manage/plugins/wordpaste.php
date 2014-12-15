<?php
require_once("../session.php");
?>
<!doctype html>
<html>
	<head>
		<meta charset="gb2312" />
		<title>WordPaste</title>
		<style type="text/css" rel="stylesheet">
			body {
				margin: 0;
				font:12px/1 "sans serif",tahoma,verdana,helvetica;
				background-color:#F0F0EE;
				color:#222222;
				text-align:center;
			}
			#wordIframe {
				width:98%;
				height:260px;
				border:1px solid #222222;
			}
			.comment {
				margin-bottom: 10px;
				text-align: left;
			}
		</style>
		<script type="text/javascript">
			var KE = parent.KindEditor;
			location.href.match(/\?id=([\w-]+)/i);
			var id = RegExp.$1;
			KE.event.ready(function() {
				var iframe = KE.$('wordIframe', document);
				var iframeDoc = KE.util.getIframeDoc(iframe);
				iframeDoc.open();
				iframeDoc.write('<html><head><title>WordPaste</title></head>');
				iframeDoc.write('<body style="background-color:#FFFFFF;font-size:12px;margin:2px;" />');
				if (!KE.browser.IE) iframeDoc.write('<br />');
				iframeDoc.write('</body></html>');
				iframeDoc.close();
				KE.util.pluginLang('wordpaste', document);
				KE.util.hideLoadingPage(id);
				window.setTimeout(function() {
					if (KE.browser.IE) iframeDoc.body.contentEditable = 'true';
					else iframeDoc.designMode = 'on';
				}, 0);
			}, window, document);
		</script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>
		<div class="comment"><span id="lang.comment"></span></div>
		<iframe id="wordIframe" name="wordIframe" frameBorder="0"></iframe>
	</body>
</html>
