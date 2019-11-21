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
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
 
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
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
 
         echo "<h3>Your order status is ". $status .".</h3>";
         echo "<h4>Your transaction id for this transaction is ".$txnid.". You may try making the payment by clicking the link below.</h4>";
          
 } 
?>
<!--Please enter your website homepagge URL -->
<p><a href=index.php> Try Again</a></p>
 </div>
      <?php  include"inc/footer.php";       
?>