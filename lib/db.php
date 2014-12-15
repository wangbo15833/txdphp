<?php
	
include('mysql4.php');
// Make the database connection.
$db = new sql_db('localhost', 'root','root', 'tuoxindai');

if(!$db->db_connect_id)
{
   message_die(DB_MESSAGE, "Could not connect to the database");
}
mysql_query("SET NAMES utf8");
//mysql_query("SET NAMES GB2312");
?>