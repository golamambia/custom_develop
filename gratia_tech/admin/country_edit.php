<?php 
include('includes/admin_top.php'); 
    $msg ="";
    $editid = $_REQUEST['edit'];
    $page_title = 'Update - country';

    if(isset($_POST['update_country']) && $_POST['update_country']=='update_country'){
		
        $db->updateArray(TABLE_COUNTRY,$_POST, "id=".$editid) or die(mysql_error());
        $msg_class = 'alert-success';
        $msg = MSG_EDIT_SUCCESS;
    }
    $get_country = $pm->getTableDetails(TABLE_COUNTRY,'id',$editid);
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
            
                <input type="hidden" name="update_country" value="update_country">
                <div class="box-body">

               
                <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="Country name" name="name" required value="<?php echo $get_country['name']; ?>">
                </div>
            </div>
				


              

                <div class="box-footer">                    
                    <a href="country_list.php" type="button" class="btn btn-info">Close</a>
                    <button type="submit" class="btn btn-info">update</button>
                </div>

                </div>
            </form>
            </div>
        </section>
        
        </div>
    </div>
<!-- /.content-wrapper -->
<?php include('includes/admin_footer.php'); ?> 