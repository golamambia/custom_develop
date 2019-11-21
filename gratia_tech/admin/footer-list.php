<?php 
include('includes/admin_top.php');
    $msg ="";
    $deleteid = $_REQUEST['delete'];
    $page_title = 'Footer Details';
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
            <tr>              
                <th>Description</th>
                <th>Help Line No.</th>
                <th>YouTube</th>
                <th>Facebook</th>
                <th>Twitter</th>
                <th>Instagram</th>
                <th>Google Plus</th>
                <th>Linkedin</th>
                <th>Pinterest</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sql = "SELECT * FROM ".LUAAS_FOOTER." ORDER BY id DESC";
            $res = $db->selectData($sql);
            while($row_rec = $db->getRow($res)){
            ?>
            <tr>
                <td>
                    <?php echo substr($row_rec['description'], 0, 30) . '...'; ?>
                </td>
                <td>
                    <?php echo $row_rec['help_no']; ?>
                </td>
                <td>
                <a target="_blank" href="<?php echo $row_rec['youtube']; ?>"><i class="fa fa-youtube fa-3" aria-hidden="true"></i></a>
                </td>
                <td>
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </td>
                <td>
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </td>
                <td>
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </td>
                <td>
                    <i class="fa fa-google-plus" aria-hidden="true"></i>
                </td>
                <td>
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                </td>
                <td>
                    <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                </td>
                <td>
                    <a href="footer-edit.php?edit=<?php echo $row_rec['id']; ?>" title="Edit"><img src="images/pencil.png" width="16" height="16" alt=""></a>                    
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