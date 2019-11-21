<?php 
include('includes/admin_top.php');
    $msg ="";
    $deleteid = $_REQUEST['delete'];
    $page_title = 'Item Challan - List';

    if(isset($deleteid) && $deleteid!=""){
        $db->deleteData(TABLE_CHALLAN,"id=".$deleteid);
        $db->deleteData(TABLE_CHALLAN_PART,"challan_id=".$deleteid);
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
        <a href="item_challan_add.php" type="button" class="btn btn-info">Add</a>
            <tr>
                
                <th>Company</th>                
                <th>Department</th>
                <th>PO. No.</th>                
                <th>Challan Date</th>
                <th>Challan No</th>
                
                <th>Print</th>     
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sql = "SELECT * FROM ".TABLE_CHALLAN." ORDER BY id DESC";
            $res = $db->selectData($sql);
            while($row_rec = $db->getRow($res)){
            ?>
            <tr>
                
                
                <td>
                    
                    <?php $did=$row_rec['company'];
                        echo $sql =mysql_fetch_assoc(mysql_query("SELECT * FROM ".TABLE_COMPANY." where id='$did'"))['company'];

                     ?>
                </td>
                <td>
                    <?php $did=$row_rec['department'];
                        echo $sql =mysql_fetch_assoc(mysql_query("SELECT * FROM ".TABLE_DEPARTMENT." where id='$did'"))['department'];

                     ?>
                    
                </td>
                <td>
                    
                    <?php echo $row_rec['po_no']; ?>
                </td>
                <td>
                    <?php echo $row_rec['challan_date']; ?>
                </td>
                <td>
                    <?php echo $row_rec['challan_no']; ?>
                </td>
                
                <td style="cursor: pointer;">Print</td>
                <td>
                    <a href="item_challan_edit.php?edit=<?php echo $row_rec['id']; ?>" title="Edit"><img src="images/pencil.png" width="16" height="16" alt=""></a>
                    <a href="item_challan_list.php?delete=<?php echo $row_rec['id']; ?>" title="Delete"  onClick="return confirm('Are you sure you to delete this data?');">
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