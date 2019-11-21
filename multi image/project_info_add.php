<?php 

include('includes/admin_top.php'); 

    $msg ="";

    $page_title = 'Project Page Content - Add';

    // $id = $_REQUEST['id'];



    if(isset($_POST['add_work']) && $_POST['add_work']=='add_work'){

$_POST['entry_date'] = date('d-m-Y');

 if($_FILES['service_img']['name']!=''){

            $arr=getimagesize($_FILES['service_img']['tmp_name']);

            $userfile_extn = end(explode(".", strtolower($_FILES['service_img']['name'])));

            

            if(($userfile_extn =="jpeg"||$userfile_extn =="jpg" || $userfile_extn =="png" || $userfile_extn =="gif")){

               

                    $tmp_name = $_FILES['service_img']['tmp_name'];

                    $name = time()."_".$_FILES['service_img']['name'];

                    move_uploaded_file($tmp_name, INNER_IMAGE.$name);

                    $_POST['service_img'] = $name;



                    

            }else{

                $msg_class = 'alert-error';

                $msg="Must be .jpeg/.jpg/.png/.gif please check extension";

            }

        }



       

            $get_last_id = $db->insertDataArray(TABLE_PROJECT,$_POST);

                    if(!empty($get_last_id)):
                        if($_FILES['image1']['name']!=''){
            $filename = $_FILES['image1']['name'];
            $file_tmp = $_FILES['image1']['tmp_name'];
            $filetype = $_FILES['image1']['type'];
            $filesize = $_FILES['image1']['size'];
            
            for($i=0; $i<=count($file_tmp); $i++){
                if(!empty($file_tmp[$i])){
                    $arr=getimagesize($file_tmp[$i]);
                    $userfile_extn = end(explode(".", strtolower($filename[$i])));
                    
                    if(($userfile_extn =="jpeg"||$userfile_extn =="jpg" || $userfile_extn =="png" || $userfile_extn =="gif")){
                        $tmp_name = $file_tmp[$i];
                        $name = time()."_".$filename[$i];
                        //$name2.=$name.",";
                        move_uploaded_file($tmp_name, INNER_IMAGE.$name);
                        $_POST['image'] = $name;
                        $_POST['post_id'] = $get_last_id;
                         $get_last_id1 = $db->insertDataArray(TABLE_PROJECT_IMG,$_POST);
                    }
                    else{
                        $msg="Picture's must be .jpeg/.jpg/.png/.gif please check extension";
                    }
                }
                else{
                    $msg="Please select some images...";
                }
            }
        }
                    $msg_class = 'alert-success';

                    $msg = MSG_ADD_SUCCESS;

                    else:

                    $msg_class = 'alert-error';

                    $msg = MSG_ADD_FAIL;

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

            <input type="hidden" name="add_work" value="add_work">

            <div class="box-body">



            <div class="form-group">

                <label for="inputPassword3" class="col-sm-2 control-label">Title</label>

                <div class="col-sm-5">

                    <input type="text" class="form-control" id="title" placeholder="Title" name="title" required>

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
                        <option value="<?=$row_rec['id'];?>"><?=ucfirst($row_rec['title']);?></option>
                       <?php }?>
                        
                        </select> 
                </div>

            </div><div class="form-group">

                <label for="inputPassword3" class="col-sm-2 control-label">Project Location</label>

                <div class="col-sm-5">

                    <select class="form-control" id="pro_location" name="pro_location" required>
                       
             
                        <option value="">--Select One--</option>
                      
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
                        <option value="<?=$row_rec['id'];?>"><?=ucfirst($row_rec['title']);?></option>
                       <?php }?>
                        
                        </select> 
                </div>

            </div>

            <div class="bootstrap-timepicker">

                <div class="form-group">

                  <label for="inputPassword3" class="col-sm-2 control-label">Short Description</label>



                  <div class="col-sm-5">

                    <input type="text" class="form-control"  id="title" placeholder="Short description" name="time"  required>



                    

                  </div>

                  <!-- /.input group -->

                </div>

                <!-- /.form group -->

              </div>

            <div class="form-group">

                <label for="inputPassword3" class="col-sm-2 control-label">Description</label>

                <div class="col-sm-5">

                    <textarea  class="form-control" rows="5" id="editor1" placeholder="Type somthing" name="description" required></textarea>

                </div>

            </div>

            <div class="form-group">

                <label for="inputPassword3" class="col-sm-2 control-label">Location</label>

                <div class="col-sm-5">

                    <input type="text" class="form-control" id="location" placeholder="Enter Location" name="location" required>

                </div>

            </div>

            
            <div class="form-group">

                <label for="inputPassword3" class="col-sm-2 control-label">Investment Details</label>

                <div class="col-sm-5">

                    <textarea  class="form-control" rows="5" id="editor2" placeholder="" name="invesment" required></textarea>

                </div>

            </div>
<div class="form-group">

                <label for="inputPassword3" class="col-sm-2 control-label">Price Range and Sample Cost sheets</label>

                <div class="col-sm-5">

                    <textarea  class="form-control" rows="5" id="" placeholder="Price Range and Sample Cost sheets" name="price_range" required></textarea>

                </div>

            </div>
<div class="form-group">

                <label for="inputPassword3" class="col-sm-2 control-label">Current Scheme</label>

                <div class="col-sm-5">

                    <textarea  class="form-control" rows="5" id="" placeholder="Current Scheme" name="current_scheme" required></textarea>

                </div>

            </div>
<div class="form-group">

                <label for="inputPassword3" class="col-sm-2 control-label">Developer’s History</label>

                <div class="col-sm-5">

                    <textarea  class="form-control" rows="5" id="" placeholder="Developer’s History" name="developer_history" required></textarea>

                </div>

            </div>


            <div class="form-group">

                <label for="inputPassword3" class="col-sm-2 control-label">Financial</label>

                <div class="col-sm-5">

                    <textarea  class="form-control" rows="5" id="editor3" placeholder="" name="financial" required></textarea>

                </div>

            </div>
            <div class="form-group">

                <label for="inputPassword3" class="col-sm-2 control-label">Project Layout</label>

                <div class="col-sm-5">

                    <textarea  class="form-control" rows="5" id="editor4" placeholder="" name="borrow_record" required></textarea>

                </div>

            </div>
    

            <div class="form-group">

                <label for="inputPassword3" class="col-sm-2 control-label">Image</label>

                <div class="col-sm-5">

                    <input type="file" class="form-control" id="service_img" placeholder="" name="service_img" required>

                </div>

            </div> 

<div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Details page Image's</label>
                <div class="col-sm-5">
                    <input type="file" class="form-control" id="image" placeholder="Product Image" name="image1[]" multiple>
                    
            </div>
            
            </div>

            <div class="box-footer">

            <a href="project_info_list.php" type="button" class="btn btn-info">Back</a>

                <button type="submit" class="btn btn-info">Submit</button>

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

