<?php
ob_start();
session_start();
require_once("class/DbHandler.class.php");
require_once("class/ImageResize.class.php");
require_once("class/ProjectMethord.class.php");
require_once("class/GeneralFunction.class.php");
require_once("class/HTML.class.php");

define("ADMIN_TITLE", "Welcome to Theprivatecleaner Admin Panel");
define("SITE_NAME", "The Private Cleaner");
define("SITE_FROM", "The Private Cleaner");
define("COPYRIGHT_TEXT", "<strong>Theprivatecleaner &copy; 2017-2018,</strong> All Rights Reserved.");

/***************** For Server ******************/

define("DB_HOST", "localhost");
define("DB_USER", "webtemgl_thepriv");
define("DB_PASSWORD", "admin@123");
define("DB_NAME", "webtemgl_theprivatecleaner");
define("SITE_URL", "http://webtechnomind.com/work/theprivatecleaner/");

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
define("DTABLE_SLIDER", "admin_sliders");
define("DTABLE_CATEGORY", "category_table");
define("DTABLE_CLEANER", "admin_cleaner");
define("DTABLE_WORK", "admin_work");
define("DTABLE_ABOUT", "admin_about");
define("DTABLE_ABOUT_PRIVATE", "admin_about_private");
define("DTABLE_JOIN_REGISTRATION", "admin_join_registration");
define("DTABLE_CONTACT_ENQUIRY", "admin_contact_enquiry");
define("DTABLE_SETTING", "admin_setting");
define("DTABLE_HELP", "admin_help");
define("DTABLE_FAQS", "admin_faqs");

define("DTABLE_CLEANER_GALLERY", "admin_cleaner_gallery");
define("DTABLE_NEWS", "admin_news");
define("DTABLE_PAY", "payment_details");



/**********************************************************************************************************************************************/

define("HOME_BANNER_ADMIN_IMAGE_PATH", "../images/slider-image/");
define("BANNER_FRONTEND_IMAGE_PATH", "images/slider-image/");

define("HOME_BANNER_ADMIN_CATEGORY_IMAGE_PATH", "../images/category-image/");
define("BANNER_FRONTEND_IMAGE_CATEGORY_PATH", "images/category-image/");

define("HOME_ADMIN_CLEANER_IMAGE_PATH", "../images/cleaner-image/");
define("BANNER_FRONTEND_CLEANER_IMAGE_PATH", "images/cleaner-image/");

define("HOME_ADMIN_CLEANER_GALLERY_IMAGE_PATH", "../images/cleaner-gallery-image/");
define("BANNER_FRONTEND_CLEANER_GALLERY_IMAGE_PATH", "images/cleaner-gallery-image/");

define("HOME_ADMIN_NEWS_IMAGE_PATH", "../images/news-image/");
define("BANNER_FRONTEND_NEWS_IMAGE_PATH", "images/news-image/");

define("HOME_ADMIN_ABOUT_PRIVATE_IMAGE_PATH", "../images/about-private/");
define("BANNER_FRONTEND_ABOUT_PRIVATE_IMAGE_PATH", "images/about-private/");

define("HOME_ADMIN_EXECUTIVE_IMAGE_PATH", "../images/executive-image/");
define("BANNER_FRONTEND_EXECUTIVE_IMAGE_PATH", "images/executive-image/");

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
