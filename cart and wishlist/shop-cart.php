
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
     <script type="text/javascript">
         var a = 1;
      function increase(id){
            var textBox = document.getElementById(""+id);
            textBox.value = a;
            a++;
      }      
            function decrease(id){
            //alert(a);
              var textBox = document.getElementById(""+id);
             
              if(a >1) {
              textBox.value = a;
      a--;
    }
               
            }

             function quan_update(id,no){
var quanval=$("#update"+no).val();
//alert(quanval);
if(quanval==0){
document.getElementById("change"+no).disabled = true;

}else{
document.getElementById("change"+no).disabled = false;

}

}

function quan_change(val,action,code){

$.ajax({
            url: 'ajax_header_cart.php',
            type: 'post',
            data: {action:action,code:code,quantity:val},
            success:function(response){
                //alert(response);

                    $("#cart").html(response);

              location.reload();
            }
        });

}

     </script>
</head>

<body>
<div class="boxed">
        <div class="overlay"></div>
         <?php include('inc/header.php'); ?>
        
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
            <?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
    $item_total_quan = 0;
?>
       
     <div class="mainara">
     	<div class="container flat-shop-cart">
				<div class="row">
					<div class="col-lg-8">
						<div class="flat-row-title style1">
							<h3>Shopping Cart</h3>
						</div>
						<div class="table-cart   mCustomScrollbar _mCS_1 mCS_no_scrollbar"><div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_horizontal mCSB_inside" style="max-height: none;" tabindex="0"><div id="mCSB_1_container" class="mCSB_container mCS_x_hidden mCS_no_scrollbar_x" style="position: relative; top: 0px; left: 0px; width: 499px; min-width: 100%; overflow-x: inherit;" dir="ltr">
							<table>
								<thead>
									<tr>
										<th>Product</th>
										<th>Quantity</th>
										<th>Total</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
                                    <?php  
            $i=0;
            
    foreach ($_SESSION["cart_item"] as $item){
        $i++;
      
        ?>
									<tr id="rem_id<?=$i;?>">
										<td>
											<div class="img-product">
												<img src="<?php echo $item["image"]; ?>" alt="" class="mCS_img_loaded">
											</div>
											<div class="name-product">
												<?php echo $item["name"]; ?>
											</div>
											<div class="price">
												<?php echo "Rs".$item["price"]; ?>
											</div>
											<div class="clearfix"></div>
										</td>
										<td>
											<div class="quanlity">
												<!-- <span class="btn-down" onclick="decrease('update<?=$i;?>')"></span> -->
												<input type="text" name="number" id="update<?=$i;?>" value="<?php echo $item["quantity"]; ?>"   placeholder="Quanlity" onkeyup="quan_update(this.value,'<?=$i;?>')"  onkeydown="return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )">
												<!-- <span class="btn-up" onclick="increase('update<?=$i;?>')"></span> -->
											</div>
										</td>
										<td>
											<div class="total">
												<?php
                        

                 $quantity_price=($item["price"]*$item["quantity"]);
                echo "Rs".$quantity_price; ?>
											</div>
										</td>
										<td>
											<a href="javascript:void(0)" class="m-2" onclick="get_headercart1('remove','<?php echo $item["code"]; ?>','rem_id<?=$i;?>')">
                                                <a href="javascript:void(0)" onclick="quan_change(update<?=$i;?>.value,'update','<?php echo $item["code"]; ?>')" id="change<?=$i;?>">
											<i class="fa fa-refresh" aria-hidden="true"></i></a>
											</a>
											<a href="javascript:void(0)" onclick="get_headercart1('remove','<?php echo $item["code"]; ?>','rem_id<?=$i;?>')">
												<img src="images/icons/delete.png" alt="" class="mCS_img_loaded">
											</a>
										</td>
									</tr>
									<?php
        $item_total += ($item["price"]*$item["quantity"]);
        $item_total_quan += $item["quantity"];
        }
        
//$total_vat=round(($item_total*3)/100);
           
$all_total=$item_total;


        ?>
								</tbody>
							</table>
							<!--<div class="form-coupon">
								<form action="#" method="get" accept-charset="utf-8">
									<div class="coupon-input">
										<input type="text" name="coupon code" placeholder="Coupon Code">
										<button type="submit">Apply Coupon</button>
									</div>
								</form>
							</div>--><!-- /.form-coupon -->
						</div><div id="mCSB_1_scrollbar_horizontal" class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_horizontal" style="display: none;"><div class="mCSB_draggerContainer"><div id="mCSB_1_dragger_horizontal" class="mCSB_dragger" style="position: absolute; min-width: 30px; width: 0px; left: 0px;"><div class="mCSB_dragger_bar"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div><!-- /.table-cart -->
					</div><!-- /.col-lg-8 -->
					<div class="col-lg-4">
						<div class="cart-totals">
							<h3>Cart Totals</h3>
							<form action="#" method="get" accept-charset="utf-8">
								<table>
									<tbody>
                                        <tr >
                                            <td>Total Item</td>
                                            <td class="subtotal"><?php echo $item_total_quan; ?></td>
                                        </tr>
                                        
										<tr>
											<td>Subtotal</td>
											<td class="subtotal"><?php echo "Rs".$item_total; ?></td>
										</tr>
										<!-- <tr>
											<td>Shipping</td>
											<td class="btn-radio">
												<div class="radio-info">
													<input type="radio" name="shipping_rate" value="3" onclick="get_price(this.value,'<?=$all_total;?>')" id="flat-rate">
													<label for="flat-rate">Flat Rate: <span>$3.00</span></label>
												</div>
												<div class="radio-info">
													<input type="radio" name="shipping_rate" value="0" onclick="get_price(this.value,'<?=$all_total;?>')" checked id="free-shipping">
													<label for="free-shipping">Free Shipping</label>
												</div>
												
											</td>
										</tr> -->
										<tr>
											<td>Total</td>
											<td class="price-total" id="totalprice">Rs<?php 

              echo $all_total; ?></td>
										</tr>
									</tbody>
								</table>
								<div class="btn-cart-totals">
									<!--<a href="#" class="update" title="">Update Cart</a>-->
									<a href="shop-checkout.php" class="checkout" title="">Proceed to Checkout</a>
								</div><!-- /.btn-cart-totals -->
							</form><!-- /form -->
						</div><!-- /.cart-totals -->
					</div><!-- /.col-lg-4 -->
				</div><!-- /.row -->
			</div>
     </div>
     
    <?php
}else{
?>
     

<div class="mainara">
        <div class="container flat-shop-cart">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="flat-row-title style1">
                            <h3>Shopping Cart</h3>
                        </div>
                        <div class="table-cart mCustomScrollbar _mCS_1 mCS_no_scrollbar"><div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_horizontal mCSB_inside" style="max-height: none;" tabindex="0"><div id="mCSB_1_container" class="mCSB_container mCS_x_hidden mCS_no_scrollbar_x" style="position: relative; top: 0px; left: 0px; width: 499px; min-width: 100%; overflow-x: inherit;" dir="ltr">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><td colspan="3" style="text-align: center;font-size: 27px;color: red;">Your Cart Empty</td></tr>
                                </tbody>
                            </table>
                        
                </div>
            </div>
        </div>
        </div>
</div>
</div>
</div>


     <?php }?>
      
    <!-- FOOTER START -->
<?php include("inc/footer.php")?>