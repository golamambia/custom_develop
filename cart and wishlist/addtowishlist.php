<?php 
 session_start();

if(isset($_POST['addWish']))
{
     require('configure.php');
     
  if(!$_SESSION['CLIENT']){
    
  //header("location:sign-in.php");
  $_SESSION['gourl']=$_POST['gourl'];
  
  echo "no";
    
  }else{
   
   $productId = $_POST['pid'];
    $bId = $_SESSION['CLIENT']['id'];
$_POST[user_id]=$_SESSION['CLIENT']['id'];
$_POST[product_id]=$productId;
     $sql_chk = mysql_num_rows(mysql_query("SELECT * FROM ".DTABLE_WISHLIST." where user_id='".$bId."' and product_id='".$productId."' "));

if($sql_chk>0){

    echo "exist";
  exit();
}else{
    $get_last_id = $db->insertDataArray(DTABLE_WISHLIST,$_POST);
    
    $sql = "SELECT * FROM ".DTABLE_product." where productid='".$productId."'";
    $res = $db->selectData($sql);
    $row_rec = $db->getRow($res);


    echo $row_rec['name'];
  exit();
    
}
}
}
if(isset($_POST['removefromwish']))
{
     require('configure.php');
    $Id = $_POST['id'];
    $bId = $_POST['bid'];
    
    $sql_chk = mysql_query("delete  FROM ".DTABLE_WISHLIST." where user_id='".$bId."' and id='".$Id."' ");
    $_SESSION['msg']="wlist";
    echo "1";
    
}



?>