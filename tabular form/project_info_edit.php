<?php 

include('includes/admin_top.php'); 

    $msg ="";

    $editid = $_REQUEST['edit'];

    $page_title = 'Update - Project Page Content';



    if(isset($_POST['update_banner']) && $_POST['update_banner']=='update_banner'){
		
		/***********************************************************************************************/
			
			
			
			if($_FILES['financial_pdf2']['name']!=''){
            $arr=getimagesize($_FILES['financial_pdf2']['tmp_name']);
            $userfile_extn = end(explode(".", strtolower($_FILES['financial_pdf2']['name'])));
            if(($userfile_extn =="pdf")){
					$tmp_name = $_FILES['financial_pdf2']['tmp_name'];
					$name = time()."_".$_FILES['financial_pdf2']['name'];
					move_uploaded_file($tmp_name, INNER_IMAGE.$name);
                    $_POST['financial_pdf2'] = $name;
            }

			}
			
			
			if($_FILES['financial_pdf3']['name']!=''){
            $arr=getimagesize($_FILES['financial_pdf3']['tmp_name']);
            $userfile_extn = end(explode(".", strtolower($_FILES['financial_pdf3']['name'])));
            if(($userfile_extn =="pdf")){
					$tmp_name = $_FILES['financial_pdf3']['tmp_name'];
					$name = time()."_".$_FILES['financial_pdf3']['name'];
					move_uploaded_file($tmp_name, INNER_IMAGE.$name);
                    $_POST['financial_pdf3'] = $name;
            }

			}

       /******************************************************************************************/
	   		/**************************************************/
		if($_FILES['layout_image1']['name']!=''){

            $arr=getimagesize($_FILES['layout_image1']['tmp_name']);
            $userfile_extn = end(explode(".", strtolower($_FILES['layout_image1']['name'])));

            if(($userfile_extn =="jpeg"||$userfile_extn =="jpg" || $userfile_extn =="png" || $userfile_extn =="gif")){
                $tmp_name = $_FILES['layout_image1']['tmp_name'];
                $name = time()."_".$_FILES['layout_image1']['name'];
                move_uploaded_file($tmp_name, ADMIN_LAYOUT_IMAGE_PATH.$name);
                $_POST['layout_image1'] = $name;
            }
            else{
                $msg="Must be .jpeg/.jpg/.png/.gif please check extension";
            }
        }
		
		
		if($_FILES['layout_image2']['name']!=''){

            $arr=getimagesize($_FILES['layout_image2']['tmp_name']);
            $userfile_extn = end(explode(".", strtolower($_FILES['layout_image2']['name'])));

            if(($userfile_extn =="jpeg"||$userfile_extn =="jpg" || $userfile_extn =="png" || $userfile_extn =="gif")){
                $tmp_name = $_FILES['layout_image2']['tmp_name'];
                $name = time()."_".$_FILES['layout_image2']['name'];
                move_uploaded_file($tmp_name, ADMIN_LAYOUT_IMAGE_PATH.$name);
                $_POST['layout_image2'] = $name;
            }
            else{
                $msg="Must be .jpeg/.jpg/.png/.gif please check extension";
            }
        }
		
		
		if($_FILES['layout_image3']['name']!=''){

            $arr=getimagesize($_FILES['layout_image3']['tmp_name']);
            $userfile_extn = end(explode(".", strtolower($_FILES['layout_image3']['name'])));

            if(($userfile_extn =="jpeg"||$userfile_extn =="jpg" || $userfile_extn =="png" || $userfile_extn =="gif")){
                $tmp_name = $_FILES['layout_image3']['tmp_name'];
                $name = time()."_".$_FILES['layout_image3']['name'];
                move_uploaded_file($tmp_name, ADMIN_LAYOUT_IMAGE_PATH.$name);
                $_POST['layout_image3'] = $name;
            }
            else{
                $msg="Must be .jpeg/.jpg/.png/.gif please check extension";
            }
        }
		
		
		/***************************************************/

        //$_POST['random_rera_number'] = rand(0000000,9999999999);

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


if($_FILES['financial_pdf1']['name']!=''){

            $arr=getimagesize($_FILES['financial_pdf1']['tmp_name']);

            $userfile_extn = end(explode(".", strtolower($_FILES['financial_pdf1']['name'])));

            
            if(($userfile_extn =="pdf")){

               

                    $tmp_name = $_FILES['financial_pdf1']['tmp_name'];

                    $name = time()."_".$_FILES['financial_pdf1']['name'];

                    move_uploaded_file($tmp_name, INNER_IMAGE.$name);

                    $_POST['financial_pdf'] = $name;


            }

        }


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
                        $_POST['post_id'] = $editid;
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


            $db->updateArray(TABLE_PROJECT,$_POST, "id=".$editid) or die(mysql_error());
           $checkbox1 = $_POST['project_update_desc'];
            for($count=0;$count<count($checkbox1);$count++)
        {
            $editid2=$_POST['pid'][$count];

             $data['project_update_desc']=$_POST['project_update_desc'][$count];
            $data['project_update_date']=$_POST['project_update_date'][$count];
            //$chk.=$count;
            if($editid2!=''){
            $db->updateArray(TABLE_PROJECT_PART,$data, "id=".$editid2) or die(mysql_error());
        }else{
            $data['project_id']=$editid;
            $db->insertDataArray(TABLE_PROJECT_PART,$data);
        }
        }

            $msg_class = 'alert-success';

            $msg = MSG_EDIT_SUCCESS;

        

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

                
<!--<input type="hidden" name="random_rera_number" value="random_rera_number">-->
               

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

                    <select class="form-control" onchange="get_cat5(this.value)" id="pro_type" name="pro_type" required>
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
            $sql = "SELECT * FROM ".DTABLE_LOCATION."  ORDER BY name asc";
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

                    <textarea  class="form-control" rows="10" id="" placeholder="Developer’s History" name="developer_history" required><?=$get_data['developer_history'];?></textarea>

                </div>

            </div>

            <div class="form-group">

                <label for="inputPassword3" class="col-sm-2 control-label">Financial</label>

                <div class="col-sm-5">

                    <textarea  class="form-control" rows="5" id="editor3" placeholder="" name="financial" required><?=$get_data['financial'];?></textarea>

                </div>

            </div>
			<div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Financial Pdf Title 1</label>
                <div class="col-sm-5">
                    <input type="text" value="<?=$get_data['financial_pdf_title_1'];?>" class="form-control" id="financial-pdf-title-1" placeholder="Financial Pdf Title 1" name="financial_pdf_title_1">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Financial Pdf 1</label>
                <div class="col-sm-5">
                    <input type="file" class="form-control" id="financial_pdf" placeholder="" name="financial_pdf1" >
                </div>
            </div>
            <?PHP if($get_data['financial_pdf']!='' && file_exists(INNER_IMAGE.$get_data['financial_pdf']))

                {

                ?>
                    <div class="field-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                        <div><a target="_blank" href="<?PHP echo INNER_IMAGE.$get_data['financial_pdf']?>" />Click here to view pdf<a></div>
                    </div>

                <?PHP  } ?> 
                 <br>
				 <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Financial Pdf Title 2</label>
                <div class="col-sm-5">
                    <input type="text" value="<?=$get_data['financial_pdf_title_2'];?>" class="form-control" id="financial_pdf_title_2" placeholder="Financial Pdf Title 2" name="financial_pdf_title_2" >
                </div>
            </div>
			
			<div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Financial Pdf 2</label>
                <div class="col-sm-5">
                    <input type="file" class="form-control" id="financial_pdf2" placeholder="" name="financial_pdf2" >
                </div>
            </div>
            <?PHP if($get_data['financial_pdf2']!='' && file_exists(INNER_IMAGE.$get_data['financial_pdf2']))

                {

                ?>
                    <div class="field-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                        <div><a target="_blank" href="<?PHP echo INNER_IMAGE.$get_data['financial_pdf2']?>" />Click here to view pdf<a></div>
                    </div>

                <?PHP  } ?> 
				<br>
				<div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Financial Pdf Title 3</label>
                <div class="col-sm-5">
                    <input type="text" value="<?=$get_data['financial_pdf_title_3'];?>" class="form-control" id="financial-pdf-title-3" placeholder="Financial Pdf Title 3" name="financial-pdf-title-3">
                </div>
            </div>
				<div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Financial Pdf 3</label>
                <div class="col-sm-5">
                    <input type="file" class="form-control" id="financial_pdf3" placeholder="" name="financial_pdf3" >
                </div>
            </div>
            <?PHP if($get_data['financial_pdf3']!='' && file_exists(INNER_IMAGE.$get_data['financial_pdf3']))

                {

                ?>
                    <div class="field-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                        <div><a target="_blank" href="<?PHP echo INNER_IMAGE.$get_data['financial_pdf3']?>" />Click here to view pdf<a></div>
                    </div>

                <?PHP  } ?> 
<br>
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

            <?PHP if($get_data['service_img']!='' && file_exists(INNER_IMAGE.$get_data['service_img'])){?>
					<div class="field-group">
					<label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
					<div><img src="<?PHP echo INNER_IMAGE.$get_data['service_img']?>" height="60"/></div>
                    </div>
            <?PHP } ?> 
				
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
			
				<!------------------------------------------lay Out Three Image---------------------->
			<div class="form-group">
                <label for="inputPassword3" class="col-lg-4 control-label"><h4>Layout Image Section</h4></label>
             </div>
            
			 <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Layout Title 1</label>
                <div class="col-sm-5">
                    <input type="text" value="<?=$get_data['layout_title_1'];?>" class="form-control" id="layout_title_1" placeholder="Layout Title 1" name="layout_title_1" >
                </div>
            </div>
           
			<div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Layout Image 1</label>
                <div class="col-sm-5">
                    <input type="file" class="form-control" id="layout_image1" placeholder="" name="layout_image1">
                </div>
            </div> 
			
			 <?PHP if($get_data['layout_image1']!='' && file_exists(ADMIN_LAYOUT_IMAGE_PATH.$get_data['layout_image1'])){?>
					<div class="field-group">
					<label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
					<div><img src="<?PHP echo ADMIN_LAYOUT_IMAGE_PATH.$get_data['layout_image1']?>" height="60"/></div>
                    </div>
            <?PHP } ?> 
			<br>
			
			 <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Layout Title 2</label>
                <div class="col-sm-5">
                    <input type="text" value="<?=$get_data['layout_title_2'];?>" class="form-control" id="layout_title_2" placeholder="Layout Title 2" name="layout_title_2" >
                </div>
            </div>
			
			<div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Layout Image 2</label>
                <div class="col-sm-5">
                    <input type="file" class="form-control" id="layout_image2" placeholder="" name="layout_image2" >
                </div>

            </div> 
			
			 <?PHP if($get_data['layout_image2']!='' && file_exists(ADMIN_LAYOUT_IMAGE_PATH.$get_data['layout_image2'])){?>
					<div class="field-group">
					<label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
					<div><img src="<?PHP echo ADMIN_LAYOUT_IMAGE_PATH.$get_data['layout_image2']?>" height="60"/></div>
                    </div>
            <?PHP } ?> 
			<br>
		
			 <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Layout Title 3</label>
                <div class="col-sm-5">
                    <input type="text" value="<?=$get_data['layout_title_3'];?>" class="form-control" id="layout_title_3" placeholder="Layout Title 3" name="layout_title_3" >
                </div>
            </div>
			<div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Layout Image 3</label>
                <div class="col-sm-5">
                    <input type="file" class="form-control" id="layout_image3" placeholder="" name="layout_image3" >
                </div>
            </div> 
			 <?PHP if($get_data['layout_image3']!='' && file_exists(ADMIN_LAYOUT_IMAGE_PATH.$get_data['layout_image3'])){?>
					<div class="field-group">
					<label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
					<div><img src="<?PHP echo ADMIN_LAYOUT_IMAGE_PATH.$get_data['layout_image3']?>" height="60"/></div>
                    </div>
            <?PHP } ?> 
			<!-------------------------------------------------------------------------------------------------->
			<br>
			<div class="form-group">

                <label for="inputPassword3" class="col-sm-2 control-label">RERA Number</label>

                <div class="col-sm-5">   
					<label for="inputPassword3" class="form-control"><?=$get_data['random_rera_number'];?></label>
                </div>

            </div>

            <br>

            <table class="table table-bordered">



        <thead>





            <tr>

                <th>Project update</th>

                <th>Date</th>
              

                <th></th>

            </tr>





        </thead>



        <tbody class="itm_po_tbl">
        <?php 
            $i=0;
            $j='';
            $sql_part = "SELECT * FROM ".TABLE_PROJECT_PART." where project_id='$editid' ORDER BY id ASC";
            $res_part = $db->selectData($sql_part);
            while($row_rec_part = $db->getRow($res_part)){
                $i++;

            ?>

           <tr id="itm_po_tbl_row_<?=$i;?>">
            <input type="hidden" name="pid[]" value="<?=$row_rec_part['id'];?>">

                 <td>



                   <div class="form-group">

           

                <div class="col-sm-12">

                    <input type="text" class="form-control" name="project_update_desc[]" id="project_update_desc_<?=$i;?>" value="<?=$row_rec_part['project_update_desc'];?>" placeholder="Description" required >

                    

                </div>

            </div>





                </td>



                <td>



                   

                   <div class="form-group">

           

                <div class="col-sm-12">

                    

             <input type="date" class="form-control" name="project_update_date[]" id="project_update_date_<?=$i;?>" value="<?=$row_rec_part['project_update_date'];?>"  required >

                </div>

            </div>



                </td>

<?php if($i>1){?>
                <td><div class="row_delete" style="color: red;cursor: pointer;font-size: 20px;font-weight: 600;" onclick="deleteItemQuot('#itm_po_tbl_row_<?=$i;?>','<?=$row_rec_part['id'];?>');">&cross;</div></td>

            <?php }?>
                                    

            </tr>
           
            <?php
            $j=$i;
            }
            ?>
            <script type="text/javascript">
                
                
                 itm_po2=<?=$j;?>
            </script>
        

        </tbody>

    </table>



<div  style="float: right;margin-right: 20px; cursor: pointer;" onclick="add_item_po();">

                            Add More

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

$( document ).ready(function() {
$("#financial_pdf1").change(function() {
        var file = this.files[0];
        var imagefile = file.type;
               var match= ["application/pdf"];
        if(!((imagefile==match[0]))){
            alert('Please select a valid image file (PDF).');
            $("#financial_pdf1").val('');
            return false;
        }
    });

     });
</script>
<script type="text/javascript">

               itm_po=<?=$j+1;?>;

           function add_item_po() {


        var st = '<tr id="itm_po_tbl_row_' + itm_po + '">'

                    + '<td><input type="text" name="project_update_desc[]" id="project_update_desc_' + itm_po + '" class="form-control select" placeholder="Description"></td>'

                    + '<td><input type="date" class="form-control" name="project_update_date[]" id="project_update_date_' + itm_po + '" value="" placeholder="" ></td>'

                    
                    + '<td><div style="color: red;cursor: pointer;font-size: 20px;font-weight: 600;" class="row_delete" onclick="deleteItemQuot(\'#itm_po_tbl_row_' + itm_po + '\',\'' + 0 + '\');">&cross;</div></td>'

                    + '</tr>';

            $(".itm_po_tbl").append(st);

            itm_po++;

        }

        

        function deleteItemQuot(elm,id) {
   
    
    if(id!='0'){
        var result = confirm("Are you sure to delete?");
if (result) {
        $.ajax({
        type: "POST",
        url: "get_project_partdel.php",
        data: 'val=' + id,
        cache: false,
        success: function(html) {
        //alert(html);


        }
        });
         $(elm).remove();
           }     
        }else{

            $(elm).remove();
       }
            //--eml;
        }

</script> 