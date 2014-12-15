<?php
require_once("../../session.php");
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Image</title>
		<style type="text/css" rel="stylesheet">
			body {
				margin: 0;
				font:12px/1.5 "sans serif",tahoma,verdana,helvetica;
				background-color:#F0F0EE;
				color:#222222;
				overflow:hidden;
			}
			form {
				margin:0;
			}
			label {
				cursor:pointer;
			}
			#resetBtn {
				margin-left:10px;
				cursor:pointer;
			}
			.main {
				margin: 0 10px;
			}
			.clearfix:after {
				content: ".";
				display: block;
				height: 0;
				clear: both;
				visibility: hidden;
			}
			.tab-navi {
				width:98%;
				border-bottom:1px solid #A0A0A0;
				padding-left:5px;
				margin-bottom:10px;
				
			}
			.tab-navi ul  {
				list-style-image:none;
				list-style-position:outside;
				list-style-type:none;
				margin:0;
				padding:0;
			}
			.tab-navi li {
				position: relative;
				border: 1px solid #A0A0A0;
				background-color: #E0E0E0;
				margin: 0 2px -1px 0;
				padding: 0 20px;
				float: left;
				line-height: 25px;
				text-align: center;
				color: #555555;
				cursor: pointer;
			}
			.tab-navi li.selected {
				background-color: #F0F0EE;
				border-bottom: 1px solid #F0F0EE;
				color: #000000;
				cursor: default;
			}
			.tab-navi li.on {
				background-color: #F0F0EE;
				color: #000000;
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
			var fileManager = null;
			var allowUpload = (typeof KE.g[id].allowUpload == 'undefined') ? true : KE.g[id].allowUpload;
			var allowFileManager = (typeof KE.g[id].allowFileManager == 'undefined') ? false : KE.g[id].allowFileManager;
			var referMethod = (typeof KE.g[id].referMethod == 'undefined') ? '' : KE.g[id].referMethod;
			var imageUploadJson = (typeof KE.g[id].imageUploadJson == 'undefined') ? '/lib/upload_json.php' : KE.g[id].imageUploadJson;
			var lang = KE.lang.plugins.image;
			KE.event.ready(function() {
				var typeBox = KE.$('type', document);
				var urlBox = KE.$('url', document);
				var alignElements = document.getElementsByName('align');
				var fileBox = KE.$('imgFile', document);
				var widthBox = KE.$('imgWidth', document);
				var heightBox = KE.$('imgHeight', document);
				var titleBox = KE.$('imgTitle', document);
				var resetBtn = KE.$('resetBtn', document);
				var tabNavi = KE.$('tabNavi', document);
				var defaultImg = KE.$('defaultImg', document);
				var leftImg = KE.$('leftImg', document);
				var rightImg = KE.$('rightImg', document);
				var viewServer = KE.$('viewServer', document);
				var liList = tabNavi.getElementsByTagName('li');
				var selectTab = function(num) {
					if (num == 1) resetBtn.style.display = 'none';
					else resetBtn.style.display = '';
					widthBox.value = '';
					heightBox.value = '';
					titleBox.value = '';
					alignElements[0].checked = true;
					for (var i = 0, len = liList.length; i < len; i++) {
						var li = liList[i];
						if (i === num) {
							li.className = 'selected';
							li.onclick = null;
						} else {
							if (allowUpload) {
								li.className = '';
								li.onmouseover = function() { KE.addClass(this, 'on'); };
								li.onmouseout = function() { KE.removeClass(this, 'on'); };
								li.onclick = (function (i) {
									return function() {
										if (!fileManager) selectTab(i);
									};
								})(i);
							} else {
								li.parentNode.removeChild(li);
							}
						}
						KE.$('tab' + (i + 1), document).style.display = 'none';
					}
					typeBox.value = num + 1;
					KE.$('tab' + (num + 1), document).style.display = '';
				}
				if (!allowFileManager) {
					viewServer.parentNode.removeChild(viewServer);
					urlBox.style.width = '300px';
				}
				selectTab(0);
				var imgNode = KE.plugin['image'].getSelectedNode(id);
				if (imgNode) {
					var tempDiv = KE.$$('div', KE.g[id].iframeDoc);
					tempDiv.appendChild(imgNode.cloneNode(false));
					var imgHtml = tempDiv.innerHTML;
					var src = imgNode.src;
					if (imgHtml.match(/kesrc="([^"]+)"/i)) src = RegExp.$1;
					urlBox.value = src;
					widthBox.value = imgNode.width;
					heightBox.value = imgNode.height;
					titleBox.value = (typeof imgNode.alt != 'undefined') ? imgNode.alt : imgNode.title;
					for (var i = 0, len = alignElements.length; i < len; i++) {
						if (alignElements[i].value == imgNode.align) {
							alignElements[i].checked = true;
							break;
						}
					}
				}
				KE.event.add(viewServer, 'click', function () {
					if (fileManager) return false;
					fileManager = new KE.dialog({
						id : id,
						cmd : 'file_manager',
						file : 'file_manager/file_manager.html?id=' + id + '&ver=' + KE.version,
						width : 500,
						height : 400,
						loadingMode : true,
						title : KE.lang.fileManager,
						noButton : KE.lang.no,
						afterHide : function() {
							fileManager = null;
						}
					});
					fileManager.show();
				});
				KE.$('uploadForm', document).action = imageUploadJson;
				KE.$('referMethod', document).value = referMethod;
				var alignIds = ['default', 'left', 'right'];
				for (var i = 0, len = alignIds.length; i < len; i++) {
					KE.event.add(KE.$(alignIds[i] + 'Img', document), 'click', (function(i) {
						return function() {
							KE.$(alignIds[i] + 'Chk', document).checked = true;
						};
					})(i));
				}
				KE.event.add(resetBtn, 'click', function() {
					var g = KE.g[id];
					var img = KE.$$('img', g.iframeDoc);
					img.src = urlBox.value;
					img.style.position = 'absolute';
					img.style.visibility = 'hidden';
					img.style.top = '0px';
					img.style.left = '1000px';
					g.iframeDoc.body.appendChild(img);
					widthBox.value = img.width;
					heightBox.value = img.height;
					g.iframeDoc.body.removeChild(img);
				});
				KE.util.pluginLang('image', document);
				viewServer.value = lang.viewServer;
				resetBtn.alt = resetBtn.title = lang.resetSize;
				defaultImg.alt = defaultImg.title = lang.defaultAlign;
				leftImg.alt = leftImg.title = lang.leftAlign;
				rightImg.alt = rightImg.title = lang.rightAlign;
				KE.util.hideLoadingPage(id);
			}, window, document);
		</script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>
		<div class="main">
			<div id="tabNavi" class="tab-navi">
				<ul class="clearfix">
					<li><span id="lang.remoteImage"></span></li>
					<li><span id="lang.localImage"></span></li>
				</ul>
			</div>
			<iframe name="uploadIframe" id="uploadIframe" style="display:none;"></iframe>
			<input type="hidden" id="type" name="type" value="" />
			<form id="uploadForm" name="uploadForm" method="post" enctype="multipart/form-data" target="uploadIframe">
				<input type="hidden" id="editorId" name="id" value="" />
				<input type="hidden" id="referMethod" name="referMethod" value="" />
				<input type="hidden" name="imgBorder" value="0" />
				<ul class="table">
					<li>
						<div id="tab1" style="display:none;">
							<label for="url"><span id="lang.remoteUrl"></span></label>&nbsp;
							<input type="text" id="url" name="url" value="http://" maxlength="255" style="width:230px;" />
							<input type="button" id="viewServer" name="viewServer" value="" />
						</div>
						<div id="tab2" style="display:none;">
							<label for="imgFile"><span id="lang.localUrl"></span></label>&nbsp;
							<input type="file" id="imgFile" name="imgFile" style="width:300px;" />
						</div>
					</li>
					<li>
						<label for="imgWidth"><span id="lang.size"></span></label>&nbsp;
						<span id="lang.width"></span> <input type="text" id="imgWidth" name="imgWidth" value="" maxlength="4" style="width:50px;text-align:right;" />
						<span id="lang.height"></span> <input type="text" id="imgHeight" name="imgHeight" value="" maxlength="4" style="width:50px;text-align:right;" />
						<img src="./images/refresh.gif" width="16" height="16" id="resetBtn" alt="" title="" />
					</li>
					<li>
						<label><span id="lang.align"></span></label>&nbsp;
						<input type="radio" id="defaultChk" name="align" value="" checked="checked" /> <img id="defaultImg" src="./images/align_top.gif" width="23" height="25" border="0" alt="" title="" />
						<input type="radio" id="leftChk" name="align" value="left" /> <img id="leftImg" src="./images/align_left.gif" width="23" height="25" border="0" alt="" title="" />
						<input type="radio" id="rightChk" name="align" value="right" /> <img id="rightImg" src="./images/align_right.gif" width="23" height="25" border="0" alt="" title="" />
					</li>
					<li>
						<label for="imgTitle"><span id="lang.imgTitle"></span></label>
						<input type="text" id="imgTitle" name="imgTitle" value="" maxlength="255" style="width:95%;" />
					</li>
				</ul>
			</form>
		</div>
	</body>
</html>
