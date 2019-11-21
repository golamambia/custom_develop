<?php
/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
THE DB HANDLER CLASS FILE AND THIS IS THE MAIN FILE CURED FOR ALL OVER THE PROJECT
==========================================================================================================
*/
class DbHandler
{
	public $error;         
	public $query;         
	public $host;
	public $user;
	public $pass;
	public $db;  
	public $link;

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
	
public function DbHandler()
{
	$this->host = DB_HOST;
	$this->user = DB_USER;
	$this->pass = DB_PASSWORD;
	$this->db = DB_NAME;
	$this->connect();
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/


public function connect($host='', $user='', $pass='', $db='', $persistant=false) 
{
	if (!empty($host)) $this->host = $host; 
	if (!empty($user)) $this->user = $user; 
	if (!empty($pass)) $this->pass = $pass; 
	if ($persistant) 
		$this->link = mysql_pconnect($this->host, $this->user, $this->pass);
	else 
		$this->link = mysql_connect($this->host, $this->user, $this->pass);
	if (!$this->link) 
	{
	$this->error = mysql_error();
	return false;
	} 
	if (!$this->dbSelect($db)) return false;
	return true;  
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/

public function dbSelect($db='')
{
	if (!empty($db)) $this->db = $db; 
	if (!mysql_select_db($this->db)) 
	{
	$this->error = mysql_error();
	return false;
	}
	return true;
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/

public function selectData($sql) 
{
	$this->query = $sql;
	$result = mysql_query($this->query);
	if(!is_resource($result))
	{
	$this->error = mysql_error();
	return false;
	}
	return $result;
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/

public function getRow($result) 
{
	@$row = mysql_fetch_array($result); 
	if (!$row) return false;
	foreach ($row as $key => $value) 
	{
	$row[$key] = $value;
	}
	return $row;
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/

public function getRow1($result) 
{
	@$row = mysql_fetch_row($result); 
	if (!$row) return false;
	foreach ($row as $key => $value) 
	{
	$row[$key] = $value;
	}
	return $row;
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/

public function insertSql($sql) 
{
	$this->query = $sql;
	$result = mysql_query($sql);
	if (!$result) 
	{
	$this->error = mysql_error();
	return false;
	}
	$id = mysql_insert_id();
	if ($id == 0) return true;
	else return $id; 
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/

public function updateSql($sql) 
{
	$this->query = $sql;
	$result = mysql_query($sql);
	if (!$result) 
	{
	$this->error = mysql_error();
	return false;
	}
	$rows = mysql_affected_rows();
	if ($rows == 0) return true; 
	else return $rows;
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/

public function getField($table)
{
	$field_list = array();
	$fields = mysql_list_fields($this->db, $table);
	$columns = mysql_num_fields($fields);
	for ($i = 0; $i < $columns; $i++) {
		$field_list[$i] =  mysql_field_name($fields, $i) . "\n";
	}
	return $field_list;
}	

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/

public function getFormValue($table, $request)
{
	$field_list = $this->getField($table);
	foreach($request as $key => $value)
	{
	foreach($field_list as $field => $name)
	{
	if(strtolower(trim($key))==strtolower(trim($name)))
	{
	$data[$key] = $value;
	break;
	}
	}
	}
	return $data;
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/

public function insertDataArray($table, $request) 
{
	$data = $this->getFormValue($table, $request);
	$cols = '(';
	$values = '(';
	foreach ($data as $key=>$value) 
	{     
	$value = mysql_real_escape_string($value);
	$cols .= "$key,";  
	$values .= "'$value',";  
	}
	$cols = rtrim($cols, ',').')';
	$values = rtrim($values, ',').')';     
	$sql = "INSERT INTO $table $cols VALUES $values";
	return $this->insertSql($sql);
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/

public function updateArray($table, $request, $condition) 
{
	$data = $this->getFormValue($table, $request);
	$sql = "UPDATE $table SET";
	foreach ($data as $key=>$value) 
	{    
	$value = mysql_real_escape_string($value);
	$sql .= " $key=";  
	$sql .= "'$value',";
	}
	$sql = rtrim($sql, ','); 
	if (!empty($condition))  $sql .= " WHERE $condition";
	return $this->updateSql($sql);
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/

public function deleteData($table, $condition) 
{
	$sql = "Delete from $table ";
	if (!empty($condition)) $sql .= " WHERE $condition";
	return $this->updateSql($sql);
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/

public function deleteAllData($table) 
{
	$sql = "Delete from $table ";
	return $this->updateSql($sql);
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/

public function countRows($sql)
{
  $this->query=$sql;
  $result= mysql_query($this->query);
  $num_rows = mysql_num_rows($result);
  return $num_rows ;
}

//END CLASS
} 
?>