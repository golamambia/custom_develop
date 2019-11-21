<?php
require('configure.php');
//$sql = "SELECT * FROM ".DTABLE_PRODUCT_TABLE." where product_id='' and ";
$pid=$_POST['product_id'];
$uid=$_POST['userid'];
 $sql = "SELECT * FROM order_product_details  t1
INNER JOIN new_order t2 ON t1.order_id=t2.order_id where t1.product_id='$pid' and t2.cus_id='$uid' ";
	 $count=$db->countRows($sql);
	if($count>0){
$get_last_id = $db->insertDataArray(DTABLE_REVIEW,$_POST);

$_SESSION["msg"] = "review_post";
echo"ok";
	}else{
		echo"not_buy";
	}


?>