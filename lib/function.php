<?php
//date_default_timezone_set('PRC');
define('TXT_MESSAGE','TXT_MESSAGE');
define('DB_MESSAGE','DB_MESSAGE');

function message_die($msg_type,$msg_code = '')
{
	global $db;
	
	$error_txt = '';
	
	switch($msg_type)
	{
		case TXT_MESSAGE:
			$error_txt .= $msg_code;
			break;
		
		case DB_MESSAGE:
			$sql_error = $db->sql_error();
			
			if ( $sql_error['message'] != '' )
			{
				$error_txt .= '<br /><br />SQL Error : ' . $sql_error['code'] . ' ' . $sql_error['message'];
			}
			$error_txt .= '<br />'.$msg_code;
			break;
		
		default:
			$error_txt .= $msg_code;
			break;
	}
	
	die("<html>\n<body>\n" . $error_txt . "</body>\n</html>");
}

function random($length) {
 $hash = '';
 $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
 $max = strlen($chars) - 1;
 mt_srand((double)microtime() * 1000000);
 for($i = 0; $i < $length; $i++) {
  $hash .= $chars[mt_rand(0, $max)];
 }
 return $hash;
}
?>