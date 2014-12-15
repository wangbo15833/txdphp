<?php
class sql_db
{

	var $db_connect_id;
	var $query_result;
	var $rows = array();
	
	function sql_db($sqlserver, $sqluser, $sqlpassword, $database)
	{
		$this->dbname = $database;
		$this->user = $sqluser;
		$this->password = $sqlpassword;
		$this->server = $sqlserver;
		
		$this->db_connect_id = mysql_connect($this->server, $this->user, $this->password);
		
		if( $this->db_connect_id )
		{
			if( $database != "" )
			{
				$this->dbname = $database;
				$dbselect = mysql_select_db($this->dbname);

				if( !$dbselect )
				{
					mysql_close($this->db_connect_id);
					$this->db_connect_id = $dbselect;
				}
			}

			return $this->db_connect_id;
		}
		else
		{
			return false;
		}
	}
	
	function sql_close()
	{
		if( $this->db_connect_id )
		{
			return mysql_close($this->db_connect_id);
		}
		else
		{
			return false;
		}
	}
	
	function sql_query($query = "")
	{
		unset($this->query_result);

		if( $query != "" )
		{
			$this->query_result = mysql_query($query, $this->db_connect_id);
		}
		
		return ( $this->query_result ) ? $this->query_result : false;
	}
	
	function sql_fetchrow($query_id = 0)
	{
		if( !$query_id )
		{
			$query_id = $this->query_result;
		}

		if( $query_id )
		{
			$this->rows = mysql_fetch_array($query_id, MYSQL_ASSOC);
			return $this->rows;
		}
		else
		{
			return false;
		}
	}
	
	function sql_numrows($query_id = 0)
	{
		if( !$query_id )
		{
			$query_id = $this->query_result;
		}

		return ( $query_id ) ? mysql_num_rows($query_id) : false;
	}
	
	function sql_nextid()
	{
		return ( $this->db_connect_id ) ? mysql_insert_id($this->db_connect_id) : false;
	}
	
	function sql_freeresult($query_id = 0)
	{
		if( !$query_id )
		{
			$query_id = $this->query_result;
		}

		if ( $query_id )
		{
			unset($this->rows);
			mysql_free_result($query_id);

			return true;
		}
		else
		{
			return false;
		}
	}

	function sql_error()
	{
		$result['message'] = mysql_error($this->db_connect_id);
		$result['code'] = mysql_errno($this->db_connect_id);

		return $result;
	}
}
?>