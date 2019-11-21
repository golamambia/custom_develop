<?php 
include('includes/admin_top.php'); 

$msg ="";
$id = $_REQUEST['id'];
$page_title = 'Update Event';
if(isset($_POST['update_blog']) && $_POST['update_blog']=='update_blog'){
if($_FILES['image_browse']['name']!=''){
$arr=getimagesize($_FILES['image_browse']['tmp_name']);
$userfile_extn = end(explode(".", strtolower($_FILES['image_browse']['name'])));
if(($userfile_extn =="jpeg"||$userfile_extn =="jpg" || $userfile_extn =="png" || $userfile_extn =="gif")){
$tmp_name = $_FILES['image_browse']['tmp_name'];
$name = time()."_".$_FILES['image_browse']['name'];
move_uploaded_file($tmp_name, TEAM_ADMIN_IMAGE_PATH_EVENT.$name);
$_POST['image_browse'] = $name;
}else{
$msg="Must be .jpeg/.jpg/.png/.gif please check extension";
}
}

$chk=$db->updateArray(DTABLE_EVENT,$_POST,"id=".$id) or die(mysql_error());
$filename = $_FILES['ml_image']['name'];
$file_tmp = $_FILES['ml_image']['tmp_name'];
$filetype = $_FILES['ml_image']['type'];
$filesize = $_FILES['ml_image']['size'];
if($chk==true){

            for($i=0; $i<=count($file_tmp); $i++){
if(!empty($file_tmp[$i])){
$arr=getimagesize($file_tmp[$i]);
$userfile_extn = end(explode(".", strtolower($filename[$i])));
if(($userfile_extn =="jpeg"||$userfile_extn =="jpg" || $userfile_extn =="png" || $userfile_extn =="gif")){
$tmp_name = $file_tmp[$i];
$name = time()."_".$filename[$i];
move_uploaded_file($tmp_name, TEAM_ADMIN_IMAGE_PATH_EVENT.$name);
$_POST['image'] = $name;
$_POST['post_id'] = $id;
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

            $msg = MSG_EDIT_SUCCESS;
           }else{

            $msg_class = 'alert-danger';

            $msg = "Please try again!";
           }



}
$get_product_details = $pm->getTableDetails(DTABLE_EVENT,'id',$id);
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
<input type="hidden" name="update_blog" value="update_blog">
<div class="box-body">



<div class="form-group">
<label class="col-sm-2 control-label">Event Category</label>
<div class="col-sm-5">
<select class="form-control" id="category" name="category" required>
<option value="">Select Event Category</option>
<option value="Formation" <?php if($get_product_details['category'] == 'Formation'){?> selected <?php }?>>Formation</option>
<option value="Lodha Tour" <?php if($get_product_details['category'] == 'Lodha Tour'){?> selected <?php }?>>Lodha Tour</option>
<option value="Confluence" <?php if($get_product_details['category'] == 'Confluence'){?> selected <?php }?>>Confluence'15</option>
</select>
</div>
</div>


<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Event Title</label>
<div class="col-sm-5">
<input type="text" class="form-control" id="event_title" placeholder="" name="event_title" required value="<?php echo $get_product_details['event_title']; ?>">
</div>
</div>


<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Event Sub Title</label>
<div class="col-sm-5">
<input type="text" class="form-control" id="event_sub_title" placeholder="" name="event_sub_title" required value="<?php echo $get_product_details['event_sub_title']; ?>">
</div>
</div>


<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Event Date</label>
<div class="col-sm-5">
<input type="date" class="form-control" id="event_date" placeholder="" name="event_date"  value="<?php echo $get_product_details['event_date']; ?>">
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Event Year</label>
<div class="col-sm-5">
  <select name="event_year" id="event_year" class="form-control" required>
    <?php for($i=2017; $i<=2050; $i++){?>
     <?php if($i==$get_product_details['event_year']){ ?>
   <option value="<?php echo $i;?>" select="selected"><?php echo $i;?></option>
   <?php } else { ?>
      <option value="<?php echo $i;?>" ><?php echo $i;?></option>
	<?php } } ?>
  </select>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">Single Image</label>
<div class="col-sm-5">
<input type="file" class="form-control" id="image_browse" placeholder="" name="image_browse" >
</div>
</div>


<?PHP if($get_product_details['image_browse']!='' && file_exists(TEAM_ADMIN_IMAGE_PATH_EVENT.$get_product_details['image_browse']))
{
?>
<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
<div class="col-sm-5"><img src="<?PHP echo TEAM_ADMIN_IMAGE_PATH_EVENT.$get_product_details['image_browse']?>" width="120" height="60"/></div>
</div>

<?PHP 
}
?> 
<div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Details Image's</label>
                <div class="col-sm-5">
                    <input type="file" class="form-control" id="ml_image" placeholder="Product Image" name="ml_image[]" multiple>
                    <div id="multi_img">
                    <?PHP
                    $proid=$get_product['sid'];
                    //$get_product2 = $pm->getTableDetails(DTABLE_MULTIIMG,'product_rid',$proid);

        $sql2 = "SELECT * FROM ".DTABLE_EVENT_IMG." where post_id='".$get_product_details['id']."' ORDER BY id DESC";
            $res2 = $db->selectData($sql2);
            while($row_rec2 = $db->getRow($res2)){
            
             ?>

<div style="margin-top: 10px;float: left;margin-right: 10px;position: relative;padding-top: 20px;"><span style="cursor:pointer;position: absolute;top:0px;left:0px;right:0px;display: block;text-align: center;" onclick="del_img(<?=$row_rec2['id'];?>,'<?=$row_rec2[post_id];?>')">Remove</span><img src="<?PHP echo TEAM_ADMIN_IMAGE_PATH_EVENT.$row_rec2['image'];?>" height="60"/></div>

         <?php } ?>
                </div>
            </div>
            <div class="col-sm-5" style="float: right;">
                <p id="alert_rem" style="color: green;font-size: 16px;font-weight: 600;display: none">Image Removed Successfully</p>
            </div>
            </div>


<div class="box-footer">
<button type="submit" class="btn btn-info">Update</button>
</div>
</div>
</form>
</div>
</section>
</div>
<!-- /.content-wrapper -->
<?php include('includes/admin_footer.php'); ?> 
<script type="text/javascript">
      
function del_img(val,val2){
    $con=confirm("Are you to delete ?");
    if($con){
$.ajax({
type: "POST",
url: "get_multiimage.php",
data: 'val=' + val+'&val2='+val2,
cache: false,
success: function(html) {
//alert(html);

$("#alert_rem").show();
$("#multi_img").html(html);


}
});
}

return false;
}
</script>