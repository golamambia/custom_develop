<style>
    .modal {
    
    background-color: rgba(0, 0, 0, 0) !important;
    
}
</style>
<main class="main-container" role="main">
    <div class="header-banner jumbotron text-center">
        <div class="centertxt ssheading">
             <h1>World's Leading Assignment Library</h1>
                <p>Continued assistance through writing and revision till final submission by the professional and experienced writers.</p>
                <form action="<?php echo base_url()?>assignment_page" method="get">
                    <span class="sol_serach">
                        <input type="text" name="searchtxt" placeholder="Search Your Question here" required> 
                        <button type="submit" class="sserchbtn"><i class="fa fa-search"></i></button>
                    </span>
                </form>
                <div class="row ssicons">
                    <ul>
                        <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <p>
                                <span><i class="fa fa-book"></i></span>
                                <span class="content_name"> <?php echo $total_subject1; ?> subjects</span>
                            </p>
                        </li>
                        <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <p>
                                <span><i class="fa fa-comments"></i></span>
                                <span class="content_name"><?php echo $solved_question; ?> <br>solved Questions</span>
                            </p>
                        </li>
                        <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <p>
                                <span><i class="fa fa-pencil-square-o"></i></span>
                                <span class="content_name"><?php echo $solved_question_day; ?> Solved Questions<br> Added Everyday</span>
                            </p>
                        </li>
                        <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <p>
                                <span><i class="fa fa-cloud-download"></i></span>
                                <span class="content_name">Download Solution<br> in Seconds </span>
                            </p>
                        </li>
                    </ul>
                </div>
        </div>
    </div>

<div class="container-fluid">
    <div class="container">
        <div class="assignment_page">
            <div class="row">
                <div class="col-sm-1 col-xs-12 hideonmob"> </div>
                <div class="col-sm-1 col-xs-4 ssiconbox">
                    <a href="<?php echo base_url()?>assignment_page"> 
                        <div class="ssicon">
                            <img class="img-responsive" src="https://courseworksolutions.com//assets/iconimg/001.png">
                        </div>
                         <div class="ssicontext">All subject </div></a>
                </div>
                <?php foreach($assiquestion as $aq ){
					
					//var_dump($aq);
					
					?>
               <div class="col-sm-1 col-xs-4 ssiconbox">
                    <a href="<?php echo base_url()?>assignment_page?sub=<?php echo $aq['id'];?>"> 
                        <div class="ssicon">
                            <img class="img-responsive" src="<?php echo base_url();?>/admin/assets/images/question/<?php echo $aq['image'];?>">
                           
                        </div>
                         <div class="ssicontext"><?php echo $aq['name'];?></div></a>
                </div>
				
				<?php } ?>
                <!--<div class="col-sm-1 col-xs-4 ssiconbox">-->
                <!--    <a data-toggle="modal" data-target="#sspopup"> -->
                <!--        <div class="ssicon">-->
                <!--            <img class="img-responsive" src="https://courseworksolutions.com//assets/iconimg/010.png">-->
                <!--        </div>-->
                <!--         <div class="ssicontext">See More </div></a>-->
                <!--</div>-->
                <div class="col-sm-1 col-xs-12 hideonmob"> </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
<div class="row">
    <div class="right_solution col-lg-9 col-md-8 col-sm-8 col-xs-12">
        <h3><i class="fa fa-question-circle"></i> <?php echo $assignment['question_title'];?> </h3>
       <div class="solution_content">
            <div class="solution_hf" style="">
                <p><b>Question Preview:</b><br> </p><?php echo substr($assignment['short_description'],0,200);?>
                <span class="solution_more small_font rightm">View complete question »</span>
            </div>
            <div class="solution_content_detail" style="display: none;">
                <?php echo $assignment['solution'];?>
                        <!--
                                            <h4>Attachments:</h4>
                                            <a href=""><span><img src="img/pdf.jpg"></span> 2016 Assignment2.pdf</a>
            -->
                    <span class="solution_less small_font rightm">View less »</span>
            </div>
            <div class="sol_bottom_part padlefts0">
                <h3>Solution preview</h3>
                    <div class="solution_see_part">
                        <div class="solution_see_inner">
                            <?php echo $assignment['question_preview'];?>
                            <img src="https://courseworksolutions.com//assets/iconimg/new_content1.png">
                        </div>
                    </div>
                    <div class="sol_bottom_img">
                        <p style="text-align:center;">
                               <!--<a href="" data-toggle="modal" data-target="#sspopupcart1" class="adcrtpop popbtn">-->
                         <a href="javascript:void(0)" data-productname="<?php echo $assignment['question_title'];?>" data-productid="<?php echo $assignment['sr_no'];?>" data-price="<?php echo $assignment['final_price'];?>" data-subject="<?php echo $assignment['name'];?>" class="adcrtpop popbtn add_cart">
                            <span class="pay_now_btn add_cart1"  >Get solution</span>
                           </a> 
                        </p>
                    </div>
                </div>
        </div>

    </div>
    <div class="left_solution col-lg-3 col-md-3 col-sm-4 col-xs-12">
        <div class="buy_now">
            <p> $ <?php echo $assignment['final_price'];?></p>
                <p class="org_price">Orginal Price : $ <?php echo $assignment['price'];?></p>
                <!--<p class="pay_btn_p"><button class="pay_now_btn">pay now</button></p>-->
        </div>
    </div>
    <div class="left_solution col-lg-3 col-md-3 col-sm-4 col-xs-12">
        <div class="left_inner_solution" id="myTab">
            <p>most recent views</p>
    <ul class="ulwitharrow">
        <?php foreach($assipage_recentview as $ap ){?>
        <li>
            <a href="<?php echo base_url()?>Assignment_page/singleassignment/<?php echo $ap['sr_no'];?>">
           <?php echo $ap['question_title'];?>
            </a>
        </li>
       <?php }?>
    </ul>
        </div>
        <div class="left_inner_solution" id="myTab">
            <p>most Search Question</p>
                <ul>
                        <?php foreach($assipage_recentsearch as $ap ){?>
        <li>
            <a href="<?php echo base_url()?>Assignment_page/singleassignment/<?php echo $ap['sr_no'];?>">
           <?php echo $ap['question_title'];?>
            </a>
        </li>
       <?php }?>
                    </ul>
        </div>
    </div>      
</div>
</div>
<div class="container">

<!-- Modal -->
<div class="modal fade ssmodel" id="sspopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
     <div class="modal-body scrollmob">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa fa-times"></i></span>
        </button>
      <div class="row">
        <h2 class="pophead">Choose <span class="underline">your</span> topic</h2>
                <div class="col-sm-2 col-xs-6  ssiconbox">
                    <a href="#"> 
                        <div class="ssicon">
                            <img class="img-responsive" src="https://courseworksolutions.com//assets/iconimg/001.png">
                        </div>
                         <div class="ssicontext">All subject </div></a>
                </div>
                <div class="col-sm-2 col-xs-6 ssiconbox">
                    <a href="#"> 
                        <div class="ssicon">
                            <img class="img-responsive" src="https://courseworksolutions.com//assets/iconimg/003.png">
                        </div>
                         <div class="ssicontext">Accounting </div></a>
                </div>
                <div class="col-sm-2 col-xs-6 ssiconbox">
                    <a href="#"> 
                        <div class="ssicon">
                            <img class="img-responsive" src="https://courseworksolutions.com//assets/iconimg/005.png">
                        </div>
                         <div class="ssicontext">Finance </div></a>
                </div>
                <div class="col-sm-2 col-xs-6 ssiconbox">
                    <a href="#"> 
                        <div class="ssicon">
                            <img class="img-responsive" src="https://courseworksolutions.com//assets/iconimg/007.png">
                        </div>
                         <div class="ssicontext">Engineering </div></a>
                </div>
                <div class="col-sm-2 col-xs-6 ssiconbox">
                    <a href="#"> 
                        <div class="ssicon">
                            <img class="img-responsive" src="https://courseworksolutions.com//assets/iconimg/009.png">
                        </div>
                         <div class="ssicontext">Science </div></a>
                </div>
                <div class="col-sm-2 col-xs-6 ssiconbox">
                    <a href="#"> 
                        <div class="ssicon">
                            <img class="img-responsive" src="https://courseworksolutions.com//assets/iconimg/004.png">
                        </div>
                         <div class="ssicontext">Economics </div></a>
                </div>
                <div class="col-sm-2 col-xs-6 ssiconbox">
                    <a href="#"> 
                        <div class="ssicon">
                            <img class="img-responsive" src="https://courseworksolutions.com//assets/iconimg/003.png">
                        </div>
                         <div class="ssicontext">Management </div></a>
                </div>
                <div class="col-sm-2 col-xs-6 ssiconbox">
                    <a href="#"> 
                        <div class="ssicon">
                            <img class="img-responsive" src="https://courseworksolutions.com//assets/iconimg/001.png">
                        </div>
                         <div class="ssicontext">Writing </div></a>
                </div>
                <div class="col-sm-2 col-xs-6 ssiconbox">
                    <a href="#"> 
                        <div class="ssicon">
                            <img class="img-responsive" src="https://courseworksolutions.com//assets/iconimg/008.png">
                        </div>
                         <div class="ssicontext">Computer Science </div></a>
                </div>
                <div class="col-sm-2 col-xs-6 ssiconbox">
                    <a data-toggle="modal" data-target="#sspopup"> 
                        <div class="ssicon">
                            <img class="img-responsive" src="https://courseworksolutions.com//assets/iconimg/010.png">
                        </div>
                         <div class="ssicontext">See More </div></a>
                </div>
            </div>
        </div>
      
    </div>
  </div>
</div>
</div>

<!--Model Popup to cart -->
<div class="container">

<!-- Modal -->
<div class="modal fade ssmodel1" id="sspopupcart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
     <div class="modal-body removepadtop">
        <div class="row">
            <div class="cart_popup">
                <div class="cart_popup_upper">
                    <p>
                        <i class="fa  fa-cart-arrow-down"></i>
                        <!--<span class="cart_counter">1</span>-->
                        <span class="crttext"> shopping Cart </span>
                        <span class="cross_popup" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></span>
                    </p>
                </div>
                <div class="cart_popup_inner">
                 
                    <p id="cartexit" style="color:red; display:none"><i class="fa fa-close"></i> <span class="failedm">Your Shopping Cart is empty</span></p>
                    <!--<p id="cartme"><i class="fa fa-check"></i> <span class="successm">Solution Added Successfully</span></p>-->
                    <div id="result_id">
                    <div class="scoll_table">
                       
                                     
                        <table id="tbl1">
                            <thead>
                                <tr>
                                    <th>subject</th>
                                    
                                    <!--<th>solution code</th>-->
                                    <th>Question</th>
                                    <th>price</th>
                                    <th>Qty</th>
                                     <th>Action</th>
                                </tr>
                            </thead>
                            <?php 
                            if(!empty($this->cart->contents())){
                           foreach($this->cart->contents() as $items)
  {?>
   
   <tr id="tr'.$items["id"].'"> 
    <td><?=$items["name"];?></td>
    <td><?=$items["subject"];?></td>
    <td><?=$items["price"];?></td>
    <td><?=$items["qty"];?></td>
    <td><button type="button" name="remove" class="btn btn-danger btn-xs remove_inventory" id="'.$items["rowid"].'">Remove</button></td>
   </tr>
   
  <?php }}else{?>
      <tr> 
    <td colspan="5" style="
    text-align: center;
">No Data</td>
   </tr>
      
 <?php  }
  ?>
                 
                            <!--<tbody><tr id="5735"><td><?php echo $assignment['name'];?></td>-->
                            <!--<td>LW1909104B605F19</td-->
                            <!--<td><?php echo $assignment['question_title'];?></td>-->
                            <!--<td class="total"><?php echo $assignment['price'];?></td>-->
                            <!--<td><span id="spndel"><i class="fa fa-close del"></i></span></td>-->
                            <!--</tr>-->
                            </tbody>
                        </table>
                        </div>
                    
                    <h3 style="padding-right: 17px;">Amount Payable : $ <span id="netAmount"><?php echo $this->cart->total();?></span></h3>
                    </div>
                    <div class="cart_inner_btn">
                         <span><a id="cont" style="cursor:pointer;">continue shopping</a></span><span id="kol">
                         <?php
                         if($this->session->userdata('username')==''){
                         ?>    
                             <a id="process" href="<?=base_url('user/login')?>" style="cursor:pointer;">proceed to checkout</a>
                         <?php }else{ ?>
               
                <?php 
                $t_chk=$this->cart->total();
                if($t_chk!=''){?>
                         <a id="process" href="<?php echo base_url().'Assignment_page/buy/'.$this->session->userdata('id'); ?>" style="cursor:pointer;">proceed to checkout</a>
                         <?php }} ?>
                         </span>
                    </div>

                </div>
            </div>
                    
        </div>
    </div>
      
    </div>
  </div>
</div>
</div>

</main>
<script type="text/javascript">
    $('.solution_more').click(function () { $('.solution_hf').hide(); $('.solution_content_detail').show(); }); $('.solution_less').click(function () { $('.solution_hf').show(); $('.solution_content_detail').hide(); }); 
</script>

<script>
$(document).ready(function(){
 
 $('.add_cart').click(function(){
  var product_id = $(this).data("productid");
  var product_name = $(this).data("productname");
  var product_price = $(this).data("price");
  var subject = $(this).data("subject");
 //alert(product_name);
   $.ajax({
    url:"<?php echo base_url(); ?>Assignment_page/add",
    method:"POST",
    data:{product_id:product_id, product_name:product_name, product_price:product_price, subject:subject},
    success:function(data)
    {
        //alert(data);
        //console.log(data);
     //alert("Added into Cart");
     $('#result_id').html(data);
    // $('#' + product_id).val('');
    $('#sspopupcart').modal('show'); 
    }
   });
  
 });

 //$('#cart_details').load("<?php echo base_url(); ?>shopping_cart/load");

 $(document).on('click', '.remove_inventory', function(){
  var row_id = $(this).attr("id");
  //alert(row_id);
  if(confirm("Are you sure you want to remove this?"))
  {
      $('#sspopupcart').modal('hide');
   $.ajax({
    url:"<?php echo base_url(); ?>Assignment_page/remove",
    method:"POST",
    data:{row_id:row_id},
    success:function(data)
    {
        //alert(data);
     //alert("Product removed from Cart");
     //$('#tbl1').html(data);
     $('#result_id').html(data);
        $('#sspopupcart').modal('show'); 
    }
   });
  }
  else
  {
   return false;
  }
 });

 $(document).on('click', '#clear_cart', function(){
  if(confirm("Are you sure you want to clear cart?"))
  {
   $.ajax({
    url:"<?php echo base_url(); ?>Assignment_page/clear",
    success:function(data)
    {
     alert("Your cart has been clear...");
     $('#tbl1').html(data);
    }
   });
  }
  else
  {
   return false;
  }
 });

});
</script>


