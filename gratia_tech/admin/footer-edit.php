<?php 
include('includes/admin_top.php'); 
    $msg ="";
    $editid = $_REQUEST['edit'];
    $page_title = 'Update - Footer';

    if(isset($_POST['update_footer']) && $_POST['update_footer']=='update_footer'){
        $db->updateArray(LUAAS_FOOTER,$_POST, "id=".$editid) or die(mysql_error());
        $msg_class = 'alert-success';
        $msg = MSG_EDIT_SUCCESS;
    }
    $get_footer = $pm->getTableDetails(LUAAS_FOOTER,'id',$editid);
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
            
                <input type="hidden" name="update_footer" value="update_footer">
                <div class="box-body">

                <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                    <textarea id="editor1" name="description" rows="10" cols="80"><?php echo $get_footer['description']; ?></textarea>
                </div>
                </div>

                <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Help Line Number</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="" name="help_no" required value="<?php echo $get_footer['help_no']; ?>">                    
                </div>
                </div>

                <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">YouTube</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="" name="youtube" value="<?php echo $get_footer['youtube']; ?>">                    
                </div>
                </div>

                <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Facebook</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="" name="facebook" value="<?php echo $get_footer['facebook']; ?>">                    
                </div>
                </div>
                
                <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Twitter</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="" name="twitter" value="<?php echo $get_footer['twitter']; ?>">                    
                </div>
                </div>

                <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Instagram</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="" name="instagram" value="<?php echo $get_footer['instagram']; ?>">                    
                </div>
                </div>

                <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Google Plus</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="" name="gplus" value="<?php echo $get_footer['gplus']; ?>">                    
                </div>
                </div>

                <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Linkedin</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="" name="linkedin" value="<?php echo $get_footer['linkedin']; ?>">                    
                </div>
                </div>

                <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Pinterest</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="" name="pinterest" value="<?php echo $get_footer['pinterest']; ?>">                    
                </div>
                </div>

                <div class="box-footer">                    
                    <a href="footer-list.php" type="button" class="btn btn-info">Close</a>
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