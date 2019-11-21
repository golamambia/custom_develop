<?php
    include_once("configure.php");

    if($_SESSION['CLIENT']['log']!='true'){
header("location:login.php");
} 
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
   
    <link rel="stylesheet" type="text/css" href="stylesheets/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/icofont.min.css">
     <link rel="stylesheet" type="text/css" href="css/mystyle.css">
</head>

<body>
<div class="boxed">
        <div class="overlay"></div>
        <?php include('inc/header.php');?>  
     <div class="mainara">
     	<div class="container">
        	<div class="site-content-contain-wrapper clearfix">
<!--Left Panel Start-->
<div class="left-panelbg"></div>
<aside id="left-panel">
    <a class="btn-leftmenuclose" href="javascript:void(0)"><i class="fa fa-times" aria-hidden="true"></i></a>
	<nav class="leftmenu">

    <ul>
        	
        	<li><a href="dashboard.php"><i class="fa fa-user" aria-hidden="true"></i> My Profile</a></li>
        	<li><a href="orderlist.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i>Order list</a></li>
        	<li class="active"><a href="wishlist.php"><i class="fa fa-heart-o" aria-hidden="true"></i> wish list</a></li>
            <li><a href="change_password.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Change Password</a></li>
            <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
			
                
        </ul>
    </nav>
</aside>
<!--Left Panel End-->

<!--Main Contaner Start-->
<div id="main">
    <div class="page-header">
        <div class="container-fluid type2">
            <h1>wish list</h1>
        </div>
    </div>
    <div class="site-content-contain">
        <div id="content" class="site-content">
            <div class="container-fluid type2">
            	
								<table class="table-wishlist">
									<thead>
										<tr>
											<th>Product Name</th>
											<th>Unit Price</th>
											<th>Stock Status</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
                                        <?php 
            $sql = "SELECT * FROM ".DTABLE_WISHLIST." where user_id=".$_SESSION['CLIENT']['id']." ORDER BY id DESC";
            $res = $db->selectData($sql);
            while($row_rec = $db->getRow($res)){
               $or=$row_rec['product_id'];
              $sql1 = "SELECT * FROM ".DTABLE_product." where productid='".$or."'";
            $res1 = $db->selectData($sql1);
           while($row_rec1 = $db->getRow($res1)){
            ?>
										<tr>
											<td>
												<div class="delete">
													<a href="javascript:void(0)" onClick="wremove('<?php echo $row_rec['id']; ?>','<?php echo $_SESSION['CLIENT']['id']; ?>')" title=""><img src="images/icons/delete.png" alt="" class="mCS_img_loaded"></a>
												</div>
												<div class="product">
													<div class="image">
														<img src="<?php echo $row_rec1['pimage']; ?>" alt="" class="mCS_img_loaded">
													</div>
													<div class="name">
														<?php echo $row_rec1['productname']; ?>
													</div>
												</div>
											</td>
											<td>
												<div class="price">
													Rs<?php echo $row_rec1['productpprice']; ?>
												</div>
											</td>
											<td>
												<div class="status-product">
                                                    <?php 
                                                     $stk=$row_rec1['productstock'];
                                                     if($stk!=''){ ?>
													<span>In stock</span>
                                                <?php }else{?>
                                                    <span>Out stock</span>
                                                    <?php
                                                } ?>
												</div>
											</td>
											<td>
												<div class="add-cart">
													<a href="javascript:void(0)" title="" id="addtocart" onclick="get_headercart('add','<?=$row_rec1[code];?>','1','cat_msg<?=$i;?>')">
														<img src="images/icons/add-cart.png" alt="" class="mCS_img_loaded">Add to Cart
													</a>
												</div>
											</td>
										</tr>
                                    <?php } }?>
										
									</tbody>
								</table><!-- /.table-wishlist -->
							
            </div>
        </div>
    </div>
</div>
<!--Main Contaner Start-->
</div>
        </div>
     </div>
     
     
     
     
     
     
     
     
     
     
     
     
    <!-- INDEX STOP -->
    
    <!-- FOOTER START -->

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-ft widget-about">
                            <div class="logo logo-ft">
                                <a href="index.html" title="">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                            <div class="widget-content">
                                <div class="icon">
                                    <img src="images/icons/call.png" alt="">
                                </div>
                                <div class="info">
                                    <p class="questions">Got Questions ? Call us 24/7!</p>
                                    <p class="phone">Call Us: (888) 1234 56789</p>
                                    <p class="address">
                                        PO Box CT16122 Collins Street West, Victoria 8007,<br />Australia.
                                    </p>
                                </div>
                            </div>
                            <ul class="social-list">
                                <li>
                                    <a href="javascript:void(0);" title="">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" title="">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" title="">
                                        <i class="fa fa-instagram" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" title="">
                                        <i class="fa fa-pinterest" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" title="">
                                        <i class="fa fa-dribbble" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" title="">
                                        <i class="fa fa-google" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-ft widget-categories-ft">
                            <div class="widget-title">
                                <h3>Find By Categories</h3>
                            </div>
                            <ul class="cat-list-ft">
                                <li>
                                    <a href="javascript:void(0);" title="">demo</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" title="">demo1</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" title="">demo2</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" title="">demo3</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" title="">demo4</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" title="">demo5</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" title="">demo6</a>
                                </li>
                            </ul><!-- /.cat-list-ft -->
                        </div><!-- /.widget-categories-ft -->
                    </div><!-- /.col-lg-3 col-md-6 -->
                    <div class="col-lg-2 col-md-6">
                        <div class="widget-ft widget-menu">
                            <div class="widget-title">
                                <h3>Customer Care</h3>
                            </div>
                            <ul>
                                <li>
                                    <a href="javascript:void(0);" title="">
                                        Contact us
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" title="">
                                        Site Map
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" title="">
                                        My Account
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="javascript:void(0);" title="">
                                        Delivery Information
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" title="">
                                        Privacy Policy
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" title="">
                                        Terms & Conditions
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                      <div class="widget-ft widget-categories-ft">
                        <div class="widget-title">
                                <h3>Mobile Apps</h3>
                            </div>
                       
                            
                            <ul class="app-list">
                                <li class="app-store">
                                    <a href="javascript:void(0);" title="">
                                        <div class="img">
                                            <img src="img/apple-store.png" alt="">
                                        </div>
                                        <div class="text">
                                            <h4>App Store</h4>
                                            <p>Available now on the</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="google-play">
                                    <a href="javascript:void(0);" title="">
                                        <div class="img">
                                            <img src="img/google-play.png" alt="">
                                        </div>
                                        <div class="text">
                                            <h4>Google Play</h4>
                                            <p>Get in on</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>
        </footer>

        <section class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="copyright"> All Rights Reserved © company Store 2019</p>
                        
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- Javascript -->
    <script type="text/javascript" src="javascript/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/tether.min.js"></script>
    <script type="text/javascript" src="javascript/bootstrap.min.js"></script>
    <script type="text/javascript" src="javascript/waypoints.min.js"></script>
    <!-- <script type="text/javascript" src="javascript/jquery.circlechart.js"></script> -->
    <script type="text/javascript" src="javascript/easing.js"></script>
    <script type="text/javascript" src="javascript/jquery.zoom.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle2/2.1.6/jquery.cycle2.min.js"></script>
    <script type="text/javascript" src="javascript/owl.carousel.js"></script>
    <script type="text/javascript" src="javascript/smoothscroll.js"></script>
    <!-- <script type="text/javascript" src="javascript/jquery-ui.js"></script> -->
    <script type="text/javascript" src="javascript/jquery.mCustomScrollbar.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtRmXKclfDp20TvfQnpgXSDPjut14x5wk&amp;region=GB"></script>
    <script type="text/javascript" src="javascript/gmap3.min.js"></script>
    <script type="text/javascript" src="javascript/waves.min.js"></script>
    <script type="text/javascript" src="javascript/jquery.countdown.js"></script>
    <script type="text/javascript" src="js/jquery.extra.js"></script>
    <script type="text/javascript" src="javascript/main.js"></script>
    <script src="javascript/skdslider.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('#demo1').skdslider({
                slideSelector: '.slide',
                delay: 5000,
                animationSpeed: 2000,
                showNextPrev: true,
                showPlayButton: true,
                autoSlide: true,
                animationType: 'fading'
            });

            jQuery('#demo2').skdslider({
                slideSelector: '.slide',
                delay: 5000,
                animationSpeed: 1000,
                showNextPrev: true,
                showPlayButton: false,
                autoSlide: true,
                animationType: 'sliding'
            });
        });

    </script>

    <script>
        document.onkeydown = function(e) {
            if (e.keyCode == 123) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                return false;
            }
            if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                return false;
            }

            if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                return false;
            }
        }


function wremove(id,bid){
    //alert(bid);
    $.ajax({
    type:'post',
    url:'addtowishlist.php',
    data:{
      removefromwish:'removefromwish',
      id:id,
      bid:bid,
    },
    success:function(response) {
      console.log(response);
            if(response){
                toastr.success("Product Removed Successfully");
                location.reload(true);
            }
            
    }
  });
}
    </script>


</body>

</html>
<!-- FOOTER STOP -->