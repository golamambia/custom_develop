<?php require_once('config.php'); ?>

<form action="charge.php" method="post">
	<input type="hidden" name="amt" type="text" value="1500">
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
  		data-key="pk_test_g6do5S237ekq10r65BnxO6S0"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-description="Access for a year"
          data-amount="1500"
          data-locale="auto"></script>
</form