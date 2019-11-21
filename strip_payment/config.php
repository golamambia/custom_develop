<?php
require_once('vendor/autoload.php');
// $stripe = array(
//   "secret_key"      => "sk_test_4eC39HqLyjWDarjtT1zdp7dc",
//   "publishable_key" => "pk_test_TYooMQauvdEDq54NiTphI7jx"
// );

$stripe = array(
  "secret_key"      => "sk_test_mRtDnWuiOp2IRQSVvjwUDWIh",
  "publishable_key" => "pk_test_v4hc3rYlNlV0dxo72jWC53MF"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>