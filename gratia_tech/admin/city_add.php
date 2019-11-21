<?php 
include('includes/admin_top.php'); 
    $msg ="";
    $page_title = 'City - Add';
    // $id = $_REQUEST['id'];

    if(isset($_POST['add_city']) && $_POST['add_city']=='add_city'){

    $get_last_id = $db->insertDataArray(TABLE_CITY,$_POST);
    if(!empty($get_last_id)):
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
            <input type="hidden" name="add_city" value="add_city">
            <div class="box-body">

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">State</label>
                <div class="col-sm-5">
                <select class="form-control" required name="sid" id="sid">
            <option value="">--Select State--</option>
         <?php 
            $sql = "SELECT * FROM ".TABLE_STATE." ORDER BY name asc";
            $res = $db->selectData($sql);
            while($row_rec = $db->getRow($res)){
            ?>
            <option value="<?=$row_rec['id'];?>"><?=$row_rec['name'];?></option>
          <?php }?>
         </select>
                </div>
            </div>
			<div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">City name</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" placeholder="name" name="name" required>
                </div>
            </div>
			 
            

            <div class="box-footer">
            <a href="city_list.php" type="button" class="btn btn-info">Back</a>
                <button type="submit" class="btn btn-info">Add</button>
            </div>
            </div>
        </form>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
<?php include('includes/admin_footer.php'); ?> 