<?php 
include('includes/admin_top.php');

$host=$_SESSION['USER']['user_id'];
    $msg ="";
    $deleteid = $_REQUEST['delete'];
    $page_title = 'FREE AND PAID EVENTS - List';

    if(isset($deleteid) && $deleteid!=""){
        $db->deleteData(TABLE_POPDETAILS,"id=".$deleteid);
        $msg_class = 'alert-success';
        $msg = MSG_DELETE_SUCCESS;
    }
    $tod=date("n/j/Y");

   if($_POST[limit_val]!=''){
$limit_val=$_POST[limit_val];
$_SESSION[limit_val]=$_POST[limit_val];
}else{
  if($_SESSION[limit_val]!=''){

$limit_val=$_SESSION[limit_val];
  }else{
$limit_val=12;
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
    <div class="box-body">
    <table id="example2" class="table table-bordered  table-hover">
        <thead>
        
            <tr>
                
               
                <th>Event Name</th>                
                <th>Type of Pop-up</th>
                <th>City</th>
                <th>Start Date</th>                
                <th>End Date</th>
                
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

if(isset($_GET["page"]))
  $page = (int)$_GET["page"];
  else
  $page = 1;

  $setLimit = $limit_val;
  $pageLimit = ($page * $setLimit) - $setLimit;
  
 $perPage = $limit_val;
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$startAt = $perPage * ($page - 1);





            if((isset($_SESSION['USER']['id'])) and ($_SESSION['USER']['id'] != "")){ 
            $sql = "SELECT * FROM ".TABLE_POPDETAILS." where hosted_by='$host' ORDER BY id DESC limit $startAt, $perPage";
                }else{
                   $sql = "SELECT * FROM ".TABLE_POPDETAILS." ORDER BY id DESC limit $startAt, $perPage";
                   $sql2 = "SELECT * FROM ".TABLE_POPDETAILS." ORDER BY id DESC ";  
                }
            $count=$db->countRows($sql2);
            $res = $db->selectData($sql);
            while($row_rec = $db->getRow($res)){

            ?>
            <tr>
                
                
                <td>
                      <?php echo $row_rec['name']; ?>
                </td>
                <td>
                   <?php $id=$row_rec['events']; 
                    echo $sql =mysql_fetch_assoc(mysql_query("SELECT * FROM ".TABLE_EVENT." where id='$id' "))['title'];

                    ?>
                   
                </td>
                <td>
                   <?php $cityid=$row_rec['city']; 
                     $sql_city =mysql_fetch_assoc(mysql_query("SELECT * FROM ".TABLE_CITY." where id='$cityid' "))['title'];
                     if($sql_city!=''){
                        echo $sql_city;
                     }else{
                        echo $cityid;
                     }

                    ?>
                   
                </td>
                <td>
                      <?php echo $row_rec['start_date']; ?>
                </td>
                <td>
                      <?php echo $row_rec['end_date']; ?>
                </td>
                
                <td>
                    <?php if($row_rec['end_date']<=$tod){?>
                    <a href="popup_details_edit.php?edit=<?php echo base64_encode($row_rec['id']); ?>" title="Edit"><img src="images/pencil.png" width="16" height="16" alt=""></a>

                <?php } ?>
                    <!-- <a href="coupon_amount_list.php?delete=<?php echo $row_rec['id']; ?>" title="Delete"  onClick="return confirm('Are you sure you to delete this data?');">
                    <img src="images/cross.png" width="16" height="16" alt="">
                    </a> --> 
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php



$p=$_GET["p"];
if ($p < 1){
 $p = 1;
}

$pagess = ($p-1) * $limit_val;

if ($pagess <= 0)  {
    $pagess = 0;
}

$start1 = $pagess + 1;
 $pagess = $pagess + $limit_val;
 
 if ($pagess > $count){
    $last1 = $count;   
 }else{
    $last1 = $pagess;
 }
//echo $pagess;

?>

    <div class="box-footer clearfix">
                  <!-- <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">&raquo;</a></li>
                  </ul> -->
                  <?php
              if ($limit_val==0) {
        ?>
            
           <font class="htext"><strong>Record Not Found</strong></font>
            
            <?php
              }else{
            
             
              if ($limit_val>1)
              {
              if ($start1==$pagess)
                {
              ?>
                
<div class="col-sm-6 ">Showing  <?=$start1;?> to <?=$start1;?> of <?=$count;?> (Page <?php if($_REQUEST[page]!=''){?> <?=$_REQUEST[page];?><?php }else{?>1<?php }?> )</div>
                       

              <?php
                }
                else 
                {
              ?> 
                
<div class="col-sm-6 ">Showing  <?php if($count!='0'){?><?=$start1;?><?php }?> <?php if($count=='0'){?>0<?php }?> to  <?php if($last1<$start1){?> <?=$count;?><?php }if($last1>$start1){?><?=$last1;?><?php }?> of <?=$count;?> (Page <?php if($_REQUEST[page]!=''){?> <?=$_REQUEST[page];?><?php }else{?>1<?php }?> )</div>
   

              <?php
                }
              }
              else 
              { 
              ?> 
              
              <div class="col-sm-6 ">Showing  <?=$last1;?> to <?=$last1;?> of <?=$count;?> (Page <?php if($_REQUEST[page]!=''){?> <?=$_REQUEST[page];?><?php }else{?>1<?php }?> )</div>
 


              <?php
              }}
              ?>
              <div class="col-sm-6 ">
                  <?php


$limit =$limit_val; 


$record_index= ($page-1) * $limit;      

 if($cat_id!='' && $subcat_id!=''){
$sql = "SELECT COUNT(*) FROM product_management where cat_name='$cat_id' and sub_name='$subcat_id'";

}else{

$sql = "SELECT COUNT(*) FROM ".TABLE_POPDETAILS." "; 
}
$retval1 = mysql_query($sql);  
$row = mysql_fetch_row($retval1);  
$total_records = $row[0];

$total_pages = ceil($total_records / $limit);  
//$pagLink = "<div class='pagination'>";  
  
 if($_REQUEST[page]!=''){}

    echo "<ul class='pagination' style='float: right;'>";
if($page>1){
    echo "<li><a href='event_list.php?page=".($page-1)."&p=".($page-1)."&name=$_REQUEST[name]&subname=$_REQUEST[subname]' class='button'>Previous</a></li>"; 
   }

    for ($i=1; $i<=$total_pages; $i++) {?>
     <li class="<?php if($_REQUEST[page]=='' && $i==1){echo"active";}else{ if($_REQUEST[page]==$i){echo"active";}} ?>"><a  href='event_list.php?page=<?=$i;?>&p=<?=$i;?>&name=<?=$_REQUEST[name];?>&subname=<?=$_REQUEST[subname];?>'><?=$i;?></a></li>
  <?php }
  if($page<$total_pages){
    echo "<li><a href='event_list.php?page=".($page+1)."&p=".($page+1)."&name=$_REQUEST[name]&subname=$_REQUEST[subname]' class='button'>Next</a></li>";
}

    echo"</ul>";               
//};  
       
?>
</div>
                </div>

    </div>
    </div>
    </section>
</div>
<!-- /.content-wrapper -->
<?php include('includes/admin_footer.php'); ?> 
<!--style for pagination-->
<style type="text/css">
  .pagination>li>a, .pagination>li>span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #337ab7;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
}
.pagination>li {
    display: inline;
}
.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
    z-index: 2;
    color: #fff;
    cursor: default;
    background-color: #337ab7;
    border-color: #337ab7;
}
.pagination>li:first-child>a, .pagination>li:first-child>span {
    margin-left: 0;
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
}
.pagination>li:last-child>a, .pagination>li:last-child>span {
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
}
</style>