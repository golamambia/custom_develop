<?php
include"configure.php";
 $uid=$_POST[val];
$sql ="SELECT * FROM ".DTABLE_USER." WHERE email='$uid' ";
echo $row_count=mysql_num_rows(mysql_query($sql));

?>