<?php
  require_once('config.php');

   $token  = $_POST['stripeToken'];
   $email  = $_POST['stripeEmail'];
   $amount = $_POST['amount'];
  $customer = \Stripe\Customer::create(array(
      'email' => $email,
      'source'  => $token
  ));

   $charge = \Stripe\Charge::create(array(
      'customer' => $customer->id,
      'amount'   => 1500,
      'currency' => 'usd'
  ));
   //echo"<pre>";
//print_r($charge);
      echo $charge["amount"];

    $charge["balance_transaction"];
        $charge["status"];
  echo '<h1>Successfully charged $50.00!</h1>';
?>