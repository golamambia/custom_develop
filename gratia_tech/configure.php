<?php
ob_start();
session_start();
require_once("class/DbHandler.class.php");
require_once("class/ImageResize.class.php");
require_once("class/ProjectMethord.class.php");
require_once("class/GeneralFunction.class.php");
require_once("class/HTML.class.php");

if($_SESSION['USER']['chk_u']=='use'){
    define("ADMIN_TITLE", "Welcome to the Xoomla user panel");
define("SITE_NAME", "Xoomla Panel");
define("MINI_SITE_NAME", "<b>XML</b>a");
define("SITE_FROM", "Xoomla Site");
define("COPYRIGHT_TEXT", "<strong>Xoomla Admin &copy; 2018,</strong> All Rights Reserved.");
}else{
define("ADMIN_TITLE", "Welcome to the Gratia Technology");
define("SITE_NAME", "Gratia Tech Admin");
define("MINI_SITE_NAME", "<b>SY</b>s");
define("SITE_FROM", "Gratia Tech Admin");
define("COPYRIGHT_TEXT", "<strong>Gratia Tech Admin &copy; 2018,</strong> All Rights Reserved.");
}

/***************** For Server ******************/
if($_SERVER['SERVER_NAME'] == 'freshersjob.co.in'){
	define("DB_HOST", "localhost");
	define("DB_USER", "freshlfd_jobport");
	define("DB_PASSWORD", "nT15dFTCI!PR");
	define("DB_NAME", "freshlfd_jobportal");
	define("SITE_URL", "http://freshersjob.co.in/");
}else{
	define("DB_HOST", "localhost");
	define("DB_USER", "root");
	define("DB_PASSWORD", "");
	define("DB_NAME", "gratia_tech");
	define("SITE_URL", "http://localhost/gratia_tech/");
}

/*************** End *******************/

define("SITE_ID",1);
define("CUR",'$');
define("MSG_INVALID_USER", "Invalid User Name or Password");
define("MSG_LOGIN_EXIST", "Login Id already exist.Please chose another.");
define("MSG_EMAIL_EXIST", "Email Id you provide already exist.Please choose another.");
define("MSG_ADD_SUCCESS", "Added Successfully.");
define("MSG_EDIT_SUCCESS", "Updated Successfully.");
define("MSG_DELETE_SUCCESS", "Deleted Successfully.");
define("MSG_ADD_FAIL", "Addition Fail.");
define("MSG_EDIT_FAIL", "Update Failed");
define("MSG_DELETE_FAIL", "Deletion Fail.");
define("MSG_REC_EXIST", "Record already exist.");
define("MSG_CATEGORY_EXIST", "Category Name already exist.Please chose another.");
define("MSG_OLD_PASSWORD_MISMATCH", "The Password you have Provided does not match with your Old Password.");
define("MSG_BLANK_PASSWORD", "Password can't be Blank.");
define("MSG_PASSWORD_MISMATCH", "Password Mismatch.");
define("MSG_PASSWORD_CHANGED", "Your Password has been successfully changed.");
define("MSG_PLEASE_CHECK", "Please check at least one checkbox.");
/***********************************************How Many Table Create Here This Project***************************************************************/
define("DTABLE_ADMIN", "admin_admin");
define("LUAAS_ARTICLE", "article_table");
define("LUAAS_HOME_BANNER", "home_banner_table");
define("LUAAS_HOME_BANNER_IMAGE", "home_banner_image_table");
define("LUAAS_HOW_IT_WORK", "how_work_table");
define("LUAAS_FOOTER", "footer_table");
define("LUAAS_SERVICE", "services_table");
define("LUAAS_AGENCY", "agency_table");
define("LUAAS_LIVE", "live_update");
define("LUAAS_LAST_SECTION", "last_section");
define("LUAAS_CONTACT", "contact_page_table");
define("LUAAS_LAST_SECTION_DETAILS", "last_section_details");
define("LUAAS_ABOUT_US", "aboutus_table");
/**********************************************************************************************************************************************/

define("HOME_BANNER_IMAGE_PATH", "../img/banner/");
define("SITE_HOME_BANNER_IMAGE_PATH", "img/banner/");
define("HOW_IT_WOTK_IMAGE_PATH", "../img/howwork/");
define("SITE_HOW_IT_WOTK_IMAGE_PATH", "img/howwork/");
define("SERVICE_IMAGE_PATH", "../img/service/");
define("SITE_SERVICE_IMAGE_PATH", "img/service/");
define("AGENCY_IMAGE_PATH", "../img/agency/");
define("SITE_AGENCY_IMAGE_PATH", "img/agency/");
define("LAST_SECTION_IMAGE_PATH", "../img/lastsection/");
define("SITE_LAST_SECTION_IMAGE_PATH", "img/lastsection/");
define("ABOUT_IMAGE_PATH", "../img/aboutus/");
define("SITE_ABOUT_IMAGE_PATH", "img/aboutus/");

/*************** End *******************/
$db = new DbHandler();
$gf = new GeneralFunction($db, array('memberInformation.php','memberHistory.php','memberOrderDetails.php'), array('index.php','adminOperations.php'));
$image = new SimpleImage();
$pm = new PM($db);
$html = new HTML($db);


// Generate or Resume Session ID ----------
if(!$_SESSION['sess_id']){
$sess_id = session_id();
}else{
$sess_id = $_SESSION['sess_id'];
}
$_SESSION['sess_id'] = $sess_id;
// ----------------------------------------
?>

