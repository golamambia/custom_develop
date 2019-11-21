<?php 

include('includes/admin_top.php'); 

    $msg ="";

    $editid = $_REQUEST['edit'];

    $page_title = 'Update - Project Page Content';



    if(isset($_POST['update_banner']) && $_POST['update_banner']=='update_banner'){
    
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

            

           $chk= $db->updateArray(TABLE_PROJECT,$_POST, "id=".$editid) or die(mysql_error());
           if($chk==true){





            
            $msg_class = 'alert-success';

            $msg = MSG_EDIT_SUCCESS;
           }else{

            $msg_class = 'alert-danger';

            $msg = "Please try again!";
           }
            

        

    }

    $get_data = $pm->getTableDetails(TABLE_PROJECT,'id',$editid);

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

            <?php if((isset($msg)) and ($msg != ''))

            { ?>

            <div class="alert <?php echo $msg_class; ?> alert-dismissable">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            <p><?php echo $msg; ?></p>

            </div>

            <?php 

            } 

            ?>

            <div class="box box-info">

            <!-- form start -->

            <form class="form-horizontal" name="" action="" method="post" enctype="multipart/form-data">

            

                <input type="hidden" name="update_banner" value="update_banner">

                

               

                <div class="box-body">



                



        <div class="form-group">

                <label for="inputPassword3" class="col-sm-2 control-label">Title</label>

                <div class="col-sm-5">

                    <input type="text" class="form-control" value="<?=$get_data['title'];?>" id="title" placeholder="" name="title" required>

                </div>

            </div>

            <div class="form-group">

                <label for="inputPassword3" class="col-sm-2 control-label">Project Type</label>

                <div class="col-sm-5">

                    <select class="form-control" onchange="get_cat(this.value)" id="pro_type" name="pro_type" required>
                       <option value="">--Select One--</option>
                       <?php 
            $sql = "SELECT * FROM ".DTABLE_CATEGORY." ORDER BY title asc";
            $res = $db->selectData($sql);
            while($row_rec = $db->getRow($res)){
            ?>
                        <option <?php if($row_rec['id']==$get_data['pro_type']){echo"selected";}?> value="<?=$row_rec['id'];?>"><?=ucfirst($row_rec['title']);?></option>
                       <?php }?>
                        
                        </select> 
                </div>

            </div><div class="form-group">

                <label for="inputPassword3" class="col-sm-2 control-label">Project Location</label>

                <div class="col-sm-5">

                    <select class="form-control" id="pro_location" name="pro_location" required>
                       
             <option value="">--Select One--</option>
                       <?php 
            $sql = "SELECT * FROM ".DTABLE_LOCATION." where id='$get_data[pro_location]' ORDER BY name asc";
            $res = $db->selectData($sql);
            while($row_rec = $db->getRow($res)){
            ?>

                        <option <?php if($row_rec['id']==$get_data['pro_location']){echo"selected";}?> value="<?=$row_rec['id'];?>"><?=ucfirst($row_rec['name']);?></option>
                       <?php }?>
                      
                        </select> 
                </div>

            </div>


            <div class="form-group">

                <label for="inputPassword3" class="col-sm-2 control-label">Project Status</label>

                <div class="col-sm-5">

                    <select class="form-control" id="pro_status" name="pro_status" required>
                        <option value="">--Select One--</option>
                       <?php 
            $sql = "SELECT * FROM ".DTABLE_PRO_STATUS." ORDER BY title asc";
            $res = $db->selectData($sql);
            while($row_rec = $db->getRow($res)){
            ?>
                        <option <?php if($row_rec['id']==$get_data['pro_status']){echo"selected";}?> value="<?=$row_rec['id'];?>"><?=ucfirst($row_rec['title']);?></option>
                       <?php }?>
                        
                        </select> 
                </div>

            </div>

            <div class="bootstrap-timepicker">

                <div class="form-group">

                  <label for="inputPassword3" class="col-sm-2 control-label">Short Description</label>



                  <div class="col-sm-5">

                    <input type="text" class="form-control " value="<?=$get_data['time'];?>" id="title" placeholder="Event time" name="time"  required>



                    

                  </div>

                  <!-- /.input group -->

                </div>

                <!-- /.form group -->

              </div>

            <div class="form-group">

                <label for="inputPassword3" class="col-sm-2 control-label">Description</label>

                <div class="col-sm-5">

                    <textarea  class="form-control" rows="5" id="editor1" placeholder="" name="description" required><?=$get_data['description'];?></textarea>

                </div>

            </div>

            <div class="form-group">

                <label for="inputPassword3" class="col-sm-2 control-label">Location</label>

                <div class="col-sm-5">

                    <input type="text" class="form-control" value="<?=$get_data['location'];?>" id="location" placeholder="Enter location" name="location" required>

                </div>

            </div>

               <div class="form-group">

                <label for="inputPassword3" class="col-sm-2 control-label">Investment Details</label>

                <div class="col-sm-5">

                    <textarea  class="form-control" rows="5" id="editor2" placeholder="" name="invesment" required><?=$get_data['invesment'];?></textarea>

                </div>

            </div>
<div class="form-group">

                <label for="inputPassword3" class="col-sm-2 control-label">Price Range and Sample Cost sheets</label>

                <div class="col-sm-5">

                    <textarea  class="form-control" rows="5" id="" placeholder="Price Range and Sample Cost sheets" name="price_range" required><?=$get_data['price_range'];?></textarea>

                </div>

            </div>
<div class="form-group">

                <label for="inputPassword3" class="col-sm-2 control-label">Current Scheme</label>

                <div class="col-sm-5">

                    <textarea  class="form-control" rows="5" id="" placeholder="Current Scheme" name="current_scheme" required><?=$get_data['current_scheme'];?></textarea>

                </div>

            </div>
<div class="form-group">

                <label for="inputPassword3" class="col-sm-2 control-label">Developer’s History</label>

                <div class="col-sm-5">

                    <textarea  class="form-control" rows="5" id="" placeholder="Developer’s History" name="developer_history" required><?=$get_data['developer_history'];?></textarea>

                </div>

            </div>

            <div class="form-group">

                <label for="inputPassword3" class="col-sm-2 control-label">Financial</label>

                <div class="col-sm-5">

                    <textarea  class="form-control" rows="5" id="editor3" placeholder="" name="financial" required><?=$get_data['financial'];?></textarea>

                </div>

            </div>
            <div class="form-group">

                <label for="inputPassword3" class="col-sm-2 control-label">Project Layout</label>

                <div class="col-sm-5">

                    <textarea  class="form-control" rows="5" id="editor4" placeholder="" name="borrow_record" required><?=$get_data['borrow_record'];?></textarea>

                </div>

            </div>

            <div class="form-group">

                <label for="inputPassword3" class="col-sm-2 control-label">Image</label>

                <div class="col-sm-5">

                    <input type="file" class="form-control" id="service_img" placeholder="" name="service_img" >

                </div>

            </div> 

            <?PHP if($get_data['service_img']!='' && file_exists(INNER_IMAGE.$get_data['service_img']))

                {

                ?>


                    <div class="field-group">

                        <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>

                        <div><img src="<?PHP echo INNER_IMAGE.$get_data['service_img']?>" height="60"/></div>

                    </div>

                <?PHP 

                }

                ?> 
                 <br>
             <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Details page Image's</label>
                <div class="col-sm-5">
                    <input type="file" class="form-control" id="image" placeholder="Product Image" name="image1[]" multiple>
                    <div id="multi_img">
                    <?PHP
                    $proid=$get_product['sid'];
                    //$get_product2 = $pm->getTableDetails(DTABLE_MULTIIMG,'product_rid',$proid);

        $sql2 = "SELECT * FROM ".TABLE_PROJECT_IMG." where post_id='".$get_data['id']."' ORDER BY id DESC";
            $res2 = $db->selectData($sql2);
            while($row_rec2 = $db->getRow($res2)){
            
             ?>

<div style="margin-top: 10px;float: left;margin-right: 10px;position: relative;padding-top: 20px;"><span style="cursor:pointer;position: absolute;top:0px;left:0px;right:0px;display: block;text-align: center;" onclick="del_img(<?=$row_rec2['id'];?>,'<?=$row_rec2[post_id];?>')">Remove</span><img src="<?PHP echo INNER_IMAGE.$row_rec2['image'];?>" height="60"/></div>

         <?php } ?>
                </div>
            </div>
            <div class="col-sm-5" style="float: right;">
                <p id="alert_rem" style="color: green;font-size: 16px;font-weight: 600;display: none">Image Removed Successfully</p>
            </div>
            </div>

                <div class="box-footer">                    

                    <a href="project_info_list.php" type="button" class="btn btn-info">Close</a>

                    <button type="submit" class="btn btn-info">Submit</button>

                </div>



                </div>

            </form>

            </div>

        </section>

        

        </div>

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

function get_cat(val) {
//alert(val);

$.ajax({
type: "POST",
url: "get_location.php",
data: 'val=' + val,
cache: false,
success: function(html) {
//alert(html);

   
$("#pro_location").html(html);


}
});

return false;
}
</script> 