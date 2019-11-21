<?php 
include('includes/admin_top.php'); 
$msg ="";
$error_msg ="";
if(isset($_POST['chnagePassword']) && $_POST['chnagePassword']=='chnagePassword'){
$admin_password_old=md5($_POST['admin_password_old']);
$admin_password_new=md5($_POST['admin_password_new']);
if($_POST['admin_password_new'] == $_POST['password_varify']){
$sql = "select * from ".DTABLE_ADMIN." where admin_password='$admin_password_old' and admin_id = '{$_SESSION['ADMIN']['id']}'";
$sql_exe = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($sql_exe)>0){
mysql_query("update ".DTABLE_ADMIN." set admin_password='$admin_password_new' where admin_id = '{$_SESSION['ADMIN']['id']}'");
$msg_class = 'alert-success';
$msg ="Password Change Successfully";
}else{
$msg_class = 'alert-danger';
$msg ="Current password does not exist.";
}
}else{
$msg_class = 'alert-danger';
$msg ="Password did not match";	
}
}
?>  
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<!-- Main Header -->
<?php include('includes/admin_header.php'); ?>  
<!-- Left side column. contains the logo and sidebar -->
<?php include('includes/admin_sidebar.php'); ?>  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>ADMIN CHANGE PASSWORD</h1>
</section>
<section class="content">
<?php if((isset($msg)) and ($msg != '')){ ?>
<div class="alert <?php echo $msg_class; ?> alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<p><?php echo $msg; ?></p>
</div>
<?php } ?>
<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">Change Password</h3>
</div>
<!-- form start -->
<form class="form-horizontal" name="" action="" method="post">
<input type="hidden" name="chnagePassword" value="chnagePassword">
<div class="box-body">
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Old Password</label>
<div class="col-sm-5">
<input type="password" class="form-control" id="admin_password_old" name="admin_password_old" placeholder="Old Password" required>
</div>
</div>
<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">New Password</label>
<div class="col-sm-5">
<input type="password" class="form-control" id="admin_password_new" placeholder="New Password" name="admin_password_new" required>
</div>
</div>
<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Retype New Password</label>
<div class="col-sm-5">
<input type="password" class="form-control" id="pass2" placeholder="Retype New Password" name="password_varify" required>
</div>
</div>
</div>
<div class="box-footer">
<button type="submit" class="btn btn-info">Change Password</button>
</div>
</form>
</div>

</section>
</div>
<!-- /.content-wrapper -->
<?php include('includes/admin_footer.php'); ?> 