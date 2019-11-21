<?php 
include('includes/admin_top.php');
    $msg ="";
    //$deleteid = $_REQUEST['delete'];
	 if(isset($_REQUEST['delete']) && $_REQUEST['delete']!="")
	{
		$deleteid = $_REQUEST['delete'];
	}
    $page_title = 'City List';

    if(isset($deleteid) && $deleteid!=""){
        $db->deleteData(TABLE_CITY,"id=".$deleteid);
        $msg_class = 'alert-success';
        $msg = MSG_DELETE_SUCCESS;
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
    <div class="box-body">
    <table id="example1" class="table table-bordered table-striped tableGrid">
        <thead>
        <a href="city_add.php" type="button" class="btn btn-info">Add</a>
            <tr>
                <th>State Name</th>
                <th>City Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sql = "SELECT * FROM ".TABLE_CITY." ORDER BY id DESC";
            $res = $db->selectData($sql);
            while($row_rec = $db->getRow($res)){
            ?>
            <tr>
                <td>
                    <?php 
                    $id=$row_rec['sid'];
                    echo mysql_fetch_assoc(mysql_query("SELECT * FROM ".TABLE_STATE." where id='$id'"))['name']; ?>
                </td>
				  <td>
                    <?php echo $row_rec['name']; ?>
                    
                </td>
                
                
                <td>
                    <a href="city_edit.php?edit=<?php echo $row_rec['id']; ?>" title="Edit"><img src="images/pencil.png" width="16" height="16" alt=""></a>
                    <a href="city_list.php?delete=<?php echo $row_rec['id']; ?>" title="Delete"  onClick="return confirm('Are you sure you to delete this data?');">
                    <img src="images/cross.png" width="16" height="16" alt="">
                    </a> 
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
    </div>
    </section>
</div>
<!-- /.content-wrapper -->
<?php include('includes/admin_footer.php'); ?> 