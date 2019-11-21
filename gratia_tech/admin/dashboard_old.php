<?php include('includes/admin_top.php'); ?>  
<body class="hold-transition skin-blue sidebar-mini" onload=startTime();>
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
<div class="col-lg-3 col-xs-6">
<!-- small box -->
<div class="small-box bg-aqua">
<div class="inner">
<h4>Dashboard </h4>
</div>
<!--<div class="icon">
<i class="ion ion-bag"></i>
</div>-->
<a href="dashboard.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>
<div class="col-lg-3 col-xs-6">
<!-- small box -->
<div class="small-box bg-aqua">
<div class="inner">
<h4>Dashboard </h4>
</div>
<!--<div class="icon">
<i class="ion ion-bag"></i>
</div>-->
<a href="dashboard.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div><div class="col-lg-3 col-xs-6">
<!-- small box -->
<div class="small-box bg-aqua">
<div class="inner">
<h4>Dashboard </h4>
</div>
<!--<div class="icon">
<i class="ion ion-bag"></i>
</div>-->
<a href="dashboard.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div><div class="col-lg-3 col-xs-6">
<!-- small box -->
<div class="small-box bg-aqua">
<div class="inner">
<h4>Dashboard </h4>
</div>
<!--<div class="icon">
<i class="ion ion-bag"></i>
</div>-->
<a href="dashboard.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
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