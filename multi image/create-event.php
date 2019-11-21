<?php 
include('includes/admin_top.php'); 
$msg ="";
$page_title = 'Create Event';

if(isset($_POST['create_blog']) && $_POST['create_blog']=='create_blog'){




if($_FILES['image_browse']['name']!=''){
            $arr=getimagesize($_FILES['image_browse']['tmp_name']);
            $userfile_extn = end(explode(".", strtolower($_FILES['image_browse']['name'])));
            
            if(($userfile_extn =="jpeg"||$userfile_extn =="jpg" || $userfile_extn =="png" || $userfile_extn =="gif")){
               
                    $tmp_name = $_FILES['image_browse']['tmp_name'];
                    $name = time()."_".$_FILES['image_browse']['name'];
                    move_uploaded_file($tmp_name, TEAM_ADMIN_IMAGE_PATH_EVENT.$name);
                    $_POST['image_browse'] = $name;

                                     
            }else{
                $msg_class = 'alert-error';
                $msg="Must be .jpeg/.jpg/.png/.gif please check extension";
            }
        }






	$get_last_id = $db->insertDataArray(DTABLE_EVENT,$_POST);
$filename = $_FILES['ml_image']['name'];
$file_tmp = $_FILES['ml_image']['tmp_name'];
$filetype = $_FILES['ml_image']['type'];
$filesize = $_FILES['ml_image']['size'];

if(!empty($get_last_id)):

for($i=0; $i<=count($file_tmp); $i++){
if(!empty($file_tmp[$i])){
$arr=getimagesize($file_tmp[$i]);
$userfile_extn = end(explode(".", strtolower($filename[$i])));
if(($userfile_extn =="jpeg"||$userfile_extn =="jpg" || $userfile_extn =="png" || $userfile_extn =="gif")){
$tmp_name = $file_tmp[$i];
$name = time()."_".$filename[$i];
move_uploaded_file($tmp_name, TEAM_ADMIN_IMAGE_PATH_EVENT.$name);
$_POST['image'] = $name;
$_POST['post_id'] = $get_last_id;
$db->insertDataArray(DTABLE_EVENT_IMG,$_POST);
}else{
$msg="Picture's must be .jpeg/.jpg/.png/.gif please check extension";
}
}
else{
$msg="Please select some images...";
}
}



$msg_class = 'alert-success';
$msg = MSG_ADD_SUCCESS;
else:
$msg_class = 'alert-error';
// $msg = MSG_ADD_FAIL;
endif;
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
<h1><?php echo $page_title; ?></h1>
</section>
<section class="content">
<?php if((isset($msg)) and ($msg != '')){ ?>
<div class="alert <?php echo $msg_class; ?> alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<p><?php echo $msg; ?></p>
</div>
<?php } ?>
<div class="box box-info">
<!-- form start -->
<form class="form-horizontal" name="" action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="create_blog" value="create_blog">
<div class="box-body">


<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Event Year</label>
<div class="col-sm-5">
  <select name="event_year" id="event_year" class="form-control" required>
    <?php for($i=2014; $i<=2050; $i++){?>
   <option value="<?php echo $i;?>"><?php echo $i;?></option>
      
	<?php } ?>
  </select>
</div>
</div>


<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Event Title</label>
<div class="col-sm-5">
<input type="text" class="form-control" id="event_title" placeholder="" name="event_title" required>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Event Sub Title</label>
<div class="col-sm-5">
<input type="text" class="form-control" id="event_sub_title" placeholder="" name="event_sub_title" required>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Event Date</label>
<div class="col-sm-5">
<input type="date" class="form-control" id="event_date" placeholder="" name="event_date" required>
</div>
</div>
<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Single Image</label>
<div class="col-sm-5">
<input type="file" class="form-control" id="image_browse" placeholder="" name="image_browse" required >
<span>Note: Picture's must be .jpeg/.jpg/.png/.gif format</span>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Details Image</label>
<div class="col-sm-5">
<input type="file" class="form-control" id="ml_image" placeholder="" name="ml_image[]" multiple="" >
<span>Note: Picture's must be .jpeg/.jpg/.png/.gif format</span>
</div>
</div>


<div class="box-footer">
<button type="submit" name="submit" class="btn btn-info">Submit</button>
</div>
</div>
</form>
</div>
</section>
</div>
<!-- /.content-wrapper -->
<?php include('includes/admin_footer.php'); ?> 