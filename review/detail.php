<?php
include_once("configure.php");
$id = $_REQUEST['details'];
$product_sid = $_REQUEST['details'];
$sql_details = "SELECT * FROM ".DTABLE_PRODUCT." where sid='".$product_sid."'";
$res_details = $db->selectData($sql_details);
$row_rec_details = $db->getRow($res_details);

$tot='';
 $query11 = mysql_query("SELECT  * FROM user_review where product_id='$id'");
    $num11=mysql_num_rows($query11);
$query22 = mysql_query("SELECT SUM(rating) FROM user_review where product_id='$id'");
    while($row = mysql_fetch_array($query22)){
    
        //echo $rr=round($row['SUM(rating)']/$num1,1);
      $tot=round($row['SUM(rating)']/$num11,1);
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<link rel="icon" href="assets/images/favicon.png">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<title>Kraasa</title>
<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<!-- Customizable CSS -->
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/blue.css">
<link rel="stylesheet" href="assets/css/owl.carousel.css">
<link rel="stylesheet" href="assets/css/owl.transitions.css">
<link rel="stylesheet" href="assets/css/animate.min.css">
<link rel="stylesheet" href="assets/css/rateit.css">
<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/simple-line-icons.css">
<link rel="stylesheet" href="assets/css/simple-line-icons.css">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
$('#userForm').submit(function(){
$("#sub_review").html('Posting...');
$("#sub_review").prop("disabled", true);
$.ajax({
type: 'POST',
url: 'review_insert.php',
data: $(this).serialize() // getting filed value in serialize form
})
.done(function(data){ // if getting done then call.
//alert(data);
// show the response
$('#post_name').val('');
$('#title').val('');
$('#message').val('');
$('#pid').show();
$("#sub_review").html('SUBMIT REVIEW');
$("#sub_review").prop("disabled", false);
})
.fail(function() { // if fail then getting message

// just in case posting your form failed
alert( "Posting failed." );
$("#sub_review").html('SUBMIT REVIEW');
$("#sub_review").prop("disabled", false);
});

// to prevent refreshing the whole page page
return false;

});
});
</script>
<style>
.reviewesratingbox h4{ color:#25262b; font-size:14px; font-weight:600; margin-bottom:20px;}
.reviewesratingbox{ padding:20px 0;}
.reviewesratingbox .ratingbox{ width:103px; float:left;}
.reviewesratingbox .ratingbox span{ font-size:30px; font-weight:400; color:#6e7177; display:block;}
.reviewesratingbox .ratingbox span i {
	font-size: 16px;
	color: #ffa334;
}
.reviewesratingbox .ratingbox p{ margin:0; font-size:13px; color:#7c8198; font-weight:500;}
.reviewesratingbox .reviewbox{ width:60%; float:left; border-left:1px solid #dddddd; padding-left:22px;}
.reviewesratingbox .reviewbox ul{ margin:0; padding:0; list-style:none;}
.reviewesratingbox .reviewbox ul li{ display:block;}
.reviewesratingbox .reviewbox ul li span{ width:30px; float:left; font-size:13px; font-weight:500; color:#52585f;}
.reviewesratingbox .reviewbox ul li span i{ font-size:11px; margin-left:2px;}
.reviewesratingbox .reviewbox ul li .progress {
	width: 70%;
	float: left;
	margin: 8px 0;
}
.reviewesratingbox .reviewbox ul li span.num{ max-width:50px; padding-left:10px; float:left; font-size:13px; font-weight:400; color:#8a9098;}
.progress-bar {background-color: #388e3c;}

.reviewbox ul li:nth-of-type(4) .progress-bar {background-color: #f89f00;}
.reviewbox ul li:nth-of-type(5) .progress-bar {background-color: #f86161;}
.retingbox h4{ color:#25262b; font-size:14px; font-weight:600; margin-bottom:5px;}
.reviewform {
	padding: 20px 0 5px 0;
}
.reviewform .form-control{ border-radius:4px; height:43px; color:#adb0bc; font-size:14px; font-weight:500; background:#f0f0f0; border:none;}
.reviewform .form-group{ margin-bottom:10px;}
.reviewform textarea.form-control{ height:70px; resize:none;}
.reviewform .btn{ width:100px; height:43px; border-radius:4px; padding:0; line-height:43px; background:#3180e2; border-color:#3180e2; font-size:14px; font-weight:500;}







.starrating, .starrating1 {
	max-width: 100%;
	float:left;
}
.starrating1 ul{ margin:0; padding:0; list-style:none;}
.starrating1 ul li{ display:inline-block; vertical-align:middle; font-size:18px;}
.starrating1 ul li .fa-star{color: #ffa236;}
.starrating1 ul li .fa-star-o{color: #ffa236;}
.starrating > input {display: none;}  /* Remove radio buttons */

.starrating > label:before { 
  content: "\f006"; /* Star */
  margin: 2px;
  font-size: 20px;
  font-family: FontAwesome;
  display: inline-block; 
}

.starrating > label
{
  color: #ffa236;
  cursor:pointer;
  margin:0; /* Start color when not clicked */
  float:right;
}

.starrating > input:checked ~ label:before
{ color: #ffa236 ;  content: "\f005"; } /* Set yellow color when star checked */









.user_commentarea h5 {
	color: #363945;
	font-size: 14px;
	font-weight: 600;
	padding: 4px 0 0 50px;
	margin: 0 0 12px 0;
	position: relative;
}
.user_commentarea h5 span.bg-green {
	width: 43px;
	height: 27px;
	border-radius: 5px;
	background: #388e3c;
	text-align: center;
	float: left;
	margin-right: 5px;
	position: absolute;
	left: 0;
	top: 0;
	color:#FFF;
	font-size:13px;
	padding:6px 0;
}
.user_commentarea h5 span.bg-yellow{
	width: 43px;
	height: 27px;
	border-radius: 5px;
	background: #f89f00;
	text-align: center;
	float: left;
	margin-right: 5px;
	position: absolute;
	left: 0;
	top: 0;
	color:#FFF;
	font-size:13px;
	padding:6px 0;
}
.user_commentarea h5 span.bg-red{
	width: 43px;
	height: 27px;
	border-radius: 5px;
	background: #f86161;
	text-align: center;
	float: left;
	margin-right: 5px;
	position: absolute;
	left: 0;
	top: 0;
	color:#FFF;
	font-size:13px;
	padding:6px 0;
}
.user_commentarea{ border-bottom:1px solid #e1e1e1; padding-bottom:15px; margin-bottom:15px;}
.user_commentarea h5 span.bg-green i{ font-size:11px; margin-left:3px;}
.user_commentarea h5 span.bg-yellow i{ font-size:11px; margin-left:3px;}
.user_commentarea h5 span.bg-red i{ font-size:11px; margin-left:3px;}
.user_commentarea p{ font-size:13px; font-weight:400; color:#6c6f7c; margin-bottom:10px;}
.user_commentarea .likearea .datedbox{ float:left; font-size:13px; font-weight:400; color:#000000; font-style:italic;}
.user_commentarea .likearea .likebox { float:right; font-size:13px; color:#c2c2c2;}
.user_commentarea .likearea .datedbox span{ font-style:normal; color:#6c6f7c;}

.user_commentarea .likearea .likebox a{color:#c2c2c2; margin-left:10px;}
.user_commentarea .likearea .likebox a img{ margin-right:5px;}

.relatedproducts_area{ overflow:hidden; padding:30px 0 0 0}
.relatedproducts_area h2{ font-size:30px;}

.relatedproducts_area .product_sliderone {
	text-align: center;
	
	overflow:hidden;
}

.Viaw a.see-more, .Viaw a.see-less{ text-align:center; cursor:pointer; font-size:14px; display:block; width:100%; color:#3180e2; font-weight:500; text-transform:uppercase; text-align:center;}
.act_size{
  background: #de4644;color: white;
}
</style>

</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
<?php include('header.php'); ?> 
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li><a href="#">Category</a></li>
				<li class='active'>Details </li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
      <div class='col-md-12'>
        <div class="detail-block">
				  <div class="row  wow fadeInUp">
            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
              
              <div class="product-item-holder size-big single-product-gallery small-gallery">

                <div id="owl-single-product">
                  <div class="single-product-gallery-item" id="slide1">
                    <a data-lightbox="image-1" data-title="Gallery" href="<?php echo $row_rec_details['image_browse']; ?>">
                      <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="<?php echo $row_rec_details['image_browse']; ?>" />
                    </a>
                  </div><!-- /.single-product-gallery-item -->
                  <?php
                    $sql_images = "SELECT * FROM ".DTABLE_PRODUCT_IMAGES." where product_id='".$row_rec_details['sid']."'";
                    $res_images = $db->selectData($sql_images);
                    while($row_rec_images = $db->getRow($res_images)){
                  ?>
                  <div class="single-product-gallery-item" id="slide_<?php echo $row_rec_images['id']; ?>">
                    <a data-lightbox="image-1" data-title="Gallery" href="<?php echo $row_rec_images['image_browses']; ?>">
                      <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="<?php echo $row_rec_images['image_browses']; ?>" />
                    </a>
                  </div>
                  <!-- /.single-product-gallery-item -->
                  <?php } ?>
                </div><!-- /.single-product-slider -->

                <div class="single-product-gallery-thumbs gallery-thumbs">
                  <div id="owl-single-product-thumbnails">
                    <div class="item">
                        <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide1">
                            <img class="img-responsive" width="85" alt="" src="assets/images/blank.gif" data-echo="<?php echo $row_rec_details['image_browse']; ?>" />
                        </a>
                    </div>
                    <?php
                      $slide_count = 2;
                      $sql_images = "SELECT * FROM ".DTABLE_PRODUCT_IMAGES." where product_id='".$row_rec_details['sid']."'";
                      $res_images = $db->selectData($sql_images);
                      while($row_rec_images = $db->getRow($res_images)){
                    ?>
                    <div class="item">
                        <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="<?php echo $slide_count; ?>" href="#slide_<?php echo $row_rec_images['id']; ?>">
                            <img class="img-responsive" width="85" alt="" src="assets/images/blank.gif" data-echo="<?php echo $row_rec_images['image_browses']; ?>"/>
                        </a>
                    </div>
                    <?php $slide_count++; } ?>
                  </div><!-- /#owl-single-product-thumbnails -->
                </div><!-- /.gallery-thumbs -->

              </div><!-- /.single-product-gallery -->

              <?php if($row_rec_details['stock'] >0){ ?>
                <div class="quantity-container info-container col-sm-12 mt-1 atag_html">
                  <a id="product-add-to-cart" style="display:none" onClick="addCart('<?php echo $row_rec_details['sid']; ?>')" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs" onClick="addCart('<?php echo $row_rec_details['sid']; ?>')"></i>ADD TO CART</a>
                  <a id="go-to-cart" style="display:none" href="cart.php" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs" href="cart.php"></i>GO TO CART</a>
                  <a id="buy_id" style="background: #10c310; margin-left: 10px;" onClick="buyNow('<?php echo $row_rec_details['sid']; ?>')" class="btn btn-primary"><i class="fa fa-bolt inner-right-vs" onClick="buyNow('<?php echo $row_rec_details['sid']; ?>')"></i>BUY NOW</a>
                </div>
              <?} else{ ?>

              <div class="quantity-container info-container col-sm-12 mt-1">
                <a style="background: #9a9696f7; margin-left: 10px;" class="btn btn-primary">OUT OF STOCK</a>
              </div>
              <?php } ?>

            </div><!-- /.gallery-holder -->  

            <div class='col-sm-6 col-md-7 product-info-block'>
              <div class="product-info">
                <h1 class="name"><?php echo $row_rec_details['name']; ?></h1>
							
                <div class="rating-reviews m-t-20">
                  <div class="row">
                    <div class="col-sm-3 col-xs-3">
                      <div class="rating rateit-small1"><?=$tot;?><i style="color:#ffa236;" class="fa fa-star" aria-hidden="true"></i></div>
                    </div>
                    <div class="col-sm-8 col-xs-8">
                      <div class="reviews">
                        <a href="#" class="lnk">(<?php 
                          $query = mysql_query("SELECT SUM(rating) FROM user_review where product_id='$product_sid'");
                          // Print out result
                          while($row = mysql_fetch_array($query)){
                            echo $row['SUM(rating)'];
                          }?> Reviews)</a>
										  </div>
									  </div>
								  </div><!-- /.row -->		
							  </div><!-- /.rating-reviews -->

                <div class="stock-container info-container m-t-10">
                  <div class="row">
                    <div class="col-sm-2 col-xs-2">
                      <div class="stock-box">
                        <span class="label">Availability :</span>
                      </div>	
                    </div>
                    <div class="col-sm-9 col-xs-9">
                      <div class="stock-box">
                        <span class="value">In Stock</span>
                      </div>	
                    </div>
                  </div><!-- /.row -->	
                </div><!-- /.stock-container -->

							  <div class="description-container m-t-20">
                  <?php echo $row_rec_details['sort_desc']; ?>
							  </div><!-- /.description-container -->

                <div class="price-container info-container m-t-20">
                  <div class="row">
				
                    <div class="col-sm-8">
                      <div class="price-box">
                        <span class="price">₹<?php echo $nprice=$row_rec_details['new_price']; ?></span>
                        <span class="price-strike">₹<?php echo $oprice=$row_rec_details['old_price']; ?></span>
                        <span class="price-strike2"><?php  
                         $dif=$oprice-$nprice;
                         echo $dis=round(($dif*100)/$oprice);
                        //$row_rec_details['discount']; ?>% off</span>
                      </div>
                      <div class="price-box2">
                        <label>Delivery</label><p class="address-in"><i class="fa fa-map-marker"></i><input type="number" id="pinBox" onkeypress="runScript(event)" name="">Change</p>
                        <div class="delvad">
                          <p id="d_details"></p>
                          <!-- <p>Delivery by1 Aug, Wednesday<span>|</span>₹40</p> -->
                          <!-- <p><a href="#">View Details</a></p> -->
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="favorite-button m-t-10">
                        <a onClick="addWish('<?php echo $row_rec_details['sid']; ?>','http://<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>')" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="javascript:void(0)">
                          <i class="fa fa-heart"></i>
                        </a>
                        <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
                          <i class="fa fa-envelope"></i>
                        </a>
                      </div>
                    </div>

                  </div><!-- /.row -->
                </div><!-- /.price-container -->

                <?php $sql_check_cat= "SELECT * FROM ".DTABLE_CATEGORY." where sid='".$row_rec_details['category']."'";
                $res_check_cat = $db->selectData($sql_check_cat);
                $row_rec_check_cat = $db->getRow($res_check_cat);?>

                <div class="quantity-container info-container">
                  <div class="row">
                    <div class="size-des">
                      <?php if($row_rec_check_cat['name']=='Shoes'){?>
                      <p>Size: </p>
                       <ul>  
                      <?php $sql_size= "SELECT * FROM ".DTABLE_PRODUCT." where handle='".$row_rec_details['handle']."' order by size asc";
                      $res_size = $db->selectData($sql_size);
                      while($row_rec_size = $db->getRow($res_size)){ 
                        $dif2=$row_rec_size["old_price"]-$row_rec_size["new_price"];
                          $dis2=round(($dif2*100)/$row_rec_size["old_price"]);
                        ?>
                     
                        <li><a class="<?php if($row_rec_size['size']==$row_rec_details['size']){echo"act_size";} ?>" id="<?php echo $row_rec_size['size'];?>" onclick="get_sizef(this.id,'<?php echo $row_rec_size["new_price"];?>','<?php echo $row_rec_size["old_price"];?>','<?=$dis2;?>','<?php echo $row_rec_size["sid"];?>')" href="<?php echo SITE_URL.'/detail.php?details='.$row_rec_size['sid'] ?>"><?php echo $row_rec_size['size'];?></a></li>
                      <?php }?>
                        <!-- <li><a href="#">6</a></li>
                        <li><a href="#">7</a></li>
                        <li><a href="#">8</a></li>
                        <li><a href="#">9</a></li>
                        <li><a href="#">10</a></li> -->
                      </ul>
                      <input type="hidden"  id="size_price" value="<?=row_rec_details['new_price'];?>">
                     <!-- <label><a href="#">Size Chart </a></label> -->  

                      <div class="col-xs-3 col-sm-4 col-md-3 animate-dropdown top-cart-row ex_st"> 
                    
                        <div class="dropdown dropdown-cart"> 
                          <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                            <div class="items-cart-inner">              
                              <div class="total-price-basket"> <span class="lbl"></span> <span class="total-price"> <span class="value">Size Chart</span> </span> </div>
                            </div>
                          </a>
                          <ul class="dropdown-menu">
                            <li>
                              <div class="col-xs-12">
                                <div class="image"><img src="img/sizechart/sizechart.png" alt=""> </div>
                              </div>              
                            </li>
                          </ul><!-- /.dropdown-menu--> 
                        </div><!-- /.dropdown-cart --> 
                      </div>
                      <?php } ?>

                     <!-- <p>Colour:<span> GREY C GREEN</span></p>  
                     <ul>
                       <li class="active2"><a href="#"><img src="assets/images/products/small.jpg" alt=""></a></li>
                       <li><a href="#"><img src="assets/images/products/small2.jpg" alt=""></a></li>
                       <li><a href="#"><img src="assets/images/products/small3.jpg" alt=""></a></li>
                     </ul> -->

                      <div class="col-sm-12">
                        <div class="row">

                          <div class="col-sm-6">
                            <div class="peragrph">
                              <h3>Highlights</h3>
                              <?php echo $row_rec_details['highlights']; ?>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="peragrph">
                              <h3>Services</h3>
                              <ul>
                                <li><i class="fa fa-refresh"></i>
                                  <?php echo $row_rec_details['return_policy']; ?> Day's Return Policy
                                </li>
                                <!-- <li><i class="fa fa-inr"></i>
                                  <?php //echo $row_rec_details['delivery']; ?>
                                </li> -->
                              </ul>
                            </div>
                          </div>

                          <?php $sql_seller= "SELECT * FROM ".DTABLE_VENDOR." where sid='".$row_rec_details['sellerSid']."'";
                          $res_seller = $db->selectData($sql_seller);
                          $row_rec_seller = $db->getRow($res_seller);
                          if($row_rec_seller['pname']){?>

                          <div class="col-sm-12">
                            <div class="peragrph">
                              <h3>Seller</h3>
                              <ul>
                                <li><a href="#">
                                  <?php echo $row_rec_seller['pname']; ?>
                                </a></li>
                              </ul>
                            </div>
                          </div>
                          <?php } ?>

                          <div class="col-sm-12">
                            <div class="peragrph">
                              <h3>Description</h3>
                              <ul>
                                <?php echo $row_rec_details['description']; ?>
                              </ul>
                            </div>
                          </div>

                        </div>
                      </div>

                    </div>
								  </div><!-- /.row -->
                                  
                                  
                                  
                 <div class="reviewesratingbox clearfix">
               		<h4>Reviewes & Ratings</h4>
                    <div class="ratingbox">
                    	<span><?php 
            $query1 = mysql_query("SELECT  * FROM user_review where product_id='$id'");
    $num1=mysql_num_rows($query1);
            $query2 = mysql_query("SELECT SUM(rating) FROM user_review where product_id='$id'");
    while($row = mysql_fetch_array($query2)){
    //echo $row['SUM(rating)'];
        echo $rr=round($row['SUM(rating)']/$num1,1);
      $tot=$rr=round($row['SUM(rating)']/$num1,1);
} ?> <i class="fa fa-star" aria-hidden="true"></i></span>
                        <p><?php 

$wd='3.03';
$query = mysql_query("SELECT SUM(rating) FROM user_review where product_id='$id'");
// Print out result
    while($row = mysql_fetch_array($query)){
    echo $row['SUM(rating)'];
    
}
            ?> Ratings</p>
                    </div>
                    <div class="reviewbox">
                    	<ul>
                          <li class="clearfix">
                            <?php 

 $query = mysql_query("SELECT  * FROM user_review where product_id='$id' and rating=5");
  $num5=mysql_num_rows($query);
            ?>
                              <span>5<i class="fa fa-star" aria-hidden="true"></i></span>
                                 <div class="progress" style="height:5px">
                                    <div class="progress-bar" style="width:<?=$wd*$num5;?>%;"></div>
                                 </div>
                                 <span class="num"><?php 

 
 echo $num5;
            ?></span>
                            </li>
                            <li class="clearfix">
                              <?php 

 $query = mysql_query("SELECT  * FROM user_review where product_id='$id' and rating=4");
  $num4=mysql_num_rows($query);
            ?>
                              <span>4<i class="fa fa-star" aria-hidden="true"></i></span>
                                 <div class="progress" style="height:5px">
                                    <div class="progress-bar" style="width:<?=$wd*$num4;?>%;"></div>
                                 </div>
                                 <span class="num"><?php 

 
 echo $num4;
            ?></span>
                            </li>
                            <li class="clearfix">
                              <?php 

 $query = mysql_query("SELECT  * FROM user_review where product_id='$id' and rating=3");
  $num3=mysql_num_rows($query);
            ?>
                              <span>3<i class="fa fa-star" aria-hidden="true"></i></span>
                                 <div class="progress" style="height:5px">
                                    <div class="progress-bar" style="width:<?=$wd*$num3;?>%;"></div>
                                 </div>
                                 <span class="num"><?php 

  echo $num3;
            ?></span>
                            </li>
                            <li class="clearfix">
                              <?php 

 $query = mysql_query("SELECT  * FROM user_review where product_id='$id' and rating=2");
  $num2=mysql_num_rows($query);
            ?>
                              <span>2<i class="fa fa-star" aria-hidden="true"></i></span>
                                 <div class="progress" style="height:5px">
                                    <div class="progress-bar" style="width:<?=$wd*$num2;?>%;"></div>
                                 </div>
                                 <span class="num"><?php 

 
 echo $num2;
            ?></span>
                            </li>
                            <li class="clearfix">
                              <?php 

 $query = mysql_query("SELECT  * FROM user_review where product_id='$id' and rating=1");
  $num1=mysql_num_rows($query);
            ?>
                              <span>1<i class="fa fa-star" aria-hidden="true"></i></span>
                                 <div class="progress" style="height:5px">
                                    <div class="progress-bar" style="width:<?=$wd*$num1;?>%;"></div>
                                 </div>
                                 <span class="num"><?php 

  echo $num1;
            ?></span>
                            </li>
                        </ul>
                    </div>
               </div>
               
               
               
               
               <div class="retingbox clearfix">
               <h4>Write a Reviewg&nbsp;&nbsp;&nbsp;<?php                  
      if ($_SESSION["msg"] == "review_post"){
    ?>
    <spna style="color:green">Post Successful</spna>                
    <?php
      $_SESSION["msg"] = "";
      }
    ?>
    <span style="color:green; display: none;" id="alert_rem">Post Successful</span>                
    <?php if(!$_SESSION['BUYER_ACC']){?>

&nbsp;&nbsp;&nbsp;<a href="sign-in.php?log=<?=$_REQUEST['details'];?>"><spna style="color:black">Click here</spna></a>
  </h4>

    <?php
  }else{
    ?>
               <form method="post">
                    <div class="starrating risingstar">
                        <input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
                        <input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
                        <input type="radio" id="star3" name="rating" value="3" checked/><label for="star3"></label>
                        <input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
                        <input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
                        
                        
                        
                        
                      </div>
               </div>
               
               
               
               <div class="reviewform">
               	  
               	      
          <input type="hidden" class="form-control formtitle" id="product_id" name="product_id" value="<?=$_REQUEST[details];?>" placeholder="Title">

          <input type="hidden" class="form-control formtitle" id="user_name" name="user_name" value="<?=$_SESSION['BUYER_ACC']['name'];?>" placeholder="Title">
          <input type="hidden" class="form-control formtitle" id="user_email" name="user_email" value="<?=$_SESSION['BUYER_ACC']['mail'];?>" placeholder="Title">
          <input type="hidden" class="form-control formtitle"  id="rating11" value="3"  placeholder="Title">
          <input type="hidden" class="form-control formtitle" id="exact_time" name="exact_time" value="<?php
          echo $date = date('Y/m/d');
          ?>"  placeholder="Title">
                     <div class="form-group">
                        <input type="text" class="form-control"  id="title" placeholder="Title">
                      </div>
                  	<div class="form-group">
                        <textarea class="form-control" id="message" placeholder="Message"></textarea>
                      </div>
                      <div class="form-group">
                      <input type="button" value="post" id="sub" class="btn btn-primary" onclick="review_post()">
                     </div>
                  </form>
                  <?php
}
?>
               </div>
               
               <hr>
                <div id="inner_ajax">
<?php 
$i=0; 
$sql_review = "SELECT * FROM ".DTABLE_REVIEW." where product_id='$id' order by id desc limit 0,3 ";
$sql_review2 = "SELECT * FROM ".DTABLE_REVIEW." where product_id='$id'  ";
$nm=mysql_num_rows(mysql_query($sql_review2));
$res_redetails = $db->selectData($sql_review);

while($row_re_details = $db->getRow($res_redetails)){
$i++;


?>

               <div class="user_commentarea clearfix">
                  <h5><span class=" <?php if($row_re_details[rating]==5 || $row_re_details[rating]==4 || $row_re_details[rating]==3){
  ?> bg-green <?php } elseif($row_re_details[rating]==2){ ?> bg-yellow <?php }else{ ?> bg-red <?php } ?>"><?=$row_re_details[rating];?><i class="fa fa-star" aria-hidden="true"></i></span><?=$row_re_details[title];?></h5>
                    <p><?=$row_re_details[message];?></p>
                 <div class="likearea clearfix">
                      <div class="datedbox">
                          <span>On <?php
$date_post=$row_re_details[exact_time];
$year=date("Y",strtotime($date_post));
$month=date("M",strtotime($date_post));

$day=date("d",strtotime($date_post));



?></span><?=$day;?> <?=$month;?>, <?=$year;?>
                   </div>
                        <!--<div class="likebox">
                           <a href="javascript:void(0)"><img src="images/like.png" alt=""> 624<?=$nm;?></a>
                           <a href="javascript:void(0)"><img src="images/like1.png" alt=""> 624</a>
                     </div>-->
                    </div>
               </div>
               
               <?php }

               ?>

<?php
if($nm>3){
  ?>

               <div class="Viaw">
               <a class="see-more">View All </a>

              <?php 
$i=0; 
$sql_review = "SELECT * FROM ".DTABLE_REVIEW." where product_id='$id' order by id desc limit 3,$nm ";

$res_redetails = $db->selectData($sql_review);

while($row_re_details = $db->getRow($res_redetails)){
$i++;


?>

               <div class="user_commentarea clearfix">
                  <h5><span class=" <?php if($row_re_details[rating]==5 || $row_re_details[rating]==4 || $row_re_details[rating]==3){
  ?> bg-green <?php } elseif($row_re_details[rating]==2){ ?> bg-yellow <?php }else{ ?> bg-red <?php } ?>"><?=$row_re_details[rating];?><i class="fa fa-star" aria-hidden="true"></i></span><?=$row_re_details[title];?></h5>
                    <p><?=$row_re_details[message];?></p>
                 <div class="likearea clearfix">
                      <div class="datedbox">
                          <span>On  <?php
$date_post=$row_re_details[exact_time];
$year=date("Y",strtotime($date_post));
$month=date("M",strtotime($date_post));

$day=date("d",strtotime($date_post));



?></span><?=$day;?> <?=$month;?>, <?=$year;?>
                   </div>
                        <!--<div class="likebox">
                           <a href="javascript:void(0)"><img src="images/like.png" alt=""> 624</a>
                           <a href="javascript:void(0)"><img src="images/like1.png" alt=""> 624</a>
                     </div>-->
                    </div>
               </div>
               
               <?php }

               ?>




                <a class="see-less">View Less...</a>
               </div>

<?php }

               ?>

</div><!-- for ajax -->
               
               
               
							  </div><!-- /.quantity-container -->
							
              </div><!-- /.product-info -->
            </div><!-- /.col-md-7 -->
				  </div><!-- /.row -->
        </div>
				<!-- //////////////////////////////////////////////.spection///////////////////////////////////////////////// -->

        <div class="specification">
          <h2>Specifications</h2>
          <!-- <h3>General</h3>
          <ul>
            <li><p><span>Model Name</span>    Comet IPD</p></li>
            <li><p><span>Ideal For</span>        Men</p></li>
            <li><p><span>Occasion</span>        Sports</p></li>
            <li><p><span>Outer Material</span>  Mesh</p></li>
          </ul> -->
          <?php echo $row_rec_details['specifications']; ?>
        </div>

        <!-- //////////////////////////////////////////////.spection///////////////////////////////////////////////// -->
				
				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
								<li><a data-toggle="tab" href="#review">REVIEW</a></li>
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9">

							<div class="tab-content">
								
								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<p class="text">
                    <?php echo $row_rec_details['description']; ?>
                    <!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br><br> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. -->
                    </p>
									</div>	
								</div><!-- /.tab-pane -->

								<div id="review" class="tab-pane">
									<div class="product-tab">
																			
										<div class="product-add-review">
                      <h4 class="title">Write your own review &nbsp;&nbsp;&nbsp;<spna style="color:green; display: none" id="pid" >Post Successful</spna><?php if(!$_SESSION['BUYER_ACC']){?>
                        &nbsp;&nbsp;&nbsp;<a href="sign-in.php"><spna style="color:black">Click here</spna></a>
                      </h4>

                      <?php } ?>
                      <?php if($_SESSION['BUYER_ACC']!=''){?>
											<div class="review-table">
                        
                        <form id="userForm">
												<div class="table-responsive">
													<table class="table">	
														<thead>
															<tr>
																<th class="cell-label">&nbsp;</th>
																<th>1 star</th>
																<th>2 stars</th>
																<th>3 stars</th>
																<th>4 stars</th>
																<th>5 stars</th>
															</tr>
														</thead>	
														<tbody>
															<tr>
																<td class="cell-label">Quality</td>
																<td><input type="radio" name="quality_rating" id="quality_rating" class="radio" value="1"></td>
																<td><input type="radio" name="quality_rating" id="quality_rating" class="radio" value="2"></td>
																<td><input type="radio" name="quality_rating" id="quality_rating" class="radio" value="3"></td>
																<td><input type="radio" checked name="quality_rating" id="quality_rating" class="radio" value="4"></td>
																<td><input type="radio" name="quality_rating" id="quality_rating" class="radio" value="5"></td>
															</tr>
															<tr>
																<td class="cell-label">Price</td>
																<td><input type="radio" name="price_rating" id="price_rating" class="radio" value="1"></td>
																<td><input type="radio" name="price_rating" id="price_rating" class="radio" value="2"></td>
																<td><input type="radio" name="price_rating" id="price_rating" class="radio" value="3"></td>
																<td><input type="radio" checked name="price_rating" id="price_rating" class="radio" value="4"></td>
																<td><input type="radio" name="price_rating" id="price_rating" class="radio" value="5"></td>
															</tr>
															<!--<tr>
																<td class="cell-label">Value</td>
																<td><input type="radio" name="quality" class="radio" value="1"></td>
																<td><input type="radio" name="quality" class="radio" value="2"></td>
																<td><input type="radio" name="quality" class="radio" value="3"></td>
																<td><input type="radio" name="quality" class="radio" value="4"></td>
																<td><input type="radio" name="quality" class="radio" value="5"></td>
															</tr>-->
														</tbody>
													</table><!-- /.table .table-bordered -->
												</div><!-- /.table-responsive -->
											</div><!-- /.review-table -->
											<?php }?>
                      <?php if($_SESSION['BUYER_ACC']!=''){?>
											<div class="review-form">
												<div class="form-container">
													<!--<form role="form" class="cnt-form">-->
														
														<div class="row">
															<div class="col-sm-6">
																<div class="form-group">
                                  <input type="hidden" class="form-control formtitle" id="product_id2" name="product_id2" value="<?=$_REQUEST[details];?>" placeholder="Title">

                                  <input type="hidden" class="form-control formtitle" id="user_name2" name="user_name2" value="<?=$_SESSION['CUSTOMER_INFO']['name'];?>" placeholder="Title">
                                  <input type="hidden" class="form-control formtitle" id="user_email2" name="user_email2" value="<?=$_SESSION['CUSTOMER_INFO']['email'];?>" placeholder="Title">
                                  <input type="hidden" class="form-control formtitle" id="exact_time"2 name="exact_time2" value="<?php
                                  echo $date = date('Y/m/d');
                                  ?>"  placeholder="Title">

																	<label for="exampleInputName">Your Name <span class="astk">*</span></label>
																	<input type="text" class="form-control txt" name="post_name2" id="post_name" required>
																</div><!-- /.form-group -->
																<div class="form-group">
																	<label for="exampleInputSummary">Summary <span class="astk">*</span></label>
																	<input type="text" name="title2" id="title2" class="form-control txt" required >
																</div><!-- /.form-group -->
															</div>

															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputReview">Review <span class="astk">*</span></label>
																	<textarea name="message2" id="message2" class="form-control txt txt-review" required></textarea>
																</div><!-- /.form-group -->
															</div>
														</div><!-- /.row -->
														
														<div class="action text-right">
															<button type="submit" id="sub_review" name="sub_review" class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
														</div><!-- /.action -->

													</form><!-- /.cnt-form -->

												</div><!-- /.form-container -->
											</div><!-- /.review-form -->
                      <?php }?>
										</div><!-- /.product-add-review -->										
										
                    <div class="product-reviews">
                      <h4 class="title">Customer Reviews</h4>
                        <?php 
                        $i=0; 
                        $sql_review = "SELECT * FROM ".DTABLE_REVIEW." where product_id='$product_sid' order by id desc ";
                        $res_redetails = $db->selectData($sql_review);
                        while($row_re_details = $db->getRow($res_redetails)){
                        $i++;
                        ?>
                        <?php
                        $date_post=$row_re_details[exact_time];
                        $year=date("Y",strtotime($date_post));
                        $month=date("M",strtotime($date_post));

                        $day=date("d",strtotime($date_post));

                        ?>
                      <div class="reviews">
                        <div class="review">
                          <div class="review-title"><span class="summary"><?=$row_re_details[title];?></span><span class="date"><i class="fa fa-calendar"></i><span><?=$day;?> <?=$month;?>, <?=$year;?></span></span></div>
                          <div class="text"><?=$row_re_details[message];?></div>
                        </div>                      
                      </div><!-- /.reviews -->
                        <?php } ?>
                    </div><!-- /.product-reviews -->
                  </div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->

<!-- ============================================== UPSELL PRODUCTS ============================================== -->

<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">Related Products</h3>
	<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
  <?php
  $sql_related = "SELECT * FROM ".DTABLE_PRODUCT." where category='".$row_rec_details['category']."' and sub_category='".$row_rec_details['sub_category']."' ORDER BY id DESC";
  $res_related = $db->selectData($sql_related);
  while($row_rec_related = $db->getRow($res_related)){
  ?>
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="detail.php?details=<?php echo $row_rec_related['sid']; ?>"><img  src="<?php echo $row_rec_related['image_browse']?>" alt=""></a>
			</div><!-- /.image -->			

			            <div class="tag sale"><span>sale</span></div>            		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="detail.php?details=<?php echo $row_rec_related['sid']; ?>"><?php echo $row_rec_related['name']; ?></a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">₹<?php echo $row_rec_related['new_price']; ?>				</span>
										     <span class="price-before-discount">₹<?php echo $row_rec_related['old_price']; ?></span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">         
		        <li class="lnk wishlist">
							<a class="add-to-cart" href="#" title="Wishlist">
								 <i class="icon fa fa-heart"></i>
							</a>
						</li>
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
  <?php } ?>

			</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
			
			</div><!-- /.col -->
			<div class="clearfix"></div>
		</div><!-- /.row -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">

		<div class="logo-slider-inner">	
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
				<div class="item m-t-15">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item m-t-10">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->
		    </div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->
	
</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->

<!-- ============================================================= FOOTER ============================================================= -->
<?php include('footer.php'); ?> 
<!-- ============================================================= FOOTER : END============================================================= -->


	<!-- For demo purposes – can be removed on production -->
	
	
	<!-- For demo purposes – can be removed on production : End -->

	<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery-1.11.1.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/bootstrap-hover-dropdown.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script> 
<script src="assets/js/echo.min.js"></script> 
<script src="assets/js/jquery.easing-1.3.min.js"></script> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<script src="assets/js/jquery.rateit.min.js"></script> 
<script type="text/javascript" src="assets/js/lightbox.min.js"></script> 
<script src="assets/js/bootstrap-select.min.js"></script> 
<script src="assets/js/wow.min.js"></script> 
<script src="assets/js/scripts.js"></script>

<script>
  $(".see-more").nextUntil(".see-less").wrapAll("<div class='see-more-content'></div>");
    
    
    $(".see-less").hide();
    var count= 1
    /*
    $(".see-more-content").each(function(){
        var count= count+1;
        $(this).data("count",count);
        console.log(count);
    });
    */
    
    $(".see-more-content").slideUp(0);
    
    
    
    $(".see-more").click(function(){
        
        $(".see-more-content").slideToggle();
        $(".see-more").hide();
        $(".see-less").show();
        
    });
    $(".see-less").click(function(){
        $(".see-more-content").slideToggle();
        $(".see-less").hide();
        $(".see-more").show();
    });

</script>
<script>

 $("#pinBox").keydown(function(){
      // var tb = document.getElementById("pinBox");
      // if(tb.value.length != 6){
      //   document.getElementById("d_details").innerHTML="Please enter a valid pin code";
      // }
        // $("#pinBox").css("background-color", "yellow");
        console.log("hihhihi");
        checkPin();
    });
    $("#pinBox").keyup(function(){
      // var tb = document.getElementById("pinBox");
      // if(tb.value.length != 6){
      //   document.getElementById("d_details").innerHTML="Please enter a valid pin code";
      // }
        // $("#pinBox").css("background-color", "pink");
        checkPin();
    });

function runScript(e) {
    //See notes about 'which' and 'key'
    // console.log(e);
    // if(e.type == 'keypress'){
    //   var tb = document.getElementById("pinBox");
    //   if(tb.value.length != 6){
    //     document.getElementById("d_details").innerHTML="Please enter a valid pin code";
    //   }
    //   else if(tb.value.length == 6){
    //     $.ajax({
    //         type:'post',
    //         url:'pin_available.php',
    //         data:{
    //           pin_aval:'pin_aval',
    //           pin: tb.value
    //         },
    //         success:function(response) {
    //           // $("#cartItems").html(response);
    //           document.getElementById("d_details").innerHTML=response;
    //         }
    //       });
    //   }
    // }

    if (e.keyCode == 13) {
      checkPin();
        // var tb = document.getElementById("pinBox");
        // if(tb.value.length == 6){
        //   $.ajax({
        //     type:'post',
        //     url:'pin_available.php',
        //     data:{
        //       pin_aval:'pin_aval',
        //       pin: tb.value
        //     },
        //     success:function(response) {
        //       // $("#cartItems").html(response);
        //       document.getElementById("d_details").innerHTML=response;
        //     }
        //   });
        // }
        // else{
        //   document.getElementById("d_details").innerHTML="Please enter a valid pin code";
        // }
    }
}
function checkPin(){
  var tb = document.getElementById("pinBox");
        if(tb.value.length != 6){
          document.getElementById("d_details").innerHTML="Please enter a valid pin code";
        }
        else if(tb.value.length == 6){
          
          $.ajax({
            type:'post',
            url:'pin_available.php',
            data:{
              pin_aval:'pin_aval',
              pin: tb.value
            },
            success:function(response) {
              // $("#cartItems").html(response);
              document.getElementById("d_details").innerHTML=response;
            }
          });
        }
}

</script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
$(document).ready(function(){
  console.log("aaa",document.getElementById("product-add-to-cart"));
  if(document.getElementById("product-add-to-cart")){
    document.getElementById("go-to-cart").style.display = "none";
    document.getElementById("product-add-to-cart").style.display = "none";
  
    checkProductInCart('<?php echo $product_sid; ?>');
  }
  cartCount();
  showCart();
});

function checkProductInCart(id){
  console.log(id);
  $.ajax({
    type:'post',
    url:'addtocart.php',
    data:{
      productCheckInCart:'productCheckInCart',
      Pid:id
    },
    success:function(response) {
      console.log(response);
      if(response){
        document.getElementById("go-to-cart").style.display = "inline-block";
        document.getElementById("product-add-to-cart").remove();
        console.log("present");
      }else{        
        document.getElementById("product-add-to-cart").style.display = "inline-block";
        document.getElementById("go-to-cart").remove();
        console.log("not");
      }
    }
  });
}

function addCart(id){
  console.log("hi..",id);
  document.getElementById("product-add-to-cart").style.pointerEvents = 'none';
  document.getElementById("product-add-to-cart").innerHTML ="ADDING TO CART";
  $.ajax({
    type:'post',
    url:'addtocart.php',
    data:{
      addcart:'addcart',
      id:id
    },
    success:function(response) {
      console.log(response);
      // toastr.success(response+" - Added to the Cart");
      cartCount();
      showCart();
      document.getElementById("product-add-to-cart").style.background = "#ff9f00";
      document.getElementById("product-add-to-cart").innerHTML ="GOING TO CART";
      setTimeout(function(){ document.location.href = "cart.php"; }, 1000);
    }
  });
}

function cartCount(){
  $.ajax({
    type:'post',
    url:'addtocart.php',
    data:{
      cartcount:'cartcount'
    },
    success:function(response) {
      $("#cartCount").html(response);
      
      totalAmt();
      console.log(response)
    }
  });
}

function totalAmt(){
  $.ajax({
    type:'post',
    url:'addtocart.php',
    data:{
      total:'total'
    },
    success:function(response) {
      $("#totalAmt").html(response);
      // cartCount();
    }
  });
}

function showCart(){
  $.ajax({
    type:'post',
    url:'cartitemsshow.php',
    data:{
      cartshow:'cartshow'
    },
    success:function(response) {
      // $("#cartItems").html(response);
      document.getElementById("cartItems").innerHTML=response;
      console.log(response)
    }
  });
}

function buyNow(id){
  console.log(id);
  $.ajax({
    type:'post',
    url:'checklogin.php',
    data:{
      checklogin:'checklogin',
      itemId: id
    },
    success:function(response) {
      console.log(response)
      if(response == 'notlogin'){
        // window.location = 'my-profile.php'
        window.location = 'checkoutbuy.php';
      }else{
        window.location = 'checkoutbuy.php';
      }
    }
  });
}

// function get_rating(val){
// document.getElementById("rating").value=val;
// //alert(val);
//   }

function review_post(val,val2){
 var details=$("#details").val();

var product_id=$("#product_id").val();
var user_name=$("#user_name").val();
var user_email=$("#user_email").val();
var rating=$("input[name='rating']:checked").val();
var exact_time=$("#exact_time").val();
var title=$("#title").val();
var message=$("#message").val();

var dataString = 'product_id=' + product_id + '&user_name=' + user_name + '&user_email=' + user_email + '&rating=' + rating+ '&exact_time=' + exact_time + '&title=' + title + '&message=' + message+ '&details=' + details;
if (title == '' || message == '') {
alert("Please Fill All Fields");
$("#title").focus();
} else {
$("#sub").prop('value', 'Posting...');
  $("#sub").prop("disabled", true);
$.ajax({
type: "POST",
url: "review_insert.php",
data: dataString,
cache: false,
success: function(html) {
//alert(html);

$("#alert_rem").show();
//$("#inner_ajax").html(html);
//$("#sub").prop('value', 'Post');
  //$("#sub").prop("disabled", false);
location.reload();
//$("#title").val('');
//$("#message").val('');
}
});
}
return false;
}

function get_size(id,newp,oldp,dis,sid){
//alert(id+newp);
var msg='<a id="product-add-to-cart"  onClick="addCart()" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs" onClick="addCart()"></i>ADD TO CART</a><a id="go-to-cart" style="display:none" href="cart.php" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs" href="cart.php"></i>GO TO CART</a><a id="buy_id" style="background: #10c310; margin-left: 10px;" onClick="buyNow()" class="btn btn-primary"><i class="fa fa-bolt inner-right-vs" onClick="buyNow()"></i>BUY NOW</a>';
alert(msg);
$(".act_size").removeClass("act_size");
var size=$("#size_price").val();
if(size!=''){
//$("#product-add-to-cart").prop("disabled", false);
//$("#buy_id").prop("disabled", false);
//$("#product-add-to-cart").removeAttr('disabled');
//$("#buy_id").removeAttr('disabled');
$("#"+id).addClass("act_size");
$(".price").html('₹'+newp);
$(".atag_html").html(msg);
$(".price-strike").html('₹'+oldp);
$(".price-strike2").html(dis+'% off');
}
}
</script>
</body>
</html>
