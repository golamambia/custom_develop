<?php
error_reporting(0);
 include("includes/header.php");
include("config.php");
$customToken =rand ( 1000000000000 , 9999999999999 );
$_SESSION["customToken"] =$customToken;
?>
      <!-- =-=-=-=-=-=-= Transparent Breadcrumb =-=-=-=-=-=-= -->
<script type="text/javascript">
   
 function get_val(val) {
alert(val);

 }

</script>

<?php
$method=$_POST['pay_method'];
$rand_order = rand ( 1000000000000 , 9999999999999 );


$msg ="";

if(isset($_POST['create_student']) && $_POST['create_student']=='create_student')

{

//$sql = "SELECT * FROM ".DTABLE_JOIN_REGISTRATION." WHERE email='".$_POST['email']."'";

//$get_count = $db->countRows($sql);

if($method=='paypal'){
$_SESSION[rand_order]=$rand_order;
?>
<br><br><br><br>
<p style="padding-left: 46%; font-weight: bold; padding-top: 8%;">Please wait...</p>

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr"  method="post" name="form_change2" id="form_change2" accept-charset="utf-8">
<input type="hidden" name="business" value="kalyan.received@paypal.com">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="<?=$_SESSION[rand_order];?>">
        <input type="hidden" name="item_number" value="5">
        <input type="hidden" name="amount" id="amount" value="3">
        <input type="hidden" name="currency_code" value="USD">
        
        <!-- Specify URLs -->
        <input type='hidden' name='cancel_return' value='http://www.webtechnomind.com/work/theprivatecleaner/thankyou.php'>
        <input type='hidden' name='return' value='http://www.webtechnomind.com/work/theprivatecleaner/thankyou.php'>
</form>
<script type="text/javascript">
   document.getElementById('form_change2').submit();


</script>




<?php

}
}

?>


      <div class="page-header-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="header-page">
                     <h1>POST AD CLEANER </h1>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Small Breadcrumb -->
      <div class="small-breadcrumb">
         <div class="container">
            <div class=" breadcrumb-link">
               <ul>
                  <li><a href="index.php">Home</a></li>
                  <li><a class="active" href="postcleaner.php">Post Ad Cleaner</a></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- Small Breadcrumb -->
      <!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding  gray ">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <div class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
                     <!-- end post-padding -->
                     <div class="post-ad-form postdetails">
                        <div class="heading-panel">
                           <h3 class="main-title text-left">
                              Post Your Cleaning Services  <?php if(isset($msg)){?> <span style="text-align:center; color:#F00; "><?php  echo $msg;  ?></span> <?php } ?>
                           </h3>
                        </div>
                        <p class="lead">Posting an ad on <a href="#">Private Cleaner Services</a> is paid! However, all ads must follow our rules:</p>
                        <form  class="submit-form" method="post" id="cleaner_from" enctype="multipart/form-data">
                           <input type="hidden" name="create_student" value="create_student" />


                           <!-- Title  -->
                           <!-- <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                 <label class="control-label">Post Cleaner Company Name <small></small></label>
                                 <input class="form-control" placeholder="enter company name" name="company_name" id="company_name" type="text" required>
                              </div>
                           </div> -->
                           <div class="row">
                              <!-- Category  -->
                              
                              <!-- Price  -->
                               <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                 <label class="control-label">Title<small></small></label>
                                 <input class="form-control" name="title" id="title" placeholder="Enter  Post title" type="text" required>
                              </div>
                            </div>
                             <div class="row">
                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                 <label class="control-label">Your Name</label>
                                 <input class="form-control" placeholder="eg John Doe" name="name" id="c_name" type="text" required>
                              </div>
                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                 <label class="control-label">Email<!-- <small>where you receive your emails</small> --></label>
                                 <input placeholder="Your Email" class="form-control" type="email" name="email" id="c_email" required>

                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                 <label class="control-label">Password</label>
                                 <input placeholder="Your Password" class="form-control" type="password" name="password" id="password" required>
                              </div>
                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                 <label class="control-label">Confirm Password <small id="confirmMessage">&nbsp;</small></label>
                                 <input placeholder="Your Password" class="form-control" onkeyup="checkPass();return false; " type="password" name="confirm_password" id="password2" required>

                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                 <label class="control-label">Country 
                                 <!-- <small>Select your Country</small> -->
                                 </label>
                                 <select name="country" id="country" disabled>
                                
                      <option value="United Kingdom" title="United Kingdom">United Kingdom</option>
                                
                                </select>
                              </div>
                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                 <label class="control-label">Town<small> you wants to enter</small></label>
                                 <input class="form-control" name="city" id="city" placeholder="London" type="text" required>
                              </div>
                           </div>

<div class="row">
                              
                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                 <label class="control-label">Address<small>your permanent address</small></label>
                                 <input class="form-control" placeholder="9 Brittain Drive, Grantham, NG31 9JY, UK" type="text" name="address" id="address" required>
                              </div>

                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                 <label class="control-label">Postcode<small></small></label>
                                 <input class="form-control" name="pincode" id="pincode" placeholder="Enter  Post title" type="text" required>
                              </div>

                           </div>


                           <div class="row">
                              

<div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                 <label class="control-label">Mobile Number<small>number for conformation</small></label>
                                 <input placeholder="Enter Your Contact Number" class="form-control" type="text" id="mobile" name="phone_number" required>
                              </div>

                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                 <label class="control-label">Location<small></small></label>
                                 <input class="form-control" name="location" id="location" placeholder="Enter Your Location" type="Location" required>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12  col-sm-12">
                                 <label class="control-label">Cleaning Description <small>Enter long description about our cleaning Services</small></label>
                                 <textarea name="description" id="editor1" rows="12" class="form-control" placeholder="" required></textarea>
                              </div>
                           </div>
                           <!-- end row -->
                           <!-- Image Upload  -->
                           <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                 <label class="control-label"><small></small></label>
                                 <div id="dropzone" class="dropzone"></div>
                              </div>
                           </div>
                           <!-- end row -->
                           <!-- Ad Description  -->
                          
                           <!-- end row -->
                           <!-- Ad Tags  -->
                           <!-- end row -->
                           
                           <!-- Ad Condition  -->
                           
                           <!-- end row -->
                           <div class="row">
                             <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                              <label class="label">Choose Your Category</label><br>

<?php 
                            $i=0;
                           $sql = "SELECT * FROM ".DTABLE_CATEGORY." order by id";
                           $res = $db->selectData($sql);

                           while($row_rec = $db->getRow($res)){
                            $i++;
                          ?>

                                 <label class="control-label" style="width: 33%">
                                 <input  placeholder="eg John Doe" id="category1" <?php if($i==1){?> required <?php }?> name="category1" value="<?=$row_rec[id];?>" type="checkbox"><?=$row_rec[cat_name];?></label>
 <?php }?>


                              </div>
                            </div>
                          
                           

                           

                           <!-- end row -->
                           

<!-- <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                 <label class="control-label">Upload photo<small>for cleaner</small></label>
                                 <input placeholder="Enter Your Contact Number" class="form-control" type="file" id="image_browse" name="image_browse" required>
                              </div>
                             
                           </div> -->



                           <!-- Select Package  -->
                           <div class="select-package">
                              	<div class="no-padding col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                 <h3 class="margin-bottom-20">Select Package</h3>
                                 <div class="pricing-list">
                                    <div class="row">
                                       <div class="col-md-9 col-sm-9 col-xs-12">
                                          <h3>Package 1   <small> non featured</small></h3>
                                          <p>6 months  all categories</p>
                                       </div>
                                       <!-- end col -->
                                       <div class="col-md-3 col-sm-3 col-xs-12">
                                          <div class="pricing-list-price text-center">
                                             <h4>£10</h4>
                                             <input type="radio" id="package1" name="package" value="Package 1" onclick="get_price(1000)" checked>
                                          </div>
                                       </div>
                                       <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                 </div>
                                 <div class="pricing-list">
                                    <div class="row">
                                       <div class="col-md-9 col-sm-9 col-xs-12">
                                          <h3>Package 2  <small> non featured</small></h3>
                                          <p>1 year  all categories</p>
                                       </div>
                                       <!-- end col -->
                                       <div class="col-md-3 col-sm-3 col-xs-12">
                                          <div class="pricing-list-price text-center">
                                             <h4>£15</h4>
                                             <input type="radio" id="package2" name="package" value="Package 2"  onclick="get_price(1500)">
                                          </div>
                                       </div>
                                       <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                 </div>
                                 <div class="pricing-list">
                                    <div class="row">
                                       <div class="col-md-9 col-sm-9 col-xs-12">
                                          <h3>Package 3   <small>featured</small></h3>
                                          <p>2 year  all categories</p>
                                       </div>
                                       <!-- end col -->
                                       <div class="col-md-3 col-sm-3 col-xs-12">
                                          <div class="pricing-list-price text-center">
                                             <h4>£25</h4>
                                             <input type="radio" id="package3" name="package" value="Package 3" onclick="get_price(2500)" >
                                          </div>
                                       </div>
                                       <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                 </div>

                                 <div class="pricing-list">
                                    <div class="row">
                                       <div class="col-md-9 col-sm-9 col-xs-12">
                                          <h3>Lifetime Package   <small>featured</small></h3>
                                          <p>Lifetime all categories</p>
                                       </div>
                                       <!-- end col -->
                                       <div class="col-md-3 col-sm-3 col-xs-12">
                                          <div class="pricing-list-price text-center">
                                             <h4>£50</h4>
                                             <input type="radio" id="package4" name="package" value="Lifetime Package" onclick="get_price(5000)" >
                                          </div>
                                       </div>
                                       <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                 </div>



                              </div>
                           </div>   

                           <!-- Featured Ad  -->
                           <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                 <label class="control-label">Choose Mode of Payments  <small class="pull-right" > <a href="#"></a></small></label>
                                 <div class="skin-minimal">
                                    <ul class="list">
                                       <li >
                                          <input  type="radio"  name="pay_method" id="pay_method" value="paypal" onclick="get_val(this.value)">
                                          <label for="paypal">Paypal</label>
                                       </li>
                                       <li >
                                          <input  type="radio"  name="pay_method" id="pay_method" value="strip" onclick="get_val(this.value)" checked>
                                          <label for="card">Stripe</label>
                                       </li>

                                       <li >

                                             <input  type="checkbox" id="agree" value="yes" name="agree" required>

                                             <label for="minimal-checkbox-1">i agree <a href="#">Terms of Services</a></label>

                                          </li>
                                    </ul>
                                    <input type="hidden" name="amt" id="amt">
                                 </div>
                              </div>
                           </div>
                           <!-- end row -->
                           <script src="https://checkout.stripe.com/checkout.js"></script>
                        <input type="submit" id="sub1" class="btn btn-theme pull-right" >

                           <!-- <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-description="Access for a year"
          data-amount="1000"
          data-locale="auto"></script>

<input type="submit" id="sub2" value="Pay Now" style="padding: 8px 45px; color: white; font-weight: bolder;" class="stripe-button-el"> -->
                        </form>
                     </div>
                     <!-- end post-ad-form-->
                  </div>
                  <!-- end col -->
                  <!-- Right Sidebar -->
                  <div class="col-md-4 col-xs-12 col-sm-12">
                     <!-- Sidebar Widgets -->
                     <div class="blog-sidebar">
                        <!-- Categories --> 
                        <div class="widget">
                           <div class="widget-heading">
                              <h4 class="panel-title"><a>Saftey Tips </a></h4>
                           </div>
                           <div class="widget-content">
                              <p class="lead">Posting an ad on <a href="#">Private Cleaner Services</a> is paid! However, all ads must follow our rules:</p>
                              <ol>
                                 <li>Make sure you post in the correct category.</li>
                                 <li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
                                 <li>Do not upload pictures with watermarks.</li>
                                 <li>Do not post ads containing multiple items unless it's a package deal.</li>
                                 <li>Do not put your email or phone numbers in the title or description.</li>
                                 <li>Make sure you post in the correct category.</li>
                                 <li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
                                 <li>Do not upload pictures with watermarks.</li>
                                 <li>Do not post ads containing multiple items unless it's a package deal.</li>
                              </ol>
                           </div>
                        </div>
                        <!-- Latest News --> 
                     </div>
                     <!-- Sidebar Widgets End -->
                  </div>


                  <div class="col-md-4 col-xs-12 col-sm-12">
                     <!-- Sidebar Widgets -->
                     <div class="blog-sidebar">
                        <!-- Categories --> 
                        

                     <div class="heading-panel">

                        <h3 class="main-title text-left">

                           Register With Us  

                        </h3>

                     </div>

                     <div class="content-info">

                        <div class="features">

                           <div class="features-icons">

                              <img src="images/chat.png" alt="img">

                           </div>

                           <div class="features-text">

                              <h3>Chat & Messaging</h3>

                              <p>

                                 Access your chats and account info from any device.

                              </p>

                           </div>

                        </div>

                        <div class="features">

                           <div class="features-icons">

                              <img src="images/panel.png" alt="img">

                           </div>

                           <div class="features-text">

                              <h3>User Dashboard</h3>

                              <p>

                                 Maintain a wishlist by saving your favourite Cleaners.

                              </p>

                           </div>

                        </div>

                        <div class="features">

                           <div class="features-icons">

                              <img src="images/history.png" alt="img">

                           </div>

                           <div class="features-text">

                              <h3>Track History</h3>

                              <p>

                                 Track the status of your cleaners history.

                              </p>

                           </div>

                        </div>

                        <div class="features">

                           <div class="features-icons">

                              <img src="images/fea.png" alt="img">

                           </div>

                           <div class="features-text">

                              <h3>features Listing</h3>

                              <p>

                                 Get more value from your ad.

                              </p>

                           </div>

                        </div>

                        <span class="arrowsign hidden-sm hidden-xs"><img src="images/arrow.png" alt=""></span>

                     </div>

                  
                     </div>
                  </div>

                  <!-- Middle Content Area  End --><!-- end col -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">


   function checkPass()

    {

        //Store the password field objects into variables ...

        var pass1 = document.getElementById('password');

        var pass2 = document.getElementById('password2');

        //Store the Confimation Message Object ...

        var message = document.getElementById('confirmMessage');

        //Set the colors we will be using ...

        var goodColor = "#66cc66";

        var badColor = "#ff6666";

        //Compare the values in the password field

        //and the confirmation field

        if(pass1.value == pass2.value){

            //The passwords match.

            //Set the color to the good color and inform

            //the user that they have entered the correct password

            pass2.style.backgroundColor = goodColor;

            message.style.color = goodColor;

            message.innerHTML = "Passwords Match!"

        }else{

            //The passwords do not match.

            //Set the color to the bad color and

            //notify the user.

            pass2.style.backgroundColor = badColor;

            message.style.color = badColor;

            message.innerHTML = "Passwords Do Not Match!"

        }

    }

var aamount = '';
get_price(1000);
function get_price(val){

aamount = val;
document.getElementById("amt").value=val;
$('.stripe-button').attr('data-amount', val)

    var handler = StripeCheckout.configure({
    key: 'pk_test_v4hc3rYlNlV0dxo72jWC53MF',
    image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
    locale: 'auto',
    token: function(token) {
        // You can access the token ID with `token.id`.
        // Get the token ID to your server-side code for use.
        //console.log(token);
        //console.log(aamount);

        // Post Cleaner Company Name 
        // var company_name = document.getElementById('company_name').value;
        //Categorie
        var company_name = 'companyname';
        //var categories = document.getElementById('category1').value;
        //var image_browse=new FormData('#image_browse');

        var location = document.getElementById('location').value;
        var description = document.getElementById('editor1').value;
        var name = document.getElementById('c_name').value;
        var email = document.getElementById('c_email').value;
        var password = document.getElementById('password').value;
        var country = document.getElementById('country').value;
        var city = document.getElementById('city').value;
        var mobile = document.getElementById('mobile').value;
        var address = document.getElementById('address').value;
        var pincode = document.getElementById('pincode').value;
        var title = document.getElementById('title').value;
        var agree = document.getElementById('agree').value;
        var package = $("input:radio[name=package]:checked").val();
        var categories ='';
        var els = document.getElementsByName('category1');

//var image_browse = $('#image_browse').prop('files')[0]; 
// var image_browse=$("#image_browse")[0].files[0];  
        //var form_data = new FormData();                  
        //form_data.append('file', file_data);
 // console.log(image_browse);

  // var photo = document.getElementById("image_browse");
  //   var file = photo.files[0];
    //console.log(file);

        for (var i=0;i<els.length;i++){
          if ( els[i].checked ) {
            categories = els[i].value +','+categories;
          }
        }
$("#sub1").prop('value', 'Please wait...');
$("#sub1").prop("disabled", true);


        var custom_token = <?php echo $customToken; ?>;
        $.ajax({
        type:'post',
        url:'stripe_store.php',
        data:{
            stripe_token: token.id,
            custom_token: custom_token,
            amount: aamount,
            company_name: company_name,
            cat: categories,
            location: location,
            description: description,
            name: name,
            email: email,
            password: password,
            country: country,
            city: city,
            mobile: mobile,
            address: address,
            pincode: pincode,
            agree: agree,
            title: title,
            package: package
        },

        //file : image_browse,
        success:function(response) {
            if(response == 'succeeded'){
              $("#sub1").prop('value', 'SUBMIT');
$("#sub1").prop("disabled", false);
                window.location.href = "http://www.webtechnomind.com/work/theprivatecleaner/thankyou.php";
            }
        }
      });
    }

    
    });

    document.getElementById('sub1').addEventListener('click', function(e) {

        $('#cleaner_from').submit(function(e){
            var payment_type = $("input:radio[name=pay_method]:checked").val();
            // Open Checkout with further options:
            if(payment_type == 'strip'){
                handler.open({
                    name: 'Stripe.com',
                    description: '2 widgets',
                    zipCode: true,
                    amount: aamount
                });
                e.preventDefault();
            }
        });                
    });

    // Close Checkout on page navigation:
    window.addEventListener('popstate', function() {
        console.log("closed");
    handler.close();
    });


}


  </script>    
<style>
button {
   display: none !important;
}
</style>
<?php include("includes/footer.php");?>
