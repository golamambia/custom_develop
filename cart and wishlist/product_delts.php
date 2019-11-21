<?php 
	include_once("configure.php");
	$sql = "SELECT * FROM ".DTABLE_product." where productid='$_GET[id]'";
	$res = $db->selectData($sql);
	$row_rec = $db->getRow($res);
	//var_dump($row_rec);
//echo $_SESSION['CLIENT']['u_name'];
	/*if (isset($_SESSION['CLIENT']) && $_SESSION['CLIENT'] == true) {
    echo "Welcome to the member's area, " . $_SESSION['CLIENT']['u_name'] . "!";
} else {
    header("location:login.php");
}*/
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="">
      <link rel="icon" href="images/favicon.png" type="image/x-icon" />    
      <title>Hi-Secure exhibition services</title>
      <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet">
   
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <link rel="stylesheet" type="text/css" href="stylesheets/bootstrap.min.css">
    
    <link rel="stylesheet" type="text/css" href="stylesheets/style.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/skdslider.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/icofont.min.css">
     <link rel="stylesheet" type="text/css" href="css/mystyle.css">
</head>

<body>
<div class="boxed">
        <div class="overlay"></div>
         <?php include('inc/header.php')?>
        
        
        
        <section class="flat-breadcrumb">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumbs">
							<li class="trail-item">
								<a href="index.php" title="">Home</a>
								<span><img src="images/icons/arrow-right.png" alt=""></span>
							</li>
							<li class="trail-end">
								<a href="#" title="">Shop-cart</a>
							</li>
						</ul><!-- /.breacrumbs -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section>
    
     
    <!-- INDEX START -->
     
       
       
       
       
       
       
     <div class="mainara">
     	<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="flexslider">
							<!-- /.slides -->
						<div class="flex-viewport" style="overflow: hidden; position: relative;"><ul class="slides" style="width: 1400%; transition-duration: 0s; transform: translate3d(-555px, 0px, 0px);">
						<li data-thumb="images/product/flexslider/thumb/6.jpg" class="clone" aria-hidden="true" style="width: 555px; margin-right: 0px; float: left; display: block;">
							      <a href="#" id="zoom4_clone" class="zoom"><img src="img/catere3.png" alt="" width="400" height="300" draggable="false"></a>
							    </li>
								
								
							    <li data-thumb="images/product/flexslider/thumb/2.jpg" style="width: 555px; margin-right: 0px; float: left; display: block;" class="flex-active-slide" data-thumb-alt="">
							      <a href="#" id="zoom" class="zoom" style="position: relative; overflow: hidden;"><img src="<?php echo $row_rec['pimage']; ?>" alt="" width="400" height="300" draggable="false"><img role="presentation" src="file:///E:/WORK/Furniture/techno%20-%20Copy/images/product/flexslider/big-size.jpg" class="zoomImg" style="position: absolute; top: -186.429px; left: -272.048px; opacity: 0; width: 1000px; height: 1000px; border: none; max-width: none; max-height: none;"></a>
							      <span>NEW</span>
							    </li>
								
								
							    <li data-thumb="images/product/flexslider/thumb/3.jpg" data-thumb-alt="" style="width: 555px; margin-right: 0px; float: left; display: block;">
							      <a href="#" id="zoom1" class="zoom" style="position: relative; overflow: hidden;"><img src="images/product/flexslider/big-size.jpg" alt="" width="400" height="300" draggable="false"><img role="presentation" src="file:///E:/WORK/Furniture/techno%20-%20Copy/images/product/flexslider/big-size.jpg" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 1000px; height: 1000px; border: none; max-width: none; max-height: none;"></a>
							    </li>
								
								
							    <li data-thumb="images/product/flexslider/thumb/4.jpg" data-thumb-alt="" style="width: 555px; margin-right: 0px; float: left; display: block;">
							      <a href="#" id="zoom2" class="zoom" style="position: relative; overflow: hidden;"><img src="images/product/flexslider/big-size.jpg" alt="" width="400" height="300" draggable="false"><img role="presentation" src="file:///E:/WORK/Furniture/techno%20-%20Copy/images/product/flexslider/big-size.jpg" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 1000px; height: 1000px; border: none; max-width: none; max-height: none;"></a>
							      <span>NEW</span>
							    </li>
								
								
							    <li data-thumb="images/product/flexslider/thumb/5.jpg" data-thumb-alt="" style="width: 555px; margin-right: 0px; float: left; display: block;">
							      <a href="#" id="zoom3" class="zoom" style="position: relative; overflow: hidden;"><img src="images/product/flexslider/big-size.jpg" alt="" width="400" height="300" draggable="false"><img role="presentation" src="file:///E:/WORK/Furniture/techno%20-%20Copy/images/product/flexslider/big-size.jpg" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 1000px; height: 1000px; border: none; max-width: none; max-height: none;"></a>
							    </li>
								
								
							    <li data-thumb="images/product/flexslider/thumb/6.jpg" data-thumb-alt="" style="width: 555px; margin-right: 0px; float: left; display: block;">
							      <a href="#" id="zoom4" class="zoom" style="position: relative; overflow: hidden;"><img src="images/product/flexslider/big-size.jpg" alt="" width="400" height="300" draggable="false"><img role="presentation" src="file:///E:/WORK/Furniture/techno%20-%20Copy/images/product/flexslider/big-size.jpg" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 1000px; height: 1000px; border: none; max-width: none; max-height: none;"></a>
							    </li>
								
								
							<li data-thumb="images/product/flexslider/thumb/2.jpg" style="width: 555px; margin-right: 0px; float: left; display: block;" class="clone" aria-hidden="true">
							      <a href="#" id="zoom_clone" class="zoom"><img src="images/product/flexslider/big-size.jpg" alt="" width="400" height="300" draggable="false"></a>
							      <span>NEW</span>
							    </li>
								
								
								</ul></div><ul class="flex-direction-nav"><li class="flex-nav-prev"><a class="flex-prev" href="#">Previous</a></li><li class="flex-nav-next"><a class="flex-next" href="#">Next</a></li></ul></div><!-- /.flexslider -->
					</div><!-- /.col-md-6 -->
					<div class="col-md-6">
						<div class="product-detail style4">
							<div class="header-detail">
								<h4 class="name"> <?php echo $row_rec['productname']; ?></h4>
								<div class="category">
									Smart Watches
								</div>
								<div class="reviewed">
									<div class="review">
										<div class="queue">
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</div>
										<div class="text">
											<span>3 Reviews</span>
											<span class="add-review">Add Your Review</span>
										</div>
									</div>
									<div class="status-product">
										Availablity <span>In stock</span>
									</div>
								</div><!-- /.reviewed -->
							</div><!-- /.header-detail -->
							<div class="content-detail">
								<div class="price">
									<div class="regular">
										Rs. <?php echo $row_rec['oldprice']; ?>
									</div>
									<div class="sale">
										Rs. <?php echo $row_rec['productpprice']; ?>
									</div>
								</div>
								<div class="info-text">
									<?php echo $row_rec['productdescription']; ?>
								</div>
								
							</div><!-- /.content-detail -->
							<div class="footer-detail">
								<!-- /.quanlity-box -->
								<div class="box-cart style2">
									<div class="btn-add-cart">
										<a href="javascript:void(0)" title="" id="addtocart" onclick="get_headercart('add','<?=$row_rec[code];?>','1','cat_msg<?=$i;?>')"><img src="images/icons/add-cart.png" alt="">Add to Cart</a>
									</div>
									<div class="compare-wishlist">
										
										<a href="javascript:void(0)" onClick="addWish('<?php echo $row_rec['productid']; ?>','http://<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];?>')" class="wishlist" title=""><img src="images/icons/wishlist.png" alt="">Wishlist</a>
									</div>
								</div><!-- /.box-cart style2 -->
								<!-- /.social-single -->
							</div><!-- /.footer-detail -->
						</div><!-- /.product-detail style4 -->
					</div><!-- /.col-md-6 -->
				</div><!-- /.row -->
                
                
                <section class="flat-product-content">
			<ul class="product-detail-bar">
				<li class="active">Description</li>
				<li>Tecnical Specs</li>
				<li>Reviews</li>
			</ul><!-- /.product-detail-bar -->
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="description-text">
							<div class="box-text">
								<?php echo $row_rec['productdescription']; ?>
								</div>
							
							
							
						</div>
					</div>
					
				</div><!-- /.row -->
				<div class="row" style="display: none;">
					<div class="col-md-12">
						<div class="tecnical-specs">
							<h4 class="name">
								Warch 42 mm Smart Watches
							</h4>
							<table>
								<tbody>
									<tr>
										<td>Height</td>
										<td>38.6mm</td>
									</tr>
									<tr>
										<td>Meterial</td>
										<td>Stainless Stee</td>
									</tr>
									<tr>
										<td>Case</td>
										<td>40g</td>
									</tr>
									<tr>
										<td>Color</td>
										<td>blue, gray, green, light blue, lime, purple, red, yellow</td>
									</tr>
									<tr>
										<td>Depth</td>
										<td>10.5mm</td>
									</tr>
									<tr>
										<td>Width</td>
										<td>33.3mm</td>
									</tr>
									<tr>
										<td>Size</td>
										<td>Large, Medium, Small</td>
									</tr>
								</tbody>
							</table>
						</div><!-- /.tecnical-specs -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
				<div class="row" style="display: none;">
					<div class="col-md-6">
						<div class="rating">
							<div class="title">
								Based on 3 reviews
							</div>
							<div class="score">
								<div class="average-score">
									<p class="numb">4.3</p>
									<p class="text">Average score</p>
								</div>
								<div class="queue">
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
								</div>
							</div>
							<ul class="queue-box">
								<li class="five-star">
									<span>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</span>
									<span class="numb-star">3</span>
								</li>
								<li class="four-star">
									<span>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</span>
									<span class="numb-star">4</span>
								</li>
								<li class="three-star">
									<span>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</span>
									<span class="numb-star">3</span>
								</li>
								<li class="two-star">
									<span>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</span>
									<span class="numb-star">2</span>
								</li>
								<li class="one-star">
									<span>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</span>
									<span class="numb-star">0</span>
								</li>
							</ul>
						</div><!-- /.rating -->
					</div><!-- /.col-md-6 -->
					<div class="col-md-6">
						<div class="form-review">
							<div class="title">
								Add a review 
							</div>
							<div class="your-rating queue">
								<span>Your Rating</span>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
							</div>
							<form action="#" method="get" accept-charset="utf-8">
								<div class="review-form-name">
									<input type="text" name="name-author" value="" placeholder="Name">
								</div>
								<div class="review-form-email">
									<input type="text" name="email-author" value="" placeholder="Email">
								</div>
								<div class="review-form-comment">
									<textarea name="review-text" placeholder="Your Name"></textarea>
								</div>
								<div class="btn-submit">
									<button type="submit">Add Review</button>
								</div>
							</form>
						</div><!-- /.form-review -->
					</div><!-- /.col-md-6 -->
					<div class="col-md-12">
						<ul class="review-list">
							<li>
								<div class="review-metadata">
									<div class="name">
										Ali Tufan : <span>April 3, 2016</span>
									</div>
									<div class="queue">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</div>
								</div><!-- /.review-metadata -->
								<div class="review-content">
									<p>
										Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
									</p> 
								</div><!-- /.review-content -->
							</li>
							<li>
								<div class="review-metadata">
									<div class="name">
										Peter Tufan : <span>April 3, 2016</span>
									</div>
									<div class="queue">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</div>
								</div><!-- /.review-metadata -->
								<div class="review-content">
									<p>
										Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
									</p> 
								</div><!-- /.review-content -->
							</li>
							<li>
								<div class="review-metadata">
									<div class="name">
										Jon Tufan : <span>April 3, 2016</span>
									</div>
									<div class="queue">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</div>
								</div><!-- /.review-metadata -->
								<div class="review-content">
									<p>
										Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
									</p> 
								</div><!-- /.review-content -->
							</li>
						</ul><!-- /.review-list -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section>
			</div>
     </div>
     
     
     
    <!-- INDEX STOP -->
    
   <?php include("inc/footer.php")?>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   <script type="text/javascript">
   	function addWish(id,gourl){
  $.ajax({
    type:'post',
    url:'addtowishlist.php',
    data:{
      addWish:'addWish',
      pid:id,gourl:gourl,
    },
    success:function(response) {
        if(response=='no'){
            window.location.href = 'login.php';
        }else if(response=='exist'){
        
      //console.log(response);
      toastr.success("Product already exist in Wishlist");
        }else{
        
      //console.log(response);
      toastr.success(response+" - Added to the Wishlist");
        }
    }
  });
} 
function delWish(id){
  $.ajax({
    type:'post',
    url:'removetowishlist.php',
    data:{
      addWish:'addWish',
      pid:id,gourl:gourl,
    },
    success:function(response) {
        
      //console.log(response);
      toastr.success("Product deleted from Wishlist");
       
    }
  });
}
   </script>