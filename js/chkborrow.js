function GetName(){

	var Name = document.getElementById('Name').value;
	if (Name==""){
		document.getElementById('DispName').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16">姓名不能为空';
		return false;
	}else{
		document.getElementById('DispName').innerHTML='';
		return true;
	}
}

//验证
function GetAmount(){
	var Amount = document.getElementById('Amount').value;
	if (Amount==""){
		document.getElementById('DispAmount').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16">数额不能为空';
		return false;
	}else{
		document.getElementById('DispAmount').innerHTML='';
		return true;
	}
}

//验证
function GetInterest(){
	var Interest = document.getElementById('Interest').value;
	if (Interest==""){
		document.getElementById('DispInterest').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16">利率不能为空';
		return false;
	}else{
		document.getElementById('DispInterest').innerHTML='';
		return true;
	}
}

//验证
function GetProvince(){
	var Province = document.getElementById('Province').value;
	if (Province=="0"){
		document.getElementById('DispProvince').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16">省份不能为空';
		return false;
	}else{
		document.getElementById('DispProvince').innerHTML='';
		return true;
	}
}

//验证
function GetCity(){
	var City = document.getElementById('City').value;
	if (City=="0"){
		document.getElementById('DispCity').innerHTML='<img src="images/icon_cross_sml.gif" width="16" height="16">城市不能为空';
		return false;
	}else{
		document.getElementById('DispCity').innerHTML='';
		return true;
	}
}

function borrow_sub(){
if (GetName()==false){
    return false;
}
if (GetAmount()==false){
    return false;
}
if (GetInterest()==false){
    return false;
}
if (GetProvince()==false){
    return false;
}
if (GetCity()==false){
    return false;
}
return true;
}