<?php
    //include_once("configure.php");
     include"payu_config.php";
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
    
     <!-- <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script> -->

</head>

<!-- <body onLoad="submitPayuForm()"> -->
  <body >
<div class="boxed">
        <div class="overlay"></div>
       <?php include('inc/header.php'); 
       

       ?>
        
        </script>

<?php
$method=$_POST['pay_method'];

if(isset($_POST['sub']))

{
if($_SESSION['CLIENT']['log']!='true'){
header("location:login.php?log=checkout");
}else{

if($method=='payumoney'){
$_SESSION['post_data']=$_POST;
?>

<p style="padding-left: 46%; font-weight: bold; padding-top: 8%;">Please wait...</p>


<script>
  $( document ).ready(function() {
    var hash = '<?php echo $hash ?>';
    //function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    //}
    });
  </script>




<?php

}else{
          $order_id='ORD'.uniqid();
            
              $_POST["payment_status"]='waiting';
              $_POST["total_amount"]=$_POST["amount"];
              //$_POST["cus_address"]=$_POST["cus_address"];
              $_POST["payment_tnx"]=$order_id;

            $_POST["order_date"]=date('d/m/Y');
              $_POST["order_id"]=$order_id;
              $_POST["order_status"]='placed';
              $_POST["payment_mode"]='online';
              $_POST["cus_id"]=$_SESSION['CLIENT']['id'];
              $_POST["shipping_status"]='waiting';
              $_POST["delivery_status"]='waiting';
              $_POST["rated"]='no';
               $_POST["deliver_status"]='waiting';

  $get_last_id = $db->insertDataArray(DTABLE_new_order_table,$_POST);
               $orderDetails = "";
               foreach ($_SESSION["cart_item"] as $item){
            $_POST['product_id']=$item["pid"];
            $_POST['product_name']=$item["name"];
            $_POST['product_qty']=$item["quantity"];
            $_POST['product_img']=$item["image"];
            $_POST['price']=$item["price"]*$item["quantity"];
            $_POST['product_amount']=$item["price"];
            
          //$db->insertDataArray(DTABLE_PRODUCT_TABLE,$_POST);
          $orderDetails .= "<tr>
      <td>".$item["name"]."</td>
      <td>".$item["description"]."</td>
      <td>".$item["price"]."</td> 
      <td>".$item["quantity"]."</td>
      <td>".$item["price"]*$item["quantity"]."</td>      
      </tr>";
        }
$html="<html><head>
              <style>
                  table {
                      font-family: arial, sans-serif;
                      border-collapse: collapse;
                      width: 100%;
                  }
          
                  th {
                      background-color: #ff5400;
                      color: white;
                  }
          
                  td,
                  th {
                      border: 1px solid #dddddd;
                      text-align: left;
                      padding: 15px;
                  }
                  .table1 td{
                      padding: 0;
                      text-align: unset;
                      border: none;
                  }
          
                  img {
                      width: 160px;
                      padding-left: 50px;
                  }
          
                  .logo {
                      margin: 0;
                      float: left;
                      / text-align: center; /
                      display: block;
                      width: 100%;
                      margin-bottom: 15px;
          
                      float: left;
                      width: auto;
                  }
                  .contain-area {
                    padding-top: 1px;
                    padding-left: 30px;
                    width: 500px;
                  }
          
                  .contain-area p {
                      margin: 2px;
                  }
          
                  .shipping-address {
                      width: auto;
                      float: right;
                  }
          
                  .shipping-address p {
                      margin: 0px;
                      margin-bottom: 6px;
                      font-size: 20px;
                      width: 380px;
                  }
          
                  .cus-details p {
                      margin: 6px;
                      font-size: 20px;
          
                  }
          
                  .cus-details {
                      float: left;
                      padding-left: 30px;
                  }
          
                  h2 {
                      color: #ff5400;
                  }
          
                  .total-box:after,
                  total-box:before {
                      content: '';
                      display: table;
          
                  }
          
                  .total-box:after {
                      clear: both;
                  }
          
                  .top-contain:after,
                  top-contain:before {
                      content: '';
                      display: table;
          
                  }
          
                  .top-contain:after {
                      clear: both;
                  }
          
                  .total-amount {
                      text-align: right;
                  }
          
                  .last-row {
                      font-weight: bold;
                      font-size: 18px;
                  }
          
                  .order-detals {
                    padding-top: 30px;
                  }
          
                  .shipping-address h3 {
                      margin: 0;
                      margin-bottom: 5px;
                  }
              </style>
          </head>
          
          <body class='cus-body'>
              <div class='top-contain'>
                  <div class='logo'>
                  <img src='http://ondemandsolutions.in/hisecure.png' />
                  </div>
                  <div class='contain-area'>
                      <h3 style='color:#ff5400;'>Hi-Secure Exhibition Service</h3>
                      <p>Ekta Bhawan C-104/105, Ganesh Nagar Panda Nagar Complex, </p>
                      <p>Behind Kalsi Tyre Delhi-110092.</p>
                  </div>
              </div>

              <div class='table1'>
                <table>
                    <tr>
                        <td>
                          <div class='cus-details'>
                            <h2>Customer Details: </h2>
                            <p>Name: <span>".$_POST["firstname"]."</span></p>
                            <p>Email: <span>".$_POST["email"]."</span></p>
                            <p>Contact No: <span>".$_POST["phone"]."</span></p>
                          </div>
                        </td>
                        <td>
                          <div class='shipping-address'>
                            <h2>Delivery Address: </h2>
                            <h3>".$_POST["firstname"]."</h3>
                            <p>".$_POST["cus_address"]."</p>
                            <p>Pin Code: ".$_POST["cus_pin"]."</p>
                          </div>
                        </td>
                    </tr>
                </table>
            </div>
          
              <div class='order-detals'>
                  <h2 style='text-align: center;'>Your Order Details</h2>
                  <h2 style='text-align: center; color:#000;'>Order ID: #".$order_id."</h2>
          
                  <table>
                      <tr>
                          <th>Product Name</th>
                          <th>Description</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Sub-total</th>
                      </tr>".$orderDetails."<tr class='last-row'>
                          <td colspan='4' class='total-amount'>Total Amount</td>
                          <td>Rs. ".$_POST["total_amount"]."</td>
                      </tr>
                  </table>
              </div>
          </body></html>";
          require_once('class.phpmailer.php');
          $mail = new PHPMailer();
          $mail->IsSMTP();                                  
          $mail->Host = "a2plcpnl0825.prod.iad2.secureserver.net";  
          $mail->SMTPAuth = true; 
          $mail->Username = "sendmail@ondemandsolutions.in"; 
          $mail->Password = "Email@Send@Mail"; 
          $mail->From = "sendmail@ondemandsolutions.in";
          $mail->FromName = "Hi-Secure Exhibition Service";  
          $mail->addaddress('wtm.kalyan@gmail.com');
          $mail->AddAddress($_POST["email"]);
          $mail->WordWrap = 5; 
          $mail->IsHTML(true);  
          $mail->Subject = "Order successful #".$order_id;
          $mail->Body    = $html;
          $mail->AltBody = "This is the body in plain text for non-HTML mail clients";
          //$mail->Send();

//header("location:success.php");

}
}
}?>
        
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
        <div class="container flat-checkout">
                <div class="row">
                    
                    <div class="col-md-7">
                        <div class="box-checkout">
                            <h3 class="title">Checkout</h3>
                            <div class="checkout-login">
                                Returning customer? <a href="login.php?log=checkout" title="">Click here to login</a>
                            </div>
                        <form action="<?php echo $action; ?>" method="post" name="payuForm" class="checkout">
                       
                                   
                          <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
                          <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
                          <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
                         
                          <input type="hidden" name="productinfo" value="product1">

                          <input type="hidden" name="surl" value="http://ondemandsolutions.in/success.php">
                        
                          <input type="hidden" name="furl" value="http://ondemandsolutions.in/failure.php">
                          <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
                                <div class="shipping-address-fields">
                                    <div class="fields-title">
                                        <h3>Shipping Address</h3>
                                        <span></span>
                                        <div class="clearfix"></div>
                                    </div><!-- /.fields-title -->
                                    <div class="fields-content">
                                        
                                        <div class="field-row">
                                            
                                           
                                                <label for="last-name-2">Full Name *</label>
                                                <input type="text" id="last-name-2" name="firstname" placeholder="Full Name" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>">
                                           
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="field-row">
                                            <label for="company-name-2">Email</label>
                                            <input type="email" id="email" name="email" placeholder="Email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>">
                                        </div>
                                        <div class="field-row">
                                            <label for="company-name-2">Mobile</label>
                                            <input type="text" id="phone" name="phone" placeholder="Mobile" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>">
                                        </div>
                                        
                                        <div class="field-row">
                                            <label for="address-3">Address *</label>
                                            
                                            <textarea id="address-3" name="cus_address" placeholder="Address" rows="70"  ></textarea>
                                            
                                        </div>
                                        
                                        <div class="field-row">
                                            
                                                <label for="post-code-2">Postcode / ZIP *</label>
                                                <input type="text" id="post-code-2" name="cus_pin" maxlength="6" placeholder="Postcode / ZIP" value="<?php echo (empty($posted['cus_pin'])) ? '' : $posted['cus_pin']; ?>">
                                           
                                            <div class="clearfix"></div>
                                        </div>
                                        
                                    </div><!-- /.fields-content -->
                                </div><!-- /.shipping-address-fields -->
                            <!-- </form> --><!-- /.checkout -->
                        </div><!-- /.box-checkout -->
                    </div><!-- /.col-md-7 -->
                    <div class="col-md-5">
                        <div class="cart-totals style2">
                            <h3>Your Order</h3>
                           <!--  <form action="#" method="get" accept-charset="utf-8"> -->
                                <table class="product">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                        if(isset($_SESSION["cart_item"])){
                            $item_total = 0;
                            $item_total_quan = 0;
                             $i=0;
            
    foreach ($_SESSION["cart_item"] as $item){
        $i++;
      
                        ?>
                                        <tr>
                                            <td><?php echo $item["name"]; ?></td>
                                            <td><?php
                        

                 $quantity_price=($item["price"]*$item["quantity"]);
                echo "Rs".$quantity_price; ?></td>
                                        </tr>
                                        <?php
                                $item_total += ($item["price"]*$item["quantity"]);
                                $item_total_quan += $item["quantity"];
                                }
                                
                      
                                   
                        $all_total=$item_total;

                                }
                                ?>
                                        
                                    </tbody>
                                </table><!-- /.product -->
                                <table>
                                    <tbody>
                                        <!-- <tr>
                                            <td>Total</td>
                                            <td class="subtotal">$1,999.00</td>
                                        </tr> -->
                                        <!-- <tr>
                                            <td>Shipping</td>
                                            <td class="btn-radio">
                                                <div class="radio-info">
                                                    <input type="radio" checked="" id="flat-rate" name="radio-flat-rate">
                                                    <label for="flat-rate">Flat Rate: <span>$3.00</span></label>
                                                </div>
                                                <div class="radio-info">
                                                    <input type="radio" id="free-shipping" name="radio-flat-rate">
                                                    <label for="free-shipping">Free Shipping</label>
                                                </div>
                                                <div class="btn-shipping">
                                                    <a href="#" title="">Calculate Shipping</a>
                                                </div>
                                            </td>
                                        </tr> -->
                                        <tr>
                                           <input type="hidden" name="amount" value="<?=$all_total;?>">
                                            <td>Total</td>
                                            <td class="price-total">Rs<?=$all_total;?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="btn-radio style2">
                                    <div class="radio-info">
                                        <input type="radio" id="flat-payment" checked="" name="pay_method" value="payumoney">
                                        <label for="flat-payment">Online Payments</label>
                                       
                                    </div>
                                    
                                    <div class="radio-info">
                                        <input type="radio" value="cod" id="cash-delivery" name="pay_method">
                                        <label for="cash-delivery">Cash on Delivery</label>
                                    </div>
                                    
                                </div><!-- /.btn-radio style2 -->
                                <div class="checkbox">
                                    <input type="checkbox" id="checked-order" name="checked1" required="">
                                    <label for="checked-order">I’ve read and accept the terms &amp; conditions *</label>
                                </div><!-- /.checkbox -->
                                <div class="btn-order">
                                    <!-- <button style="background: red" type="submit" class="order" title="">Place Order</button> -->

                                    <input type="submit" value="Submit" name="sub" />
                                </div><!-- /.btn-order -->
                            <!-- </form> -->
                        </div><!-- /.cart-totals style2 -->
                    </div><!-- /.col-md-5 -->
                </form>
                </div><!-- /.row -->
                 <!-- </form> -->
            </div>
     </div>
     
   
    <!-- INDEX STOP -->
    
      
    <!-- FOOTER START -->
<?php include("inc/footer.php")?>