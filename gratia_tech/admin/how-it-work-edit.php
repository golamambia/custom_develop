<?php 
include('includes/admin_top.php'); 
    $msg ="";
    $editid = $_REQUEST['edit'];
    $page_title = 'Update - How It Work';

    if(isset($_POST['update_banner']) && $_POST['update_banner']=='update_banner'){
        if($_FILES['image_browse']['name']!=''){

            $arr=getimagesize($_FILES['image_browse']['tmp_name']);
            $userfile_extn = end(explode(".", strtolower($_FILES['image_browse']['name'])));

            if(($userfile_extn =="jpeg"||$userfile_extn =="jpg" || $userfile_extn =="png" || $userfile_extn =="gif")){               
                $tmp_name = $_FILES['image_browse']['tmp_name'];
                $name = time()."_".$_FILES['image_browse']['name'];
                move_uploaded_file($tmp_name, HOW_IT_WOTK_IMAGE_PATH.$name);
                $_POST['image_browse'] = $name;

                $db->updateArray(LUAAS_HOW_IT_WORK,$_POST, "id=".$editid) or die(mysql_error());
                $msg_class = 'alert-success';
                $msg = MSG_EDIT_SUCCESS;                
            }
            else{
                $msg_class = 'alert-error';
                $msg="Must be .jpeg/.jpg/.png/.gif please check extension";
            }
        }else{
            $db->updateArray(LUAAS_HOW_IT_WORK,$_POST, "id=".$editid) or die(mysql_error());
            $msg_class = 'alert-success';
            $msg = MSG_EDIT_SUCCESS;
        }
    }
    $get_how_it_work = $pm->getTableDetails(LUAAS_HOW_IT_WORK,'id',$editid);
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

                <?PHP if($get_how_it_work['image_browse']!='' && file_exists(HOW_IT_WOTK_IMAGE_PATH.$get_how_it_work['image_browse']))
                {
                ?>
                    <div class="field-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                        <div><img src="<?PHP echo HOW_IT_WOTK_IMAGE_PATH.$get_how_it_work['image_browse']?>" height="60"/></div>
                    </div>
                <?PHP 
                }
                ?> 
                <br>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Select Logo Image</label>
                    <div class="col-sm-5">
                        <input type="file" class="form-control" id="image_browse" placeholder="" name="image_browse" >
                    </div>
                </div>


                <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="" name="title" required value="<?php echo $get_how_it_work['title']; ?>">                    
                </div>
                </div>


                <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="" name="description" required value="<?php echo $get_how_it_work['description']; ?>">                    
                </div>
                </div>

                <div class="box-footer">                    
                    <a href="how-it-work-list.php" type="button" class="btn btn-info">Close</a>
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