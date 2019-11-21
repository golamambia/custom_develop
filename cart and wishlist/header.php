<?php
include("configure.php");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">

  

function get_headercart(action,code,quantity,msg){

 //alert(action);

 $.ajax({

            url: 'ajax_header_cart.php',

            type: 'post',

            data: {action:action,code:code,quantity:quantity,msg:msg},

            success:function(response){

                //alert(response);



                    $("#cart").html(response);



              location.reload();



            }

        });



}

function get_headercart1(action,code,id){

 //alert(action);

 $.ajax({

            url: 'ajax_header_cart.php',

            type: 'post',

            data: {action:action,code:code},

            success:function(response){

                //alert(response);



                    //$("#"+id).hide();



              location.reload();



            }

        });



}









</script>



<section id="header" class="header">

       	  <div class="header_main clearfix">

            	<div class="container">

                	<div class="logo">

                    <a href="index.php"><img src="img/logo.png" alt=""></a>

                  </div>

                  <div class="header_main_right">

                    <ul class="flat-unstyled">

                       <li class="phone"><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> all Us: 458 267 239</a></li>

                        <li class="account">

                            <a href="javascript:void(0);" title=""><span><i class="fa fa-user-o" aria-hidden="true"></i></span> My Account<i class="fa fa-angle-down" aria-hidden="true"></i></a>

                            <ul class="unstyled">


									<?php 

                                    

                                    if(isset($_SESSION["CLIENT"])){?>
                                        <li>

                                    <a href="orderlist.php" title="">My Order</a>

                                </li>
                                <li>

                                    <a href="wishlist.php" title="">My Wishlist</a>

                                </li>

                                <li>

                                    <a href="dashboard.php" title="">My Account</a>

                                </li>
									<li>

									<a href="logout.php" title="">Logout</a>
                                </li>
									<?php } else{?>
                                        <li>
									<a href="login.php" title="">Login </a>

									

                                </li>
                                <?php }?>
                                

                            </ul>

                        </li>

                    </ul>

                    <div class="top-search">

                        <form action="search.php" method="get" class="form-search" accept-charset="utf-8">

                           <div class="box-search">

                                <input type="text" name="search" placeholder="Search what you looking for ?">

                                <span class="btn-search">

                                    <button type="submit" class="waves-effect"><img src="img/search.png" alt=""></button>

                                </span>

                            </div>

                        </form>

                    </div>

                  </div>

                </div>

            </div>

            <div class="header-bottom clearfix">

                <div class="container">

                   

                            <div id="mega-menu">

                                <div class="btn-mega"><span></span>ALL CATEGORIES</div>

                                <ul class="menu">



                                <?php 

                                $sql_cat = "SELECT * FROM ".DTABLE_category." ORDER BY cid DESC";

                                $res_cat = $db->selectData($sql_cat);

                                while($row_rec_cat = $db->getRow($res_cat)){

                                ?>

                                    <li>

                                        <a href="products.php?category=<?php echo $row_rec_cat['cid'];?>" title="">

                                            <span class="menu-img">

                                                <img src="img/right-arrow-circular-button.png" alt="">

                                            </span>

                                            <span class="menu-title">

                                                <?php echo $row_rec_cat['categoryname']; ?>

                                            </span>

                                        </a>

                                    </li>

                                <?php } ?>

                                </ul>

                            </div>

                            <input type="hidden" value="<?php echo $item_total_quan; ?>" id="count_quan">

                        <div class="header-bottom-right">

                         <nav class="menubox">

                            <a class="btn-topmenu d-lg-none" href="javascript:void(0)"><i class="icofont-navigation-menu"></i></a>

                            <div class="top-menu"> 

                            <a class="btn-topmenu-close d-lg-none" href="javascript:void(0)"><i class="icofont-close-line"></i></a>

                            <ul>

                                <li class="current-menu-item"><a href="index.php">home</a></li>

                                <li><a href="products.php">products</a></li>

                                <li><a href="#">about us</a></li>

                                <li><a href="event-listing.php">events </a></li>

                                <li><a href="contact.php">contact us </a></li>

                                <li><a href="#">todays deals</a></li>

                            </ul>

                        </nav>

                        

                        <div class="box-cart">

                            <?php

                    if(isset($_SESSION["cart_item"])){

                        $item_total = 0;

                        $item_total_quan = 0;

                    ?>

                                <div class="inner-box">

                                    <a href="javascript:void(0);" title="">

                                        <div class="icon-cart">

                                            <img src="img/cart.png" alt="">

                                            <span id="cartCount"><i id="amb"> 0</i></span>

                                        </div>

                                    </a>

                                    <div class="dropdown-box">

                                        <ul>

                                            <?php  

                                $i=0;

                                

                        foreach ($_SESSION["cart_item"] as $item){

                            $i++;

                          

                            ?>



                                            <li id="rem_id<?=$i;?>">

                                                <div class="img-product">

                                                    <img src="<?php echo $item["image"]; ?>" alt="">

                                                </div>

                                                <div class="info-product">

                                                    <div class="name">

                                                        <?php echo $item["name"]; ?>

                                                    </div>

                                                    <div class="price">

                                                        <span>1 x</span>

                                                        <span><?php echo "Rs".$item["price"]; ?></span>

                                                    </div>

                                                </div>

                                                <div class="clearfix"></div>

                                                <span class="delete" onclick="get_headercart1('remove','<?php echo $item["code"]; ?>','rem_id<?=$i;?>')">x</span>

                                            </li>

                                       <?php

                                $item_total += ($item["price"]*$item["quantity"]);

                                $item_total_quan += $item["quantity"];

                                }

                                           

                            $all_total=round($item_total);





                                ?>

                                            

                                        </ul>

                                        <input type="hidden" value="<?php echo $item_total_quan; ?>" id="count_quan">

                                        <div class="total">

                                            <span>Subtotal:</span>

                                            <span class="price"><?php echo "Rs".$item_total; ?></span>

                                        </div>

                                        <div class="btn-cart">

                                            <a href="shop-cart.php" class="view-cart" title="">View Cart</a>

                                            <a href="shop-checkout.php" class="check-out" title="">Checkout</a>

                                        </div>

                                    </div>

                                </div>

                                <?php }?>





                            </div>

                            </div>

              </div>   

            </div>

        </section>

        <script type="text/javascript">

            

            $(document).ready(function(){

   //alert(1);

        var quanval='<?=$item_total_quan;?>';

        //$("#count_quan").val();

       //alert(quanval);

         $("#amb").html(quanval);

    

        });



        </script>