<?php 
include('includes/admin_top.php'); 
$msg ="";
$error_msg ="";
if(isset($_POST['changeProfile']) && $_POST['changeProfile']=='changeProfile'){
$getAdmin_array = array( 'admin_login_id'=> $_POST['admin_login_id'],'admin_fastname'=> $_POST['admin_fastname'],'admin_lastname'=> $_POST['admin_lastname'],'admin_email'=> $_POST['admin_email']  );
$db->updateArray(DTABLE_ADMIN,$getAdmin_array,"admin_id = 1");
$msg_class = 'alert-success';
$msg = MSG_EDIT_SUCCESS;
}
$GET_ADMIN_UPDATE = $pm->getTableDetails(DTABLE_ADMIN,'admin_id',1);
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
<h1>ADMIN PROFILE</h1>
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
<h3 class="box-title">Update Profile</h3>
</div>
<!-- form start -->
<form class="form-horizontal" name="" action="" method="post">
<input type="hidden" name="changeProfile" value="changeProfile">
<div class="box-body">
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Username<span style="color:#F00">*</span></label>
<div class="col-sm-5">
<input type="text" class="form-control" id="admin_login_id" name="admin_login_id" placeholder="Username" value="<?php echo $GET_ADMIN_UPDATE['admin_login_id']; ?>" required>
</div>
</div>
<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">First Name<span style="color:#F00">*</span></label>
<div class="col-sm-5">
<input type="text" class="form-control" id="pass1" placeholder="First Name" name="admin_fastname" value="<?php echo $GET_ADMIN_UPDATE['admin_fastname']; ?>" required>
</div>
</div>
<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Last Name<span style="color:#F00">*</span></label>
<div class="col-sm-5">
<input type="text" class="form-control" id="pass2" placeholder="Last Name" name="admin_lastname" value="<?php echo $GET_ADMIN_UPDATE['admin_lastname']; ?>" required>
</div>
</div>
<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Email<span style="color:#F00">*</span></label>
<div class="col-sm-5">
<input type="email" class="form-control" id="pass2" placeholder="Email" name="admin_email" value="<?php echo $GET_ADMIN_UPDATE['admin_email']; ?>" required>
</div>
</div>
</div>
<div class="box-footer">
<button type="submit" class="btn btn-info">Save</button>
</div>
</form>
</div>

</section>
</div>
<!-- /.content-wrapper -->
<?php include('includes/admin_footer.php'); ?> 