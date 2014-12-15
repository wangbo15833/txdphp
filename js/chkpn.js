function GetKey(){

	var Key = document.getElementById('Key').value;
	if (Key==""){
		document.getElementById('DispKey').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16">';
		return false;
	}else{
		document.getElementById('DispKey').innerHTML='';
		return true;
	}
}

function chkpnd(){
if (GetKey()==false){
    return false;
}
return true;
}