//我佛山人@05.08.20
String.prototype.Format = function(){
	var tmpStr = this;
	var iLen = arguments.length;
	for(var i=0;i<iLen;i++){
		tmpStr = tmpStr.replace(new RegExp("\\{" + i + "\\}", "g"), arguments[i]);
	}
	return tmpStr;
}
SoftKeyboard = {
	//region Property
	curCapture					 : null,
	curPosX						 : 0,
	curPosY						 : 0,
	capsLock					 : false,
	background				 : "images/keyboard.jpg",
	//region Process
	Display :
		function(captureObj, e){
			captureObj = typeof(captureObj) == "object" ? captureObj : document.getElementById(captureObj);
			if(window.event){
				SoftKeyboard.curPosX = document.body.scrollLeft + event.x;
				SoftKeyboard.curPosY = document.body.scrollTop + event.y;
				with(captureObj){
					detachEvent("onfocus", SoftKeyboard.ActiveText);
					detachEvent("onchange", SoftKeyboard.ActiveText);
					detachEvent("onkeypress", SoftKeyboard.ActiveText);
					attachEvent("onfocus", SoftKeyboard.ActiveText);
					attachEvent("onchange", SoftKeyboard.ActiveText);
					attachEvent("onkeypress", SoftKeyboard.ActiveText);
				}
			}
			else{
				SoftKeyboard.curPosX = e.pageX;
				SoftKeyboard.curPosY = e.pageY;
			}
			with(SoftKeyboard.Container()){
				if(captureObj != SoftKeyboard.curCapture) {
					SoftKeyboard.curCapture = captureObj;
					if(style.display == "block"){
						style.left = SoftKeyboard.curPosX + "px";
						style.top = SoftKeyboard.curPosY + "px";
					}
					else SoftKeyboard.Load();
				}
				else{
					if (style.display == "block") style.display = "none";
					else SoftKeyboard.Load();
				}
			}
		},
	Load :
		function(){
			var lowerStr = "58,60,26,6,11,13,14,16,17,18,19,20,21,22,23,24,15,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,63,12,28,59".split(",");
			var upperStr = "90,92,25,1,27,29,30,0,31,2,3,4,61,5,9,7,8,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,93,62,10,91".split(",");
			var len = lowerStr.length;
			var pos = Math.random() * len | 0;
			lowerStr = lowerStr.slice(pos).concat(lowerStr.slice(0,pos));
			upperStr = upperStr.slice(pos).concat(upperStr.slice(0, pos));
			var strHtml = "";
			SoftKeyboard.capsLock = false;
			for(var i=0; i<len; i++){
				var key = new SoftKeyboard.Key();
				with(key){
					lower = lowerStr[i]|0;
					upper = upperStr[i]|0;
					value = String.fromCharCode(lower + 33);
				}
				strHtml += key;
				if ((i + 1) % 12 == 0) strHtml += "";
			}
			strHtml += "<br />"  + new SoftKeyboard.SpaceKey() + new SoftKeyboard.ShiftKey() + new SoftKeyboard.BackSpaceKey() + new SoftKeyboard.EnterKey();
			with(SoftKeyboard.Container()){
				innerHTML = strHtml;
				style.left = SoftKeyboard.curPosX + "px";
				style.top = SoftKeyboard.curPosY + "px";
				style.display = {"block":"none", "none":"block"}[style.display];
			}
		},
	
	//region Class
	Key :
		function (){
			this.background = "";
			this.width = 20;
			this.height = 24;
			this.lower = "";
			this.upper = "";
			this.value = "";
			this.action = "SoftKeyboard.sendKey(this)";
			this.toString = function(){
				return '<input type="button" style="width:{1}px;height:{2}px;margin:1px;background-color:transparent;color:#304290;border:0;font:bold 11px Tahoma;text-align:center;line-height:24px;" lower="{3}" upper="{4}" onclick="{6}" onmouseover="this.style.color=\'#FFF\'" onmouseout="this.style.color=\'#304290\'" value="{5}" />'.Format(this.background, this.width, this.height, this.lower, this.upper, this.value, this.action);
			}
		},
	SpaceKey :
		function(){
			this.Super = SoftKeyboard.Key;
			this.Super();
			this.width = 80;
			this.lower = -1;
			this.upper = -1;
			this.value = "Space";
		},
	ShiftKey :
		function(){
			this.Super = SoftKeyboard.Key;
			this.Super();
			this.width = 46;
			this.value = "Shift"
			this.action = "SoftKeyboard.doShift()";
		},
	BackSpaceKey :
		function(){
			this.Super = SoftKeyboard.Key;
			this.Super();
			this.width = 85;
			this.value = "BackSpace";
			this.action = "SoftKeyboard.doBackSpace()";
		},
	EnterKey :
		function(){
			this.Super = SoftKeyboard.Key;
			this.Super();
			this.width = 47;
			this.value = "Enter"
			this.action = "SoftKeyboard.doEnter";
		},
	//region Event Handler
	sendKey :
		function(keyObj){
			SoftKeyboard.setCaptureValue(String.fromCharCode(keyObj.getAttribute(SoftKeyboard.capsLock ? "upper" : "lower") * 1 + 33));
		},
	doBackSpace :
		function(){
			with(SoftKeyboard.curCapture){
				if(document.all){
					if(getAttribute("curPos")) {
						var rng = getAttribute("curPos");
						if(rng.text.length == 0) rng.moveStart("character", -1);
						rng.text = "";
					} else {value = value.slice(0, -1);}
				} else {
					var iStart = selectionStart;
					var iLen = selectionEnd - iStart;
					if(iLen > 0){
						SoftKeyboard.setCaptureValue("");
						setSelectionRange(iStart, iStart); 
					} else {
						value = value.substring(0, iStart-1) + value.substr(selectionEnd); 
						setSelectionRange(iStart - 1, iStart - 1); 
					}
					focus();
				}
			}
		},
	doShift :
		function(){
			SoftKeyboard.capsLock = ! SoftKeyboard.capsLock;
			var keyAtt = "lower";
			if(SoftKeyboard.capsLock)  keyAtt = "upper";
			var obj = SoftKeyboard.Container().childNodes;
			for(var i=0, j=0; j<47; i++){
				if(obj[i].tagName == "INPUT"){
					obj[i].value = String.fromCharCode(parseInt(obj[i].getAttribute(keyAtt)) + 33);
					j++;
				}
			}
		},
	doEnter :
		function(){
		},
	setCaptureValue :
		function(val){
			with(SoftKeyboard.curCapture){
			   if (document.all) {
					if(getAttribute("curPos")) getAttribute("curPos").text = val;
					else {	value += val;}
			   } else { 
					var iStart = selectionStart;
					value = value.substring(0, iStart) + val + value.substring(selectionEnd, value.length); 
					setSelectionRange(iStart + 1, iStart + 1); 
				   focus(); 
			   } 
		   }
		},
	//region Other...
	Container :
		function(){
			var _container = document.getElementById("__softKey");
			if(!_container){
				_container = document.createElement("DIV");
				_container.id = "__softKey";
				_container.style.cssText = "position:absolute;display:none;width:273px;height:161px;background:url({0}) no-repeat;padding:5px 0 0 5px;text-align:left".Format(SoftKeyboard.background);
				document.body.appendChild(_container);
			}
			return _container;
		},
	ActiveText :
		function() {
			window.status = Math.random();
			if(document.all) event.srcElement.curPos = document.selection.createRange().duplicate();
		},
	toString : function(){return ["Soft Keyboard v1.0", "author:", "email:", "version:1.0"].join("\n");}
}