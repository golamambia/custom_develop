<?php 

require('../configure.php'); 

$getAdminSetting = $pm->getSetting(1);

if(isset($_SESSION['ADMIN']['id']) && $_SESSION['ADMIN']['id'] !=""){ 

	echo "<script>window.location.href='dashboard.php'</script>"; 

}else{

if(isset($_SESSION['USER']['id']) && $_SESSION['USER']['id'] !=""){ 

	echo "<script>window.location.href='dashboard.php'</script>";

}

}

/*-----------------------------------------------------------------------------------------------------------------------------------LOGING*/

if(isset($_POST['admin_login']) && $_POST['admin_login']=='Adminlogin'){

	$remember_me=$_POST[remember_me];

$getType = $_REQUEST['type'];

if(!empty($getType)){

if($getType == 1){	

$sql = "SELECT * FROM ".DTABLE_ADMIN." WHERE admin_login_id = '".$_POST['admin_login_id']."' AND admin_password = '".md5($_POST['admin_password'])."'";

$getCount  = $db->countRows($sql);

if($getCount == 0) {

$msg_class = 'alert-danger';	

$msg = MSG_INVALID_USER;

}else{ 

$row = $db->selectData($sql);

$res = $db->getRow($row);

$newAdminDataArray = array( 

	'id' => $res['admin_id'],

	'loging' => $res['admin_login_id'], 

	'name' =>  ucwords($res['admin_fastname'].' '.$res['admin_lastname'])

);

if(count($newAdminDataArray) > 0){

	$_SESSION['admin']=$res['admin_login_id'];

     $_SESSION['ps']=$_POST['admin_password'];

	if ($remember_me == "y"){

       setcookie("cookie_member_adm1",$_SESSION['admin'],time()+2592000);

              setcookie("cookie_member_admpw1",$_SESSION['ps'],time()+2592000);



     }else{

       setcookie ("cookie_member_adm1","", time()-3600);

              setcookie ("cookie_member_admpw1","", time()-3600);



     }



$_SESSION['ADMIN'] = $newAdminDataArray;

$getIpaddress = $pm->onlyGetIp();

$updateQuery = "UPDATE ".DTABLE_ADMIN." SET admin_last_login_ip = '".$getIpaddress."', admin_last_login_datetime=NOW() WHERE admin_id=1";

$getEXE = mysql_query($updateQuery);

if($getEXE){

header("location:dashboard.php");	

}

}

}

}else{

$sql = "SELECT * FROM ".DTABLE_USER." WHERE blogger_email = '".$_POST['admin_login_id']."' AND blogger_password = '".$_POST['admin_password']."'";

$getCount  = $db->countRows($sql);

if($getCount == 0) {

$msg_class = 'alert-danger';	

$msg = MSG_INVALID_USER;

}else{ 

$row = $db->selectData($sql);

$res = $db->getRow($row);

$newAdminDataArray = array( 

	'id' => $res['id'],

	'user_name' =>  ucwords($res['user_name']),

	'user_email' => $res['user_email'],

	'user_phone' => $res['user_phone'],

	'user_pic' => $res['user_pic']

	

);



if(count($newAdminDataArray) > 0){

$_SESSION['USER'] = $newAdminDataArray;

header("location:dashboard.php");	

}

}

}

}

}

/*-----------------------------------------------------------------------------------------------------------------------------------FORGET PASSWORD*/

if(isset($_POST['admin_forgetPassword']) && $_POST['admin_forgetPassword']=='admin_forgetPassword'){

$forgetPassword = "SELECT * FROM ".DTABLE_ADMIN." WHERE admin_email = '".$_REQUEST['email_id']."'";	

if($db->countRows($forgetPassword)> 0){

$newPassword = $pm->generateCode(10);	

$updateQueryPassword = "UPDATE ".DTABLE_ADMIN." SET admin_password = '".md5($newPassword)."' WHERE admin_id=1";

$getEXEFire = mysql_query($updateQueryPassword);

if($getEXEFire){

//-----------Start mail format USER MAIL-----------------------

$to = $_REQUEST['email_id'];

$sent_message = "";

$from_name = SITE_FROM;

$from_email = $getAdminSetting['from_email'];

$mail_body = "
   <p>Dear Admin,</p>
   <p>Congratulations! You have successfully reset your password. Your new password is ".$newPassword."</p>
   <p>Thanks and Regards.</p>
   <p>".$from_name."</p>
   ";
$subject = "Admin Password Rest";
require '../class/class.phpmailer.php';
   $mail = new PHPMailer;
   
   $mail->IsSMTP();                                  
  $mail->Host = "sg3plcpnl0217.prod.sin3.secureserver.net";  
  $mail->SMTPAuth = true; 
  $mail->Username = "info@jobscow.ca"; 
  $mail->Password = "5mtKL@tPQ%uV"; 
  $mail->From = "info@jobscow.ca";
  $mail->FromName = 'Admin';
  $mail->AddAddress($to);
  $mail->WordWrap = 50; 
  $mail->IsHTML(true);  
  $mail->Subject = $subject;

  $mail->Body    = $mail_body;
  //$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
   if($mail->Send()){
$msg_class = 'alert-success';

$msg = 'One Email Has Been Sent To User Email Account';	

}else{

$msg_class = 'alert-danger';	

$msg = 'Sorry !! Some Technical Issue Please Try After Some Time !!';	

}

//-----------End mail format USER MAIL-----------------------	

}else{

$msg_class = 'alert-danger';	

$msg = 'Sorry !! Some Technical Issue Please Try After Some Time !!';	

}

}else{

$msg_class = 'alert-danger';	

$msg = 'Wrong !! Email Id you provide does not exist';		

}

}

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title><?php echo ADMIN_TITLE; ?></title>

<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<link rel="stylesheet" href="dist/css/AdminLTE.min.css">

<link rel="stylesheet" href="plugins/iCheck/square/blue.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

<!--[if lt IE 9]>

<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

<![endif]-->

</head>

<body class="hold-transition login-page">

<div class="login-box">

<div class="login-logo">

<a href="index"><strong><?php echo SITE_NAME; ?></strong></a>

</div>

<div class="login-box-body">

<?php if((isset($msg)) and ($msg != '')){ ?>

<div class="alert <?php echo $msg_class; ?> alert-dismissable">

<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

<p><?php echo $msg; ?></p>

</div>

<?php } ?>

<form action="" method="post" name="MyForm">

<input type="hidden" name="admin_login" value="Adminlogin">	

<div class="form-group">

<select name="type" class="form-control" required>

<option value="1">Master Admin</option>

</select>

</div>

<div class="form-group has-feedback">

<input type="text" class="form-control" value="<?=$_COOKIE['cookie_member_adm1'];?>" placeholder="Uesrname" name="admin_login_id" required>

<span class="glyphicon glyphicon-user form-control-feedback"></span>

</div>

<div class="form-group has-feedback">

<input type="password" class="form-control" value="<?=$_COOKIE['cookie_member_admpw1'];?>" placeholder="Password" name="admin_password" required>

<span class="glyphicon glyphicon-lock form-control-feedback"></span>

</div>

<div class="row has-feedback">

<div class="col-xs-6">

<button type="button" class="btn btn-primary btn-block btn-flat" data-toggle="modal" data-target="#myModal">Forget Password</button>

</div>
<div class="col-xs-6" style="float: right;">

<button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>

</div>


<div class="col-xs-6 ">

          <div class="checkbox icheck " style="margin-left: 22px;">

            <label>

              <input type="checkbox" name="remember_me" value="y" <?php if($_COOKIE['cookie_member_adm1']!=''){ ?>checked<?php } ?>> Remember Me

            </label>

          </div>

        </div>


</div>

</form>

<!-- Modal -->

<form action="" method="post">

<input type="hidden" name="admin_forgetPassword" value="admin_forgetPassword">	

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

<div class="modal-dialog" role="document">

<div class="modal-content">

<div class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

<h4 class="modal-title" id="myModalLabel">Have you forgotten your password ??</h4>

</div>

<div class="modal-body">

<div class="form-group has-feedback">

<input type="email" class="form-control" placeholder="Please Enter Your Email" name="email_id" required>

<span class="glyphicon glyphicon-user form-control-feedback"></span>

</div>

</div>

<div class="modal-footer">

<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

<button type="submit" class="btn btn-primary">Rest Password</button>

</div>

</div>

</div>

</div>

</form>



</div>

</div>

<!-- jQuery 2.1.4 -->

<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>

<!-- Bootstrap 3.3.5 -->

<script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>

