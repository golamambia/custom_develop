<?php 
class GeneralFunction {
	public $dbObject;
	public $pagesCheckLogin;
	public $pagesAvoidCheckLogin;

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/	
public function GeneralFunction($dbObject, $pagesCheckLogin=array(), $pagesAvoidCheckLogin=array())
{
$this->dbObject = $dbObject;
$this->pagesCheckLogin = $pagesCheckLogin;
$this->pagesAvoidCheckLogin = $pagesAvoidCheckLogin;
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
public function adminLogingChacker(){
	if(((!isset($_SESSION['ADMIN']['id'])) && ($_SESSION['ADMIN']['id'] == "")) and ((!isset($_SESSION['USER']['id'])) && ($_SESSION['USER']['id'] == ""))){ 
	$this->reDirect("../admin/?logout"); 
	}	
}
public function adminLogingChacker2(){
	if(((!isset($_SESSION['ADMIN']['id'])) && ($_SESSION['ADMIN']['id'] == "")) and ((!isset($_SESSION['USER']['id'])) && ($_SESSION['USER']['id'] == ""))){ 
	$this->reDirect("../signin.php"); 
	}	
}
/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
public function reDirect($url)
{
	header("Location: ".$url);
	exit;
}
/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
public function goScript($url='')
{
	echo "<script>location.href='$url'</script>";
	exit;
}
/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
public function linkURL($pageName='')
{
	print SITE_URL.$pageName;
}
/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
public function getDropdown($SQL,$opValue,$dVal,$selected='')
{
	if(!$count = $this->dbObject->countRows($SQL)) return false;
	else{
	$rs = $this->dbObject->selectData($SQL); $menu = "";
	while($row = $this->dbObject->getRow($rs)){
	$menu .= "<option value='".$row[$opValue]."'";
	if(is_array($selected) && in_array($row[$opValue],$selected))
	$menu .= " selected " ;
	elseif($row[$opValue] == $selected)
	$menu .= " selected " ;
	$menu .= ">".$row[$dVal];
	$menu.= "</option>";
	}
	return $menu;
	}
}
/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
public function pageContent($page_id='')
{
	$SQL = "SELECT * FROM ".TBL_PAGE." WHERE page_id = '".$page_id."' ";
	$rs = $this->dbObject->selectData($SQL);
	$row = $this->dbObject->getRow($rs);
	$page_cont[0] = $row['pages_heading'] ;
	$page_cont[1] = stripcslashes($row['pages_content']);
	return $page_cont;
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
public function processContent($page_id='')
{
	$SQL = "SELECT * FROM ".TBL_PROCESS." WHERE id = '".$page_id."' ";
	$rs = $this->dbObject->selectData($SQL);
	$row = $this->dbObject->getRow($rs);
	$page_cont[0] = $row['title'] ;
	$page_cont[1] = stripcslashes($row['content']);
	return $page_cont;
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
public function metaContent($page_id="")
{
	if($page_id == '' ) {$page_id = 0 ; } 
	if($page_id>0){
	$SQL = "SELECT * FROM ".TBL_META_GENERAL." WHERE page_id = '".$page_id."' ";
	$rs=$this->dbObject->selectData($SQL);
	$row = $this->dbObject->getRow($rs);
	$meta_cont[0] = $row['meta_page_title'] ;
	$meta_cont[1] = stripcslashes($row['meta_tag']);
	$meta_cont[2] = stripcslashes($row['meta_keywords']);		
	if($meta_cont[0]!='' || $meta_cont[1]!='' || $meta_cont[2]!='' ) { return $meta_cont; } else { $page_id=0; } 
	}	
	if($page_id==0) {	
	$SQL2 = "SELECT * FROM ".TBL_META_GENERAL." WHERE page_id = '".$page_id."' ";
	$rs=$this->dbObject->selectData($SQL2);
	$row = $this->dbObject->getRow($rs);
	$meta_cont[0] = $row['meta_page_title'] ;
	$meta_cont[1] = stripcslashes($row['meta_tag']);
	$meta_cont[2] = stripcslashes($row['meta_keywords']);		
	return $meta_cont;
	}	
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
public function pre($data)
{
	echo '<pre>';print_r($data);
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
public function checkDBInfo($SQL)
{
	if(!$count = $this->dbObject->countRows($SQL)) return false;
	else return true;
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
public function getReqString($data,$removed_arr)
{
	foreach( $data as $key => $value ) {
	if(in_array($key,$removed_arr))
	unset($data[$key]);
	}
	foreach($data as $new_key => $new_value) {
	$strn .= "&".$new_key."=".$new_value;
	}
	return $strn;
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
public function checkURL($parameter)
{
	preg_match("/^(http:\/\/)?([^\/]+)/i",$parameter, $matches);
	$host = $matches[1];
	return (($host == "http://") || ($host == "https://")) ? true : false;
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
public function get_page_name($path='')
{
	$page_path = ($path != "") ? $path : $_SERVER['HTTP_REFERER']; 
	$url_parts = parse_url($page_path);
	$tmp_path = explode("/",$url_parts['path']); //pre($tmp_path);
	$page_name = array_pop($tmp_path);
	$page_name = !empty($page_name) ? $page_name : "index.php";
	$page_name .= ($url_parts['query'] != "") ? "?".$url_parts['query'] : "";
	$page_name .= ($url_parts['fragment'] != "") ? "#".$url_parts['fragment'] : "";
	return $page_name;
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
public function countWord($input)
{
	$word = trim($input);
	$count = substr_count($word, " ");
	return $count;
	}
	public function get_DB_record($SQL,$req_val)
	{
	if(!$this->dbObject->countRows($SQL))
	return false;
	else {
	$rs = $this->dbObject->selectData($SQL);
	$row = $this->dbObject->getRow($rs);
	return $row[$req_val];
	}
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
public function getDB_record($table_name,$db_uniq_field,$value,$req_field,$db_select_field='',$sql_para='')
{
	$db_select_field = !empty($db_select_field) ? $db_select_field : "*";
	$SQL = "select ".$db_select_field." from ".$table_name." where ".$db_uniq_field." = '".$value."'";
	$SQL .= !empty($sql_para) ? $sql_para : " ";
	if(!$count = $this->dbObject->countRows($SQL)) $return_value = false;
	else {
	$rs = $this->dbObject->selectData($SQL);
	$row = $this->dbObject->getRow($rs);
	$return_value = stripslashes($row[$req_field]);
	}
	return $return_value;
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
public function dateDiff($dformat, $endDate, $beginDate)
{
	$date_parts1=explode($dformat, $beginDate);
	$date_parts2=explode($dformat, $endDate);
	$start_date=gregoriantojd($date_parts1[1], $date_parts1[2], $date_parts1[0]);
	$end_date=gregoriantojd($date_parts2[1], $date_parts2[2], $date_parts2[0]);
	return $end_date - $start_date;
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
public function fileWrite($content,$filename)
{
	$text=stripcslashes($content);
	if(empty($text))
	{
	$text='  ';
	}
	if (file_exists($filename)) 
	{
	unlink($filename);
	}
	if (!$handle = fopen($filename, 'w+')) { 
	return "Cannot open file:".$filename;
	} 
	if (is_writable($filename)) { 
	if (!fwrite($handle, $text)) { 
	return "Cannot open file:".$filename;
	} 
	else { 
	return "Successfully updated."; 
	} 
	fclose($handle); 
	}else { 
	return "File:".$filename." Not Writeable."; 
	} 
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
PASSWORD GENERATE
==========================================================================================================
*/
public function generatePass()
{
	$rand=rand();
	$rand1=md5($rand);
	$pass = substr($rand1, 0, 8);
	return $pass;
}


/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/

public function checkLogin()
{
	$path_parts = pathinfo($_SERVER['PHP_SELF']);
	$dir_parts = explode("/", $path_parts['dirname']);
	if(!in_array($path_parts['basename'], $this->pagesAvoidCheckLogin) && (array_pop($dir_parts) == "admin"))
	{
	if(empty($_SESSION['admin_id'])) 
	{
	$redUrl = $this->get_page_name($_SERVER['REQUEST_URI']);
	$this->reDirect("index.php?redirect=".$redUrl);
	}
	
	}
	else
	{
	if(in_array($path_parts['basename'],$this->pagesCheckLogin))
	{
	if(empty($_SESSION['member_id'])) {
	$redUrl = $this->get_page_name($_SERVER['REQUEST_URI']);
	$this->reDirect("login.php?redirect=".$redUrl);
	}
	}
	}
}


/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
function dateFormatChange($date1="") {
	if($date1!='') {
	$date_arr = explode('/',$date1) ;
	if(is_array($date_arr)) return $date_arr[2].'-'.$date_arr[1].'-'.$date_arr[0] ;
	}else{
	return false ;
	}
} 


/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/

public function dateFormatChange1($date1="") {
	if($date1!='') {
	$date_arr = explode('-',$date1) ;
	if(is_array($date_arr)) return $date_arr[2].'-'.$date_arr[0].'-'.$date_arr[1] ;
	}else{
	return false ;
	}
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/

public function dateCompare ($date1 = '' , $date2 = '') { //
	$date1 = strtotime($date1);
	$date2 = strtotime($date2);
	if ($date2 > $date1) return true ;
} 
/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
public function monthDifference ($date = '') { 
	$d1=mktime(0,0,0,date('m'),date('d'),date('Y')); 
	$date_arr = explode('-',$date) ;
	$d2=mktime(0,0,0,$date_arr[1],$date_arr[0],$date_arr[2]);
	$months = (floor(($d1-$d2)/2628000)+1); 
	return $months ;
} 

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/

public function monthsDif($start, $end)
{
	$splitStart = explode('-', $start);
	$splitEnd = explode('-', $end);
	if (is_array($splitStart) && is_array($splitEnd)) {
	$startYear = $splitStart[0];
	$startMonth = $splitStart[1];
	$endYear = $splitEnd[0];
	$endMonth = $splitEnd[1];
	$difYears = $endYear - $startYear;
	$difMonth = $endMonth - $startMonth;
	if (0 == $difYears && 0 == $difMonth) {#print 1; // month and year are same
	return 0;
	}
	else if (0 == $difYears && $difMonth > 0) {#print 2; // same year, dif months
	if ($difMonth == 1)
	return 0;
	else
	return $difMonth;
	}
	else if (1 == $difYears) {#print 3;
	$startToEnd = 12 - $startMonth; // months remaining in start year(13 to include final month
	return ($startToEnd + $endMonth) - 1; // above + end month date
	}
	else if ($difYears > 1) {#print 4;
	$startToEnd = 12 - $startMonth; // months remaining in start year 
	$yearsRemaing = $difYears - 1;  // minus the years of the start and the end year
	$remainingMonths = 12 * $yearsRemaing; // tally up remaining months
	$totalMonths = $startToEnd + $remainingMonths + $endMonth; // Monthsleft + full years in between + months of last year
	return $totalMonths - 1;
	}
	}else {
	return false;
	}
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
NO TO WORDS
==========================================================================================================
*/
public function no_to_words($no = '')
{   
	$words = array('0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five','6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten','11' => 'eleven','12' => 'twelve','13' => 'thirteen','14' => 'fouteen','15' => 'fifteen','16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen','20' => 'twenty','30' => 'thirty','40' => 'fourty','50' => 'fifty','60' => 'sixty','70' => 'seventy','80' => 'eighty','90' => 'ninty','100' => 'hundred','1000' => 'thousand','100000' => 'lakh','10000000' => 'crore');
	$main_no = str_replace(',','',$no);#print $main_no;
	if($main_no == 0)
	return ' ';
	else {
	$novalue='';
	$highno=$main_no;
	$remainno=0;
	$value=100;
	$value1=1000;       
	while($main_no>=100)    {
	if(($value <= $main_no) &&($main_no  < $value1))    {
	$novalue=$words["$value"];
	$highno = (int)($main_no/$value);
	$remainno = $main_no % $value;
	break;
	}
	$value= $value1;
	$value1 = $value * 100;
	}       
	if(array_key_exists("$highno",$words))
	return ucwords($words["$highno"]." ".$novalue." ".$this->no_to_words($remainno));
	else {
	$unit=$highno%10;
	$ten =(int)($highno/10)*10;            
	return ucwords($words["$ten"]." ".$words["$unit"]." ".$novalue." ".$this->no_to_words($remainno));
	}
	}
}


/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
MAIL
==========================================================================================================
*/
public function mail_attachment($mailto, $from_mail, $from_name, $replyto, $subject, $message) {
	$header = "From: ".$from_name." <".$from_mail.">\r\n";
	$header .= "Reply-To: ".$replyto."\r\n";
	$header .= "MIME-Version: 1.0\r\n";
	$header .= "Content-Type: text/html; charset=iso-8859-1\"\r\n\r\n";
	$header .= $message."\r\n\r\n";
	mail($mailto, $subject, "", $header);
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
public function generatePassword($length="")
{
	$_rand_src = array(array(48,57), array(97,122) , array(65,90));
	srand ((double) microtime() * 1000000);
	$random_string = "";
	for($i=0;$i<$length;$i++){
	$i1=rand(0,sizeof($_rand_src)-1);
	$random_string .= chr(rand($_rand_src[$i1][0],$_rand_src[$i1][1]));
	}
	return $random_string;
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
	
public function generateCode($length="")
{
	$_rand_src = array(array(48,57), array(97,122) , array(65,90));
	srand ((double) microtime() * 1000000);
	$random_string = "";
	for($i=0;$i<$length;$i++){
	$i1=rand(0,sizeof($_rand_src)-1);
	$random_string .= chr(rand($_rand_src[$i1][0],$_rand_src[$i1][1]));
	}
	return $random_string;
	}
	function curPageName() {
	return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
public function time_since($since) 
{
	$chunks = array(
	array(60 * 60 * 24 * 365 , 'year'),
	array(60 * 60 * 24 * 30 , 'month'),
	array(60 * 60 * 24 * 7, 'week'),
	array(60 * 60 * 24 , 'day'),
	array(60 * 60 , 'hour'),
	array(60 , 'minute'),
	array(1 , 'second')
	);
	for ($i = 0, $j = count($chunks); $i < $j; $i++) {
	$seconds = $chunks[$i][0];
	$name = $chunks[$i][1];
	if (($count = floor($since / $seconds)) != 0) {
	break;
	}
	}
	$print = ($count == 1) ? '1 '.$name : "$count {$name}s";
	return $print;
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
public function _ago($tm,$rcs = 0)
{
	$cur_tm = time(); 
	$dif = $cur_tm-$tm;
	$pds = array('second','minute','hour','day','week','month','year','decade');
	$lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);
	for($v = sizeof($lngh)-1; ($v >= 0)&&(($no = $dif/$lngh[$v])<=1); $v--); if($v < 0) $v = 0; $_tm = $cur_tm-($dif%$lngh[$v]);
	$no = floor($no); if($no <> 1) $pds[$v] .='s'; $x=sprintf("%d %s ",$no,$pds[$v]);
	if(($rcs == 1)&&($v >= 1)&&(($cur_tm-$_tm) > 0)) $x .= time_ago($_tm);
	return $x;
}
/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
	
public function getSettings($id="")
{
	$sql = "SELECT * FROM ".TBL_SETTINGS." WHERE id= '".$id."'  ";
	$rs = $this->dbObject->selectData($sql);
	$row = $this->dbObject->getRow($rs);
	return $row;
}	

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
	
public function getPageContent($page_id="")
{
	$sql = "SELECT * FROM ".TBL_USER_PAGES." WHERE ( page_id='".$page_id."'  AND pages_status ='1' ) ";
	$rs = $this->dbObject->selectData($sql);
	$row = $this->dbObject->getRow($rs);
	return $row;
}	

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/
	
public function getMetaContent($page_id="")
{
	$sql = "SELECT * FROM ".TBL_META_GENERAL." WHERE page_id= '".$page_id."'  ";
	$rs = $this->dbObject->selectData($sql);
	$row = $this->dbObject->getRow($rs);
	return $row;
	}
}
?>
