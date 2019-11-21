<?php
ob_start();
session_start();
require_once("class/DbHandler.class.php");
require_once("class/ImageResize.class.php");
require_once("class/ProjectMethord.class.php");
require_once("class/GeneralFunction.class.php");
require_once("class/HTML.class.php");


define("ADMIN_TITLE", "Welcome to the Hisecureexhibitions Admin Panel");
define("SITE_NAME", "Hisecureexhibitions");
define("SITE_FROM", "Hisecureexhibitions");
define("COPYRIGHT_TEXT", "<strong>Hisecureexhibitions &copy; 2017-2018,</strong> All Rights Reserved.");

/***************** For Server ******************/

define("DB_HOST", "localhost");
define("DB_USER", "hisecure");
define("DB_PASSWORD", "hiSecure9823@");
define("DB_NAME", "hisecure");
define("SITE_URL", "http://ondemandsolutions.in/");

/*************** End *******************/

define("SITE_ID",1);
define("CUR",'$');
define("MSG_INVALID_USER", "Invalid User Name or Password");
define("MSG_LOGIN_EXIST", "Login Id already exist.Please chose another.");
define("MSG_EMAIL_EXIST", "Email Id Or Phone Number you provide already exist.Please choose another.");
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
define("DTABLE_admin_banner", "admin_banner");
define("DTABLE_category", "admin_category");
define("DTABLE_event", "admin_event");
define("DTABLE_product", "admin_product");
define("DTABLE_product_image", "admin_product_image");
define("DTABLE_admin_about_us", "admin_about_us");
define("DTABLE_term_condiction", "admin_term_condiction");
define("DTABLE_privacy_polocy", "admin_privacy_polocy");
define("DTABLE_sitesetting", "admin_sitesetting");
define("DTABLE_order_table", "order_table");
define("DTABLE_new_order_table", "new_order");
define("DTABLE_PRODUCT_TABLE", "order_product_details");
define("DTABLE_SHIP_ADDRESS_CHANGE_HISTORY", "shipping_change_history");
define("DTABLE_JOIN_REGISTRATION", "user_registration");
define("DTABLE_CONTACT_ENQUIRY", "admin_contact_enquiry");
define("DTABLE_wishlist", "admin_wishlist");
/**********************************************************************************************************************************************/

/* Admin Side */
define("CAT_Image", "images/img/");



/*************** End *******************/
$db = new DbHandler();
$gf = new GeneralFunction($db,array('index.php','adminOperations.php'));
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
