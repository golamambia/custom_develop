<?php 
include('includes/admin_top.php'); 
    $msg ="";
    $page_title = 'Please Upload only CSV File';
    // $id = $_REQUEST['id'];

    if (isset($_POST["import"])) {
    
 $filename1=$_FILES["file"]["name"];
  $filename=$_FILES["file"]["tmp_name"];

 $ex=explode(".",$filename1);
 $ext=$ex[1];
//we check,file must be have csv extention
if($ext=="csv")
{
   $file = fopen($filename, "r");
    $emapData = fgetcsv($file, 10000, ",");
    
    
         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
         {
            $date = date('Y-m-d');
               
           $wrk_date=date('Y-m-d',strtotime($emapData[2]));
           echo  $sql = "INSERT into ".DTABLE_BHATTA_PATHAI_REG_REPORT." (emp_type,emp_name,work_day,total_bricks_day,entry_date) values ('".$emapData[0]."','".$emapData[1]."','".$wrk_date."','".$emapData[3]."','".$date."')".'<br>';
            
            //mysql_query($sql);
         }
         fclose($file);
         //echo "CSV File has been successfully Imported.";
            $msg_class = 'alert-success';
            $msg = MSG_ADD_SUCCESS;
}
else {
    //echo "Error: Please Upload only CSV File";
    $msg_class = 'alert-error';
    $msg = "Error: Please Upload only CSV File";
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
            <input type="hidden" name="add_slider" value="add_slider">
            <div class="box-body">
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Excel Upload</label>
                <div class="col-sm-5">
                    <input type="file" class="form-control" name="file" id="file" size="150">
                </div>
                <div class="col-sm-3">
                    <a style="color:white;" href="../file/pathai_reg_add_csv.csv" download > <h4 class="box-title" style="float: right;margin-top: -1px;"><span class="badge bg-orange" style="line-height: 27px;font-size: 14px;">Download Sample</span></h4></a>
                </div>

            </div>
			
			 

            <div class="box-footer">
            <a href="pathai_reg_list.php" type="button" class="btn btn-info">Close</a>
                <button type="submit" name="import" class="btn btn-info">Upload</button>
            </div>
            </div>
        </form>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
<?php include('includes/admin_footer.php'); ?> 
