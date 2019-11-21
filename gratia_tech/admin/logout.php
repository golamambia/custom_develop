<?php
include_once("../configure.php");
unset($_SESSION['ADMIN']);
unset($_SESSION['BLOGGER']);
session_destroy();
if((isset($_SESSION['ADMIN']['id'])) and ($_SESSION['ADMIN']['id'] == "")){
$getIpaddress = $pm->onlyGetIp();
$updateQuery = "UPDATE ".DTABLE_ADMIN." SET admin_last_login_ip = '".$getIpaddress."', admin_last_login_datetime=NOW() WHERE admin_id=1";
$getEXE = mysql_query($updateQuery);
if($getEXE){
$gf->reDirect("../admin?logout");
}
}else{
$gf->reDirect("../admin?logout");	
}
?>
