<?php
include"header.php";

?>
<style type="text/css">
  .aside_area .sideber_menu ul li a.active {
    background: #f67a38;
    color: #fff;
    padding-left: 18px;
}
</style>
<div class="main_area">
    <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <aside class="aside_area">
                <div class="sideber_menu">
                  <?php 

                    $sql_cat= "SELECT * FROM ".DTABLE_CATEGORY." ";

                    $res_cat = $db->selectData($sql_cat);

                    while($row_cat = $db->getRow($res_cat)){

                    ?>
                    <h2><?=$row_cat['name'];?></h2>
                     <ul>
                      <?php 

                    $sql_scat= "SELECT * FROM ".DTABLE_SUBCAT." where cat_id='".$row_cat['id']."' ";

                    $res_scat = $db->selectData($sql_scat);

                    while($row_scat = $db->getRow($res_scat)){

                    ?>
                        <li><a <?php if($_REQUEST['cat']==$row_cat['id'] && $_REQUEST['sub']==$row_scat['id']){echo"class='active'";}?> href="listing?cat=<?=$row_cat['id'];?>&sub=<?=$row_scat['id'];?>"><?=$row_scat['name'];?></a></li>
                        <?php }?>
                     </ul>
                     <?php }?>
                 </div>
                 
            </aside>
          </div>
          <div class="col-lg-9">
            <article class="article_area">
                <div class="row">

                  <?php 
                  $limit_val=12;
                  if(isset($_GET["page"]))
                              $page = (int)$_GET["page"];
                              else
                              $page = 1;

                              $setLimit = $limit_val;
                              $pageLimit = ($page * $setLimit) - $setLimit;
                              
                             $perPage = $limit_val;
                            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
                            $startAt = $perPage * ($page - 1);
                  $cat=mysql_real_escape_string($_REQUEST['cat']);
                  $sub=mysql_real_escape_string($_REQUEST['sub']);
                  $title=mysql_real_escape_string($_REQUEST['title']);
                  $place=mysql_real_escape_string($_REQUEST['place']);
                  $loc=mysql_real_escape_string($_REQUEST['loc']);
$param='';

if($cat!='')
{
  $param.= "and category='$cat' ";
}
if( $sub!='')
{
  $param.= "and sub_category='$sub' ";
  $single_cat="single_cat";
}
if( $place!='')
{
  $param.= "and country='$place' ";
}
if( $title!='')
{
  $param.= "and title like '%".$title."%' ";
}
if( $loc!='')
{
  $param.= "and address like '%".$loc."%' ";
}

 $sql= "SELECT *, (select count(1) from ".DTABLE_ADS." where 1=1 ".$param.") total_rows  FROM ".DTABLE_ADS." where 1=1 ".$param." ORDER BY id desc limit $startAt, $perPage";


// $sql= "SELECT * FROM ".DTABLE_ADS." where 1=1 ";
// if($cat!='')
// {
//   $sql.= "and category='$cat' ";
// }
// if( $sub!='')
// {
//   $sql.= "and sub_category='$sub' ";
// }
// if( $place!='')
// {
//   $sql.= "and country='$place' ";
// }
// if( $title!='')
// {
//   $sql.= "and title like '%".$title."%' ";
// }
// if( $loc!='')
// {
//   $sql.= "and address like '%".$loc."%' ";
// }
// $sql2=$sql1;
// $sql.= " ORDER BY id desc limit $startAt, $perPage";
//echo $sql2;
                  // if($cat!='' && $sub!=''){
                  //   $sql= "SELECT * FROM ".DTABLE_ADS." where category='$cat' and sub_category='$sub'  ORDER BY id desc limit $startAt, $perPage";
                  //   $sql2= "SELECT * FROM ".DTABLE_ADS." where category='$cat' and sub_category='$sub'  ORDER BY id desc";


                  // }else if($cat!='' && $place!='' && $title=='' && $loc==''){
                  //   $sql= "SELECT * FROM ".DTABLE_ADS." where category='$cat' and country='$place'  ORDER BY id desc limit $startAt, $perPage";
                  //   $sql2= "SELECT * FROM ".DTABLE_ADS." where category='$cat' and country='$place'  ORDER BY id desc";


                  // }else if($cat!='' && $place!='' && $title!='' && $loc==''){
                  //    $sql= "SELECT * FROM ".DTABLE_ADS." where category='$cat' and country='$place' and title like '%".$title."%' ORDER BY id desc limit $startAt, $perPage";
                  //   $sql2= "SELECT * FROM ".DTABLE_ADS." where category='$cat' and country='$place' and title like '%".$title."%' ORDER BY id desc";


                  // }else if($cat!='' && $place!='' && $title=='' && $loc!=''){
                  //   $sql= "SELECT * FROM ".DTABLE_ADS." where category='$cat' and country='$place' and address like '%".$loc."%' ORDER BY id desc limit $startAt, $perPage";
                  //   $sql2= "SELECT * FROM ".DTABLE_ADS." where category='$cat' and country='$place' and address like '%".$loc."%' ORDER BY id desc";


                  // }else if($cat!='' && $place!='' && $title!='' && $loc!=''){
                  //   $sql= "SELECT * FROM ".DTABLE_ADS." where category='$cat' and country='$place' and address like '%".$loc."%' and title like '%".$title."%' ORDER BY id desc limit $startAt, $perPage";
                  //   $sql2= "SELECT * FROM ".DTABLE_ADS." where category='$cat' and country='$place' and address like '%".$loc."%' and title like '%".$title."%' ORDER BY id desc";


                  // }else{
                  //   $sql= "SELECT * FROM ".DTABLE_ADS."  ORDER BY id desc limit $startAt, $perPage";
                  //   $sql2= "SELECT * FROM ".DTABLE_ADS."  ORDER BY id desc";
                  //   $all="all";

                  // }
                    // $count=$db->countRows($sql2);
                    $res = $db->selectData($sql);
if($row_rec1 = $db->getRow($res))
{
  $count=$row_rec1['total_rows'];
}
else
{
  $count=0;
}
                    if($count>0){
                      mysql_data_seek($res, 0);
                    while($row_rec = $db->getRow($res)){

                      $wid=$row_rec['id'];
                      if($_SESSION[USER]){
$get_data =mysql_fetch_assoc(mysql_query("SELECT * FROM ".DTABLE_WISHLIST." where product='".$wid."' and user_id='".$_SESSION['USER']['id']."'"));
}
                    ?>
                    <div class="col-lg-4">
                      <div class="listing_box clearfix">
                            <div class="listing_thumble">
                             <a href="details?ad=<?=base64_encode($row_rec['id']);?>"><img src="<?php echo SITE_IMAGE_PATH.$row_rec['photo'];?>" alt=""> </a>
                             <div class="price"><?=base64_decode($row_rec['ad_currency']);?><?=$row_rec['new_price'];?></div>
                             <div class="price2"><?=base64_decode($row_rec['ad_currency']);?><?=$row_rec['old_price'];?></div>
                            </div>
                            <div class="listing_body">
                                <a onclick="wish('<?=$row_rec['id'];?>')" class="heart" title="Add to wish list" href="javascript:void(0)"><i class="hrt<?=$row_rec['id'];?> fa fa-heart<?php if($get_data[product]==$row_rec['id']){echo"";}else{echo"-o";}?>" aria-hidden="true"></i></a>
                                <h2><a href="details?ad=<?=base64_encode($row_rec['id']);?>"><?=$row_rec['title'];?> </a></h2>
                                <ul>
                                    <li><i class="fa fa-compass" aria-hidden="true"></i> <?php echo mysql_fetch_assoc(mysql_query("select name FROM ".DTABLE_CATEGORY." where id=$row_rec[category]"))['name']; ?></li>
                                    <li><i class="fa fa-clock-o" aria-hidden="true"></i> <?=$row_rec['entry_date'];?></li>
                                </ul>
                            </div>
                            <div class="listing_footer clearfix">
                                <div class="name"><span><img src="images/img-33.jpg" alt=""></span><?php echo mysql_fetch_assoc(mysql_query("select name FROM ".DTABLE_USER." where id=$row_rec[user_id]"))['name']; ?></div>
                                <a href="details?ad=<?=base64_encode($row_rec['id']);?>" class="btn btn-default">contacts</a>
                            </div>
                        </div>
                    </div>
                    
                    <?php }}else{ ?>

                      <h2 style="color: #d40d0d;font-size: 25px;">Sorry! No Record found.</h2>
                      

                    <?php }?>

                </div>
<?php
if($count>12){

$limit =$limit_val; 


$record_index= ($page-1) * $limit;
              // if($cat!='' && $sub!=''){
                   
              //       $sql= "SELECT COUNT(*) FROM ".DTABLE_ADS." where category='$cat' and sub_category='$sub'  ORDER BY id desc";
              //       $single_cat="single_cat";

              //     }else if($cat!='' && $place!='' && $title=='' && $loc==''){
                    
              //       $sql= "SELECT COUNT(*) FROM ".DTABLE_ADS." where category='$cat' and country='$place'  ORDER BY id desc";

              //     }else if($cat!='' && $place!='' && $title!='' && $loc==''){
                     
              //       $sql= "SELECT COUNT(*) FROM ".DTABLE_ADS." where category='$cat' and country='$place' and title like '%".$title."%' ORDER BY id desc";

              //     }else if($cat!='' && $place!='' && $title=='' && $loc!=''){
                    
              //       $sql= "SELECT COUNT(*) FROM ".DTABLE_ADS." where category='$cat' and country='$place' and address like '%".$loc."%' ORDER BY id desc";

              //     }else if($cat!='' && $place!='' && $title!='' && $loc!=''){
                    
              //       $sql= "SELECT COUNT(*) FROM ".DTABLE_ADS." where category='$cat' and country='$place' and address like '%".$loc."%' and title like '%".$title."%' ORDER BY id desc";


              //     }else{
              //       $sql= "SELECT COUNT(*) FROM ".DTABLE_ADS."  ORDER BY id desc";
                    

              //     }
// $retval1 = mysql_query($sql);  
// $row = mysql_fetch_row($retval1);  
// $total_records = $row[0];

$total_pages = ceil($count / $limit);  
//$pagLink = "<div class='pagination'>";  
  
 if($cat=='' && $place=='' && $title=='' && $loc==''){
 echo "<ul class='pagination' style='float: right;'>";
if($page>1){
    echo "<li><a href='listing.php?page=".($page-1)."' class='button'>Previous</a></li>"; 
   }

    for ($i=1; $i<=$total_pages; $i++) {?>
     <li class="<?php if($_REQUEST[page]=='' && $i==1){echo"active";}else{ if($_REQUEST[page]==$i){echo"active";}} ?>"><a  href='listing.php?page=<?=$i;?>'><?=$i;?></a></li>
  <?php }
  if($page<$total_pages){
    echo"<li><a href='listing.php?page=".($page+1)."' class='button'>Next</a></li>";
}

    echo"</ul>";  

 }else if($single_cat=='single_cat'){
    echo "<ul class='pagination' style='float: right;'>";
if($page>1){
    echo "<li><a href='listing.php?page=".($page-1)."&cat=$_REQUEST[cat]&sub=$_REQUEST[sub]' class='button'>Previous</a></li>"; 
   }

    for ($i=1; $i<=$total_pages; $i++) {?>
     <li class="<?php if($_REQUEST[page]=='' && $i==1){echo"active";}else{ if($_REQUEST[page]==$i){echo"active";}} ?>"><a  href='listing.php?page=<?=$i;?>&cat=<?=$_REQUEST[cat];?>&sub=<?=$_REQUEST[sub];?>'><?=$i;?></a></li>
  <?php }
  if($page<$total_pages){
    echo"<li><a href='listing.php?page=".($page+1)."&cat=$_REQUEST[cat]&sub=$_REQUEST[sub]' class='button'>Next</a></li>";
}

    echo"</ul>"; 
    }else{
    echo "<ul class='pagination' style='float: right;'>";
if($page>1){
    echo "<li><a href='listing.php?page=".($page-1)."&title=$_REQUEST[title]&cat=$_REQUEST[cat]&loc=$_REQUEST[loc]&place=$_REQUEST[place]' class='button'>Previous</a></li>"; 
   }

    for ($i=1; $i<=$total_pages; $i++) {?>
     <li class="<?php if($_REQUEST[page]=='' && $i==1){echo"active";}else{ if($_REQUEST[page]==$i){echo"active";}} ?>"><a  href='listing.php?page=<?=$i;?>&title=<?=$_REQUEST[title];?>&cat=<?=$_REQUEST[cat];?>&loc=<?=$_REQUEST[loc];?>&place=<?=$_REQUEST[place];?>'><?=$i;?></a></li>
  <?php }
  if($page<$total_pages){
    echo"<li><a href='listing.php?page=".($page+1)."&title=$_REQUEST[title]&cat=$_REQUEST[cat]&loc=$_REQUEST[loc]&place=$_REQUEST[place]' class='button'>Next</a></li>";
}

    echo"</ul>"; 
    }               
//};  
   }    
?>
            </article>




          </div>
        </div>
    </div>
</div>

<?php
include"footer.php";
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
  function wish(val){
    //alert(val);
    //swal("Good job!", "You clicked the button!", "success");
    var con='<?=$_SESSION['USER']['id'];?>';
    if(con!=''){
        //alert(1);
        $.ajax({
            url: 'wishlist_page.php',
            type: 'POST',
            data: {val:val,user:con,add_wish:1},
            success:function(response){
                //alert(response);
       var msg=response.trim();
        if(msg=='ok'){
          $('.hrt'+val).removeClass ( 'fa-heart-o' );
          $('.hrt'+val).addClass( 'fa-heart' );
          swal("Thank You", "Item added in wishlist", "success");
        }else if(msg=='exist'){
          swal("Sorry!", "Item already exist in wishlist", "warning");
        }else{
          swal("Sorry!", "Please try again", "error");
        }
               
            }
        });
    }else{
      //alert("login please");
      //swal("Good job!", "You clicked the button!", "success");
      window.location.href='login';
    }
    }

</script>
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