<?php 
include"header.php";
if($_SESSION['USER']['logedin']=='true'){
header("location:index");
}
//$go_page=$_REQUEST['cart'];
if(isset($_POST['user_login']) && $_POST['user_login']=='Userlogin'){
//$_POST['email']=$_SESSION['email'];
  
$sql = "SELECT * FROM ".DTABLE_ADS." WHERE email = '".$_POST['email']."' AND password = '".$_POST['password']."'";
$getCount  = $db->countRows($sql);
if($getCount == 0) {
$msg_class = 'alert-danger';  
$msg = MSG_INVALID_USER;
}else{ 
$row = $db->selectData($sql);
$res = $db->getRow($row);
$newAdminDataArray = array( 
  'id' => $res['id'],
  'logedin' => 'true',
  'email' => $res['email'],
    'status' => $res['status'],
  'phone' => $res['contact'], 
  'name' =>  $res['name']
);
if(count($newAdminDataArray) > 0){
  //$_SESSION['id']=$res['admin_login_id'];
     //$_SESSION['ps']=$_POST['password'];
  if ($remember_me == "y"){
       setcookie("cookie_member_u",$res['email'],time()+2592000);
              setcookie("cookie_member_upw",$_POST['password'],time()+2592000);

     }else{
       setcookie ("cookie_member_u","", time()-3600);
              setcookie ("cookie_member_upw","", time()-3600);

     }

$_SESSION['USER'] = $newAdminDataArray;
//if($go_page!='cart_log'){
header("location:index");
//}else{
//header("location:checkout");
//}

}
}
}
?>
  
 <div class="innser_bannerbox">
  	<div class="container">
    	<div class="imgbox" style="background-image:url(images/login.jpg)">
        	<h2>login</h2>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"> login</li>
              </ol>
            </nav>
        </div>
    </div>
  </div>
  
  
  <div class="main_area">
  	<div class="container">
    	<div class="login-register-box">
                <header>
                    <h3>Welcome to</h3>
                    <div class="lrlogo"><img src="images/logo.png" alt=""></div>
                </header>
                <?php if((isset($msg)) and ($msg != '')){ ?>
            <div class="alert <?php echo $msg_class; ?> alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p><?php echo $msg; ?></p>
            </div>
            <?php } ?>
                <form method="post">
                    <input type="hidden" name="user_login" value="Userlogin"> 
                 <div class="form-group"><input type="text" class="form-control" placeholder="Enter your Email" name="email" id="email"></div>
                 <div class="form-group"><input type="password" class="form-control" placeholder="Enter your Password" name="password" id="password"></div>
                 <div class="form-group"><a class="forget" href="forgot_password">Forgot your Password?</a></div>
                 <div class="form-group"><input type="submit" value="sign in" class="btn btn-danger btn-minwidth"></div>
             </form>
                                 
                 <p>Don't have an account? <a class="link" href="post_add">Join us now</a></p>
             </div>
    </div>
 </div>


<?php 
include"footer.php";
?>