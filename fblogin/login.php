<?php 
require_once 'config.php';
$redirectURL='http://localhost/fblogin/fb-callback.php';
//$redirectURL='https://winnersteelbd.com/fblogin/fb-callback.php';
$permissions=['email'];
$loginURL=$helper->getloginUrl($redirectURL,$permissions);
 
?>

<button onclick="window.location='<?php echo $loginURL; ?>'"> Fblogin</button>