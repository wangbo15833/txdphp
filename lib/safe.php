<?php
$magic_quotes_gpc = get_magic_quotes_gpc();   
@extract(daddslashes($_COOKIE));   
@extract(daddslashes($_POST));   
@extract(daddslashes($_GET));   
if(!$magic_quotes_gpc) {   
	$_FILES = daddslashes($_FILES);   
}   
  
  
function daddslashes($string, $force = 0) {   
	if(!$GLOBALS['magic_quotes_gpc'] || $force) {   
		if(is_array($string)) {   
			foreach($string as $key => $val) {   
				$string[$key] = daddslashes($val, $force);   
			}   
	} else {   
			$string = addslashes($string);   
		}   
	}   
	return $string;   
}  
  
function saddslashes($string) {
	if(!MAGIC_QUOTES_GPC){
		if(is_array($string)) { //如果转义的是数组则对数组中的value进行递归转义 
			foreach($string as $key => $val) { 
				$string[$key] = saddslashes($val); 
			} 
		} else {
			$string = addslashes($string); //对单引号（'）、双引号（"）、反斜线（\）与 NUL（NULL 字符），进行转义 
		} 
		return $string; 
	}else{
		return $string;
	}
}