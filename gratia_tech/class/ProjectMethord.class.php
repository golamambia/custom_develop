<?php
error_reporting(0); 

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
ALL PROJECT SMALL THING METHORD
==========================================================================================================
*/

class PM {
	
	public $dbObject;
	public $randString;
	public $persentage;
	
/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
CONSTRUCTURE
==========================================================================================================
*/	

public function PM($dbObject)
{
	$this->dbObject = $dbObject;
}	

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
public function getStatusValue($value='')
{
	if($value == 'Active'){
	$text = '<strong style="color:green">Active</strong>';	
	}else if($value == 'Inactive'){
	$text = '<strong style="color:red">Inactive</strong>';		
	}
	return $text;	
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
public function isRead($value='')
{
	if($value == 1){
	$text = '<strong style="color:green">Read</strong>';	
	}else if($value == 0){
	$text = '<strong style="color:red">Not Read</strong>';		
	}
	return $text;	
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
public function calculatePersentage($value='',$persentVal='')
{
	$perSent = ($value*$persentVal)/100;
	return $perSent;	
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
public function getTableDetails($tableName='',$matchFild='',$value='')
{
	$sql = "SELECT * FROM ".$tableName." WHERE $matchFild = '".$value."'";
	$res = $this->dbObject->selectData($sql);
	return $row_rec = $this->dbObject->getRow($res);	
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
public function generateCode($length="")
{
	 $_rand_src = array(array(48,57), array(97,122) );
	 srand ((double) microtime() * 1000000);
	 $random_string = "";
	 for($i=0;$i<$length;$i++){
	 $i1=rand(0,sizeof($_rand_src)-1);
	 $random_string .= chr(rand($_rand_src[$i1][0],$_rand_src[$i1][1]));
	 }
	 return strtoupper(substr($random_string,0,19));
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
public function token()
{

	$sql_code = "SELECT * FROM ".TBL_USER." ORDER BY user_id DESC";
	$numrows = $this->dbObject->countRows($sql_code);
	if($numrows == 0){
	$i = "CSM-0001";
	}else{
	$res_code = $this->dbObject->selectData($sql_code);
	$row_code = $this->dbObject->getRow($res_code);
	$code = $row_code['token_id'];
	$code_value = explode("-",$code);
	$temp = $code_value[1]+1;
	$addition = sprintf('%04d',$temp);
	$i = $code_value[0]."-".$addition;
	}
	return $i;
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
public function countData($table_name)
{
	$sql_code = "SELECT * FROM ".$table_name;
	$numrows = $this->dbObject->countRows($sql_code);
	return $numrows;
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/

public function getSetting($id=1)
{
	$sql_code = "SELECT * FROM ".DTABLE_SETTING." WHERE id='".$id."'";
	$res = $this->dbObject->selectData($sql_code);
	$row_rec = $this->dbObject->getRow($res);
	return $row_rec;
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
GET THE IP ADDRESS 
==========================================================================================================
*/

/*------------------------------------------------------------------------------- */
// Get Ip Address
/*------------------------------------------------------------------------------- */
// ONLY Get Ip Address
public function onlyGetIp()
{
	
	if (!empty($_SERVER["HTTP_CLIENT_IP"])){
	//check for ip from share internet
	$this->randString = $_SERVER["HTTP_CLIENT_IP"];
	}
	elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
	// Check for the Proxy User
	$this->randString = $_SERVER["HTTP_X_FORWARDED_FOR"];
	}
	else{
	$this->randString = $_SERVER["REMOTE_ADDR"];
	}
	
	return $this->randString;
}
/*------------------------------------------------------------------------------- */
// ONLY Get Ip Address

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/

//END
}	
?>