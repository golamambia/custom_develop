<?php 
include('includes/admin_top.php'); 
if(isset($_POST['AdminSettings']) && $_POST['AdminSettings']=='AdminSettings'){
$db->updateArray(DTABLE_SETTING,$_POST,"id = 1");
$msg_class = 'alert-success';
$msg = MSG_EDIT_SUCCESS;
}
$row_rec = $pm->getTableDetails(DTABLE_SETTING,'id',1);

$_POST['twitter'] = $row_rec['twitter'];
$_POST['facebook'] = $row_rec['facebook'];
$_POST['linkdin'] = $row_rec['linkdin'];
//$_POST['rss'] = $row_rec['rss'];
$_POST['site_email'] = $row_rec['site_email'];
$_POST['from_email'] = $row_rec['from_email'];
$_POST['address'] = $row_rec['address'];
$_POST['phone'] = $row_rec['phone'];

$_POST['office_phone'] = $row_rec['office_phone'];
//$_POST['state'] = $row_rec['state'];
//$_POST['postcode'] = $row_rec['postcode'];



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
<h1>ADMIN SETTING</h1>
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
<h3 class="box-title">Change Setting</h3>
</div>
<!-- form start -->
<form class="form-horizontal" name="" action="" method="post">
<input type="hidden" name="AdminSettings" value="AdminSettings">
<div class="box-body">
<div class="col-md-6">


<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Facebook</label>
<div class="col-sm-10">
<input type="text" name="facebook" id="facebook" value="<?php echo (isset($_POST['facebook']) && $_POST['facebook']!="" ? stripslashes($_POST['facebook']) : "");?>" class="form-control" size="32" />
</div>
</div>
<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Linkedin</label>
<div class="col-sm-10">
<input type="text" name="linkdin" id="linkedin" value="<?php echo (isset($_POST['linkdin']) && $_POST['linkdin']!="" ? stripslashes($_POST['linkdin']) : "");?>" class="form-control" size="32" />	
</div>
</div>
<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Google Plus</label>
<div class="col-sm-10">
<input type="text" name="rss" id="rss" value="<?php echo (isset($_POST['rss']) && $_POST['rss']!="" ? stripslashes($_POST['rss']) : "");?>" class="form-control" size="32" />
</div>
</div>
<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Site Email</label>
<div class="col-sm-10">
<input type="text" name="site_email" id="site_email" value="<?php echo (isset($_POST['site_email']) && $_POST['site_email']!="" ? stripslashes($_POST['site_email']) : "");?>" size="32" class="form-control" />
</div>
</div>
<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">From Email</label>
<div class="col-sm-10">
<input type="text" name="from_email" id="from_email" value="<?php echo (isset($_POST['from_email']) && $_POST['from_email']!="" ? stripslashes($_POST['from_email']) : "");?>" size="32" class="form-control" />	
</div>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Address</label>
<div class="col-sm-10">
<textarea rows="4" cols="65" name="address"><?php echo (isset($_POST['address']) && $_POST['address']!="" ? stripslashes($_POST['address']) : "");?></textarea>	
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Phone</label>
<div class="col-sm-10">
<input type="text" name="phone" id="phone" value="<?php echo (isset($_POST['phone']) && $_POST['phone']!="" ? stripslashes($_POST['phone']) : "");?>" class="form-control" size="32" />	
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Office Phone</label>
<div class="col-sm-10">
<input type="text" name="office_phone" id="office_phone" value="<?php echo (isset($_POST['office_phone']) && $_POST['office_phone']!="" ? stripslashes($_POST['office_phone']) : "");?>" class="form-control" size="32" />	
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">City</label>
<div class="col-sm-10">
<input type="text" name="city" id="city" value="<?php echo (isset($_POST['city']) && $_POST['city']!="" ? stripslashes($_POST['city']) : "");?>" class="form-control" size="32" />	
</div>
</div>
<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">State</label>
<div class="col-sm-10">
<input type="text" name="state" id="state" value="<?php echo (isset($_POST['state']) && $_POST['state']!="" ? stripslashes($_POST['state']) : "");?>" class="form-control" size="32" />	
</div>
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