<?php 
error_reporting(0);
session_start();
//session_destroy();
$_SESSION["msg"]=$_POST["msg"];

require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["action"])) {

    
switch($_POST["action"]) {
    case "add":
        if(!empty($_POST["quantity"])) {
            $productByCode = $db_handle->runQuery("SELECT * FROM admin_product WHERE code='" . $_POST["code"] . "'");
             $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["productname"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["productpprice"], 'pid'=>$productByCode[0]["productid"],'description'=>$productByCode[0]["productdescription"], 'image'=>$productByCode[0]["pimage"],));
//print_r($itemArray);
            if(!empty($_SESSION["cart_item"])) {
                if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                            if($productByCode[0]["code"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                    }
                } else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                }
            } else {
                $_SESSION["cart_item"] = $itemArray;
            }
        }
    break;
    case "update":
        if(!empty($_POST["quantity"])) {
            $productByCode = $db_handle->runQuery("SELECT * FROM admin_product WHERE code='" . $_POST["code"] . "'");
             $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["productname"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["productpprice"],'pid'=>$productByCode[0]["productid"],'description'=>$productByCode[0]["productdescription"], 'image'=>$productByCode[0]["pimage"],));
//print_r($itemArray);
            if(!empty($_SESSION["cart_item"])) {
                if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                            if($productByCode[0]["code"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"]= $_POST["quantity"];
                            }
                    }
                } else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                }
            } else {
                $_SESSION["cart_item"] = $itemArray;
            }
        }
    break;
    case "remove":
        if(!empty($_SESSION["cart_item"])) {
            foreach($_SESSION["cart_item"] as $k => $v) {
                    if($_POST["code"] == $k)
                        unset($_SESSION["cart_item"][$k]);              
                    if(empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
            }
        }
    break;
    
}
}


?>

<div class="btn-group btn-block" id="cart">
                  <button class="btn btn-viewcart dropdown-toggle" data-loading-text="Loading..." data-toggle="dropdown" type="button" aria-expanded="false"><span class="lg">My Cart</span><span id="cart-total"><i class="fa fa-shopping-basket"></i> (<i> 1</i> ) items</span></button>
                 





               

<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
    $item_total_quan = 0;
?>  



                  <ul class="dropdown-menu pull-right"><li>
                      <table class="table table-striped">
                                <tbody>
<?php      
 
    foreach ($_SESSION["cart_item"] as $item){
       
        ?>
        <form enctype="multipart/form-data" method="post" action="">

 
                                <tr>
                          <td class="text-center">            <a href="javascript:void(0)"><img style="width: 55px;height: 55px;" class="img-thumbnail" title="iPhone" alt="iPhone" src="images/thumb/<?php echo $item["image"]; ?>"></a>
                            </td>
                          <td class="text-left"><a href="#"><?php echo $item["name"]; ?></a>
                                        </td>
                          <td class="text-right">x <?php echo $item["quantity"]; ?></td>
                          <td class="text-right"><?php $quantity_price=($item["price"]*$item["quantity"]);
                echo "$".$quantity_price; ?></td>
                          <td class="text-center"><a onclick="get_headercart('remove','<?php echo $item["code"]; ?>','')"  class="btn btn-danger btn-xs" title="Remove"  type="button"><i class="fa fa-times"></i></a></td>
                        </tr>

<?php
        $item_total += ($item["price"]*$item["quantity"]);
         $item_total_quan += $item["quantity"];
          $item_ecotax2 += (2*$item["quantity"]);
        }
        ?>          </form>


                                      </tbody></table>
                    </li><li>
                      <div>
                      <input type="hidden" value="<?php echo $item_total_quan; ?>" id="count_quan">
                        <table class="table table-bordered">
                                    <tbody><tr>
                            <td class="text-right"><strong>Sub-Total</strong></td>
                            <td class="text-right"><?php echo "$".$item_total; ?></td>
                          </tr>
                                    <tr>
                            <td class="text-right"><strong>Eco Tax (-2.00)</strong></td>
                            <td class="text-right"><?php echo "$".$item_ecotax2; ?></td>
                          </tr>
                                    <tr>
                            <td class="text-right"><strong>VAT (20%)</strong></td>
                            <td class="text-right"><?php 
$total_vat2=round(($item_total*20)/100);

              echo "$".$total_vat2; ?></td>
                          </tr>
                                    <tr>
                            <td class="text-right"><strong>Total</strong></td>
                            <td class="text-right"><?php 
$all_total2=round($item_total+$total_vat2+$item_ecotax2);

              echo "$".$all_total2; ?></td>
                          </tr>
                                  </tbody></table>
                        <p class="text-right"><a href="cart.php"><strong><i class="fa fa-shopping-cart"></i> View Cart</strong></a>&nbsp;&nbsp;&nbsp;<a href="checkout.php"><strong><i class="fa fa-share"></i> Checkout</strong></a></p>
                      </div>
                    </li></ul>

                    <?php
                  }
                  ?>
 </div>