<?php include("header.php");?>
  
<div class="container">

<br><br>
<div class="pdoduct-header">
                            
                            <?php                  
      if ($_GET["successful"]!=""){
        $orderid=base64_decode($_GET["successful"]);
        $data=mysql_fetch_assoc(mysql_query("select * from ".TABLE_POPDETAILS." where order_id='$orderid'"));
        if($data["transaction_id"]!=''){
    ?>
<h1>Thank you for your registration. </h1>
               <h1 style="font-size: 23px;">Your payment successfully done</h1>            

        <h1 style="font-size: 20px;">Your Order Id : <?=$orderid;?></h1>  
        <h2 style="font-size: 20px;">Your Transaction Id : <?=$data["transaction_id"];?></h2>        
    <?php
     }else{?>
      <h1 style="font-size: 20px;">Sorry something went wrong!</h1> 

      <?php 
     }
      }
    ?>
               
                        </div>
<br><br>
    	    		<?php if($data["transaction_id"]!=''){
    ?>
			<div class="buttons cart-btngroup">
        <div class="pull-left"><a class="btn btn160 btn-lg btn-default" href="<?=$data["link"];?>">Your event is now live at this link... click here </a></div>
       
      </div>
    <?php }else{?>

        <div class="buttons cart-btngroup">
        <div class="pull-left"><a class="btn btn160 btn-lg btn-default" href="index.php">Continue  </a></div>
       
      </div>

    <?php }?>
                        <br><br><br><br>
                    </div>







  <?php include("footer.php");?>