<?php session_start();?>

welcome to dashboard</br>
<img src="<?php echo $_SESSION['userdata']['picture']['url'];?>"/>
<p>Id :<?php echo $_SESSION['userdata']['id'];?></p>
<p>fname :<?php echo $_SESSION['userdata']['name'];?></p>

<p>Email :<?php echo $_SESSION['userdata']['email'];?></p>