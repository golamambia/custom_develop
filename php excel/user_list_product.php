<?php 
include('includes/admin_top.php');
    $msg ="";
    $id = $_REQUEST['id'];
    $page_title = 'Product List';
    if(isset($id) && $id!=""){
    $db->deleteData(USER_TABLE_PRODUCT,"id=".$id);
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
            <div class="row">
<div class="col-xs-8">
        <a href="user_add_product.php" type="button" class="btn btn-info">Add</a>
    </div>
        <div class="col-xs-4">
        <a style="color:white;" href="user_list_product_excel.php"> <h4 class="box-title" style="float: right;margin-top: -1px;"><span class="badge bg-orange" style="height: 31px;line-height: 27px;width: 115px;font-size: 14px;">Export To Excel</span></h4></a>
    </div>
</div>
            <tr>
                <th>Picture</th>
                <th>Title</th>
                <th>Product Type</th>
                <th>Location</th>
                <th>Price</th> 
                <th>Quantity</th> 
                <th>Description</th>                 
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sql = "SELECT * FROM ".USER_TABLE_PRODUCT." ORDER BY id DESC";
            $res = $db->selectData($sql);
            while($row_rec = $db->getRow($res)){
            ?>
            <tr>
                <td>
                    <img src="<?PHP echo $row_rec['image']?>" style="height: 10%;"/>
                </td>
                <td>
                    <?php echo $row_rec['title']; ?>
                </td>
                <td>
                    <?php echo $row_rec['product_type']; ?>
                </td>
                <td>
                    <?php echo $row_rec['location']; ?>
                </td>
                <td>
                    <?php echo $row_rec['price']; ?>
                </td>
                <td>
                    <?php echo $row_rec['quantity']; ?>
                </td>
                <td>
                    <?php echo $row_rec['description']; ?>
                </td>
                <td>
                    <a href="user_edit_product.php?id=<?php echo $row_rec['id']; ?>" title="Edit"><img src="images/pencil.png" width="16" height="16" alt=""></a>
                    <a href="user_list_product.php?id=<?php echo $row_rec['id']; ?>" title="Delete"  onClick="return confirm('Are you sure you to delete this data?');">
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