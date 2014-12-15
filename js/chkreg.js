function GetUserID(){

	var UserID = document.getElementById('UserID').value;
	if (UserID==""){
		document.getElementById('DispUserID').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16">';
		return false;
	}else{
		document.getElementById('DispUserID').innerHTML='';
		return true;
	}
}

//验证
function GetEMail(){
	var EMail = document.getElementById('EMail').value;
	if (EMail==""){
		document.getElementById('DispEMail').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16">';
		return false;
	}else{
		document.getElementById('DispEMail').innerHTML='';
		return true;
	}
}

//验证
function GetContent(){
	var Content = document.getElementById('Content').value;
	if (Content==""){
		document.getElementById('DispContent').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16">';
		return false;
	}else{
		document.getElementById('DispContent').innerHTML='';
		return true;
	}
}

function chkreg(){
if (GetUserID()==false){
    return false;
}
if (GetEMail()==false){
    return false;
}
if (GetContent()==false){
    return false;
}
return true;
}