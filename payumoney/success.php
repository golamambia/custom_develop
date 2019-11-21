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
    
     <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>

</head>

<body >
<div class="boxed">
        <div class="overlay"></div>

<?php 
include('inc/header.php');


$status=$_POST["status"];
$firstname=$_POST["firstname"];
$email=$_POST["email"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];

$salt="yIEkykqEH3";

If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        
                  }
  else {    

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

         }
     $hash = hash("sha512", $retHashSeq);
     
       if ($hash != $posted_hash) {
         echo "Invalid Transaction. Please try again";
       }
     else {
            $order_id='ORD'.uniqid();
            $_POST["cus_name"]=$firstname;
            $_POST["cus_email"]=$email;
            $_POST["cus_mobile"]=$_POST["phone"];
             $_POST["cus_address"]=$_SESSION['post_data']['cus_address'];
            $_POST["cus_pin"]=$_SESSION['post_data']['cus_pin'];
              $_POST["payment_status"]=$status;
              $_POST["total_amount"]=$amount;
              $_POST["payment_tnx"]=$txnid;
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
            
          $db->insertDataArray(DTABLE_PRODUCT_TABLE,$_POST);
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
                            <p>Name: <span>".$firstname."</span></p>
                            <p>Email: <span>".$email."</span></p>
                            <p>Contact No: <span>".$_POST["phone"]."</span></p>
                          </div>
                        </td>
                        <td>
                          <div class='shipping-address'>
                            <h2>Delivery Address: </h2>
                            <h3>".$cus_name."</h3>
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
          $mail->AddAddress($email);
          $mail->WordWrap = 5; 
          $mail->IsHTML(true);  
          $mail->Subject = "Order successful #".$order_id;
          $mail->Body    = $html;
          $mail->AltBody = "This is the body in plain text for non-HTML mail clients";
          $mail->Send();






        unset($_SESSION['post_data']);
        
          echo "<h3>Thank You. Your order status is ". $status .".</h3>";
          echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
          echo "<h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";
           
       }  
       ?>
       </div>
      <?php  include"inc/footer.php";       
?>