<?php include('includes/admin_top.php'); ?>
<style type="text/css">
	.progress-description a{
		color:#fff;
	}
</style>  
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
<h1>DASHBOARD<small><?php echo ADMIN_TITLE; ?></small></h1>
</section>
<section class="content">
<div class="row">
<?php if((isset($_SESSION['ADMIN']['id'])) and ($_SESSION['ADMIN']['id'] != "")){ ?>
<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-dashboard"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Dashboard</span>
              <span class="info-box-number">41,410</span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <span class="progress-description">
                    <a href="dashboard.php" >More info <i class="fa fa-arrow-circle-right"></i></a>
                  </span>
            </div>

            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Profile</span>
              <span class="info-box-number">41,410</span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <span class="progress-description">
                    <a href="profile.php" >More info <i class="fa fa-arrow-circle-right"></i></a>
                  </span>
            </div>

            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div><div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-lock"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Password</span>
              <span class="info-box-number">41,410</span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <span class="progress-description">
                    <a href="change_password.php" >More info <i class="fa fa-arrow-circle-right"></i></a>
                  </span>
            </div>

            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div><div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-cog"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Settings</span>
              <span class="info-box-number">41,410</span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <span class="progress-description">
                    <a href="setting.php" >More info <i class="fa fa-arrow-circle-right"></i></a>
                  </span>
            </div>

            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
<?php 
}else{
?> 


<?php }?>
</div>
</section>
</div>
<!-- /.content-wrapper -->
<?php include('includes/admin_footer.php'); ?> 