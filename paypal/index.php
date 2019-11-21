<img src="camera.jpg" />
<h3>Camera <br> $1</h3>
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type='hidden' name='business' value='kalyan.received@paypal.com'>
<input type='hidden' name='item_name' value='Camera'>
<input type='hidden' name='item_number' value='CAM#N1'>
<input type='hidden' name='amount' value='1'>
<input type='hidden' name='no_shipping' value='1'>
<input type='hidden' name='currency_code' value='USD'>
<input type='hidden' name='notify_url' value='http://localhost/paypal/payment.php'>
<input type='hidden' name='cancel_return' value='http://localhost/paypal/cancel.php'>
<input type='hidden' name='return' value='http://localhost/paypal/thanks.php'>
<!-- COPY and PASTE Your Button Code -->
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="hosted_button_id" value="### COPY FROM BUTTON CODE ###">
<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
</form>

