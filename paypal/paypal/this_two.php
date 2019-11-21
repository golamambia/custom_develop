<?php
include"header.php";
if($_SESSION['email']==''){
header("Location: get_started.php");

}
if(isset($_POST['sub1'])){
$_POST['entry_date'] = date('d-m-Y');
//$_POST['display_size']='full_page';

//$get_last_id = $db->insertDataArray(TABLE_POPDETAILS,$_POST);

if($_FILES['up_file']['name']!=''){
   $arr=getimagesize($_FILES['up_file']['tmp_name']);
   $userfile_extn = end(explode(".", strtolower($_FILES['up_file']['name'])));
   if(($userfile_extn =="jpeg"||$userfile_extn =="jpg" || $userfile_extn =="png" || $userfile_extn =="gif")){
   $tmp_name = $_FILES['up_file']['tmp_name'];
   $name = time()."_".$_FILES['up_file']['name'];
   move_uploaded_file($tmp_name,SITE_UPLOAD.$name);

   $_SESSION['post_data']['tmp']=$tmp_name;
   $_POST['up_file'] = $name;
   $_SESSION['post_data'] = $_POST;
          $msg_class = 'alert-success';
          $msg = 'Record Saved Successfully';
   }else{
    $msg_class = 'alert-error';
   $msg="Must be .jpeg/.jpg/.png/.gif please check extension";
   }
   }
                    
                    
                    
}
if(isset($_POST['sub2'])){

$_POST['entry_date'] = date('d-m-Y');
if($_POST['total_amt']!=0){
//$_POST['display_size']='full_page';
if($_SESSION['post_data']!=''){
$tmp_name=$_SESSION['post_data']['tmp'];
$name=$_SESSION['post_data']['up_file'];
move_uploaded_file($tmp_name,SITE_UPLOAD.$name);
$_SESSION['post_data2'] = $_SESSION['post_data'];
 // $get_last_id = $db->insertDataArray(TABLE_POPDETAILS,$_SESSION['post_data']);
 //                     if(!empty($get_last_id)):
 //                   header("Location: banner.php");
 //                    else:
 //                   $msg_class = 'alert-error';
 //                    $msg = MSG_ADD_FAIL;
 //                     endif;

//}





$amt=$_POST['total_amt'];

?>

<br>
<p style="padding-left: 46%; font-weight: bold; padding-top: 8%;">Please wait...</p>

<form action="payments.php"  method="post" name="form_change2" id="form_change2" accept-charset="utf-8">
    <input type="hidden" name="req_paypal" value="req_paypal">

        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- <input type="hidden" name="amount" id="amount" value="3"> -->
        <input type="hidden" name="amount" id="amount" value="<?=$amt;?>">
       
</form>
<script type="text/javascript">
   document.getElementById('form_change2').submit();
</script>


<?php
                    $_SESSION['post_data']='';
                  }else{

                    

if($_FILES['up_file']['name']!=''){
   $arr=getimagesize($_FILES['up_file']['tmp_name']);
   $userfile_extn = end(explode(".", strtolower($_FILES['up_file']['name'])));
   if(($userfile_extn =="jpeg"||$userfile_extn =="jpg" || $userfile_extn =="png" || $userfile_extn =="gif")){
   $tmp_name = $_FILES['up_file']['tmp_name'];
   $name = time()."_".$_FILES['up_file']['name'];
   move_uploaded_file($tmp_name,SITE_UPLOAD.$name);
   $_POST['up_file'] = $name;

$_SESSION['post_data2'] = $_POST;
   // $get_last_id = $db->insertDataArray(TABLE_POPDETAILS,$_POST);
   //       if(!empty($get_last_id)):
   //                 header("Location: banner.php");
   //                  else:
   //                  $msg_class = 'alert-error';
   //                  $msg = MSG_ADD_FAIL;
   //                  endif;
$amt=$_POST['total_amt'];

?>

<br><br><br><br>
<p style="padding-left: 46%; font-weight: bold; padding-top: 8%;">Please wait...</p>

<form action="payments.php"  method="post" name="form_change2" id="form_change2" accept-charset="utf-8">
    <input type="hidden" name="req_paypal" value="req_paypal">

        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- <input type="hidden" name="amount" id="amount" value="3"> -->
        <input type="hidden" name="amount" id="amount" value="<?=$amt;?>">
       
</form>
<script type="text/javascript">
   document.getElementById('form_change2').submit();
</script>



<?php
   }else{
    $msg_class = 'alert-error';
   $msg="Must be .jpeg/.jpg/.png/.gif please check extension";
   }
   }

                    

                  }
                }else{
if($_SESSION['post_data']!=''){
$tmp_name=$_SESSION['post_data']['tmp'];
$name=$_SESSION['post_data']['up_file'];
move_uploaded_file($tmp_name,SITE_UPLOAD.$name);
$_SESSION['post_data2'] = $_SESSION['post_data'];

$event_name = $_SESSION['post_data2']['name'];
$event_name = preg_replace('~[^\pL\d]+~u', '-', $event_name);
$event_name = iconv('utf-8', 'us-ascii//TRANSLIT', $event_name);
$event_name = preg_replace('~[^-\w]+~', '', $event_name);
$event_name = trim($event_name, '-');
$event_name = preg_replace('~-+~', '-', $event_name);
$slug = strtolower($event_name);        
$mainslug = $slug;

for($j=0; $j<100;$j++){
    $get_slug = $pm->getTableDetails(TABLE_POPDETAILS,'slug',$slug);
    if($get_slug['slug'] == $slug){
        $slug = $mainslug.'-'.$j;
    }else{
        break;
    }
}
$_SESSION['post_data2']['slug'] = $slug;

$get_last_id = $db->insertDataArray(TABLE_POPDETAILS,$_SESSION['post_data2']);
                    if(!empty($get_last_id)){
                      require_once "./google/Google_Client.php";
                      require_once "./google/contrib/Google_CalendarService.php";
                      $startSource = $_SESSION['post_data2']['start_date'];
                      $startDate = new DateTime($startSource);
                      $startTimeSource = $_SESSION['post_data2']['start_time'];
                      $startTime = date("H:i:s", strtotime($startTimeSource));
                      $eventStart = $startDate->format('Y-m-d').'T'.$startTime.'.000+05:30';

                      $endSource = $_SESSION['post_data2']['end_date'];
                      $endDate = new DateTime($endSource);
                      $endTimeSource = $_SESSION['post_data2']['end_time'];
                      $endTime = date("H:i:s", strtotime($endTimeSource));
                      $eventEnd = $endDate->format('Y-m-d').'T'.$endTime.'.000+05:30';

                      $eventTitle = $_SESSION['post_data2']['name'];
                      $eventLocation = $_SESSION['post_data2']['address'].', '.$_SESSION['post_data2']['city'].', '.$_SESSION['post_data2']['state'].', '.$_SESSION['post_data2']['zipcode'];    
                      $client = new Google_Client();
                      $client->setUseObjects(true);
                      $client->setApplicationName("LIC-project");
                      $key = file_get_contents('./lic-project-232411-9bce10722285.p12');
                      $client->setAssertionCredentials(
                          new Google_AssertionCredentials(
                              "lic-service-account@lic-project-232411.iam.gserviceaccount.com",
                              array(
                                  "https://www.googleapis.com/auth/calendar"
                              ),
                              $key
                          )
                      );
                      $service = new Google_CalendarService($client);
                      $event = new Google_Event();
                      $event->setSummary($eventTitle);
                      $event->setLocation($eventLocation);
                      $start = new Google_EventDateTime();
                      $start->setDateTime($eventStart);
                      $event->setStart($start);
                      $end = new Google_EventDateTime();
                      $end->setDateTime($eventEnd);
                      $event->setEnd($end);
                      $calendar_id = "qa7iuantt7cvr66ve3jvkoajco@group.calendar.google.com";    
                      $service->events->insert($calendar_id, $event);
					  /**********************************************************/
					  			  
	$name = $_SESSION['name'];
    // $msg = 'Successfully Booked';
    
    $subject = "Thank you for posting with Pop Up Log.";

            $log=SITE_URL.'banner.php?event='.base64_encode($_SESSION['post_data']['events']).'&location='.base64_encode($_SESSION['post_data']['city']).'&date='.base64_encode($_SESSION['post_data']['start_date']);

            $mail_body = '<html><body>';


            $mail_body .= '<table rules="all" style="border-color: #666;" cellpadding="10">';

            $mail_body .= "<tr style='background: #eee;'><td><strong>Event Name:</strong> </td><td>" .$_SESSION['name']. "</td></tr>";


           //$mail_body .= "<tr><td><strong>Username:</strong> </td><td>" . $_POST['email'] . "</td></tr>";

            // $mail_body .= "<tr><td><strong>Start Date:</strong> </td><td>" .$_POST['password']. "</td></tr>";


            $mail_body .= "<tr><td><strong>You can find your listing here:</strong> </td><td>" .$log. "</td></tr>";


            $mail_body .= "</table>";

            $mail_body .= "</body></html>";
            $mail_body .= "<p>We appreciate your association. </p><p>Thanks,</p><p>Pop Up Log</p><p>PS: This is an auto generated mail, Please do not reply to this.</p>";

        //$name=$_POST["name"];
        require_once('class/class.phpmailer.php');
        $mail = new PHPMailer();

        $mail->IsSMTP();                                  
        $mail->Host = "bh-ht-2.webhostbox.net";  
        $mail->SMTPAuth = true; 
        $mail->Username = "sendmail@webtechnomind.com"; 
        $mail->Password = "ZM-(XPt2ie!z"; 
        $mail->From = "sendmail@webtechnomind.com";
        $mail->FromName = "Pop Up Log";
        $mail->AddAddress($_SESSION[USER][email]);  
        $mail->WordWrap = 5; 
        $mail->IsHTML(true);  
        $mail->Subject = $subject;
        $mail->Body    = $mail_body;
        $mail->AltBody = "This is the body in plain text for non-HTML mail clients";
        if(!$mail->Send())
        {
        echo "Mailer Error: " . $mail->ErrorInfo;
        exit;
        }else{
          $msg = 'Successfully Booked';
        }
					  /************************************************************/
                      header("Location: index.php");
                    }else{
                    $msg_class = 'alert-error';
                    $msg = MSG_ADD_FAIL;
                    }
                    $_SESSION['post_data']='';

                }else{
if($_FILES['up_file']['name']!=''){
   $arr=getimagesize($_FILES['up_file']['tmp_name']);
   $userfile_extn = end(explode(".", strtolower($_FILES['up_file']['name'])));
   if(($userfile_extn =="jpeg"||$userfile_extn =="jpg" || $userfile_extn =="png" || $userfile_extn =="gif")){
   $tmp_name = $_FILES['up_file']['tmp_name'];
   $name = time()."_".$_FILES['up_file']['name'];
   move_uploaded_file($tmp_name,SITE_UPLOAD.$name);
   $_POST['up_file'] = $name;
   $_POST['display_size']='';

    $event_name = $_POST['name'];
    $event_name = preg_replace('~[^\pL\d]+~u', '-', $event_name);
    $event_name = iconv('utf-8', 'us-ascii//TRANSLIT', $event_name);
    $event_name = preg_replace('~[^-\w]+~', '', $event_name);
    $event_name = trim($event_name, '-');
    $event_name = preg_replace('~-+~', '-', $event_name);
    $slug = strtolower($event_name);        
    $mainslug = $slug;

    for($j=0; $j<100;$j++){
        $get_slug = $pm->getTableDetails(TABLE_POPDETAILS,'slug',$slug);
        if($get_slug['slug'] == $slug){
            $slug = $mainslug.'-'.$j;
        }else{
            break;
        }
    }
    $_POST['slug'] = $slug;

   $get_last_id = $db->insertDataArray(TABLE_POPDETAILS,$_POST);
         if(!empty($get_last_id)){
            require_once "./google/Google_Client.php";
            require_once "./google/contrib/Google_CalendarService.php";
            $startSource = $_POST['start_date'];
            $startDate = new DateTime($startSource);
            $startTimeSource = $_POST['start_time'];
            $startTime = date("H:i:s", strtotime($startTimeSource));
            $eventStart = $startDate->format('Y-m-d').'T'.$startTime.'.000+05:30';

            $endSource = $_POST['end_date'];
            $endDate = new DateTime($endSource);
            $endTimeSource = $_POST['end_time'];
            $endTime = date("H:i:s", strtotime($endTimeSource));
            $eventEnd = $endDate->format('Y-m-d').'T'.$endTime.'.000+05:30';

            $eventTitle = $_POST['name'];
            $eventLocation = $_POST['address'].', '.$_POST['city'].', '.$_POST['state'].', '.$_POST['zipcode'];    
            $client = new Google_Client();
            $client->setUseObjects(true);
            $client->setApplicationName("LIC-project");
            $key = file_get_contents('./lic-project-232411-9bce10722285.p12');
            $client->setAssertionCredentials(
                new Google_AssertionCredentials(
                    "lic-service-account@lic-project-232411.iam.gserviceaccount.com",
                    array(
                        "https://www.googleapis.com/auth/calendar"
                    ),
                    $key
                )
            );
            $service = new Google_CalendarService($client);
            $event = new Google_Event();
            $event->setSummary($eventTitle);
            $event->setLocation($eventLocation);
            $start = new Google_EventDateTime();
            $start->setDateTime($eventStart);
            $event->setStart($start);
            $end = new Google_EventDateTime();
            $end->setDateTime($eventEnd);
            $event->setEnd($end);
            $calendar_id = "qa7iuantt7cvr66ve3jvkoajco@group.calendar.google.com";    
            $service->events->insert($calendar_id, $event);
			/*********************************************/
			 $subject = "Thank you for posting with Pop Up Log.";

            $log=SITE_URL.'banner.php?event='.base64_encode($_POST['events']).'&location='.base64_encode($_POST['city']).'&date='.base64_encode($_POST['start_date']);

            $mail_body = '<html><body>';


            $mail_body .= '<table rules="all" style="border-color: #666;" cellpadding="10">';

            $mail_body .= "<tr style='background: #eee;'><td><strong>Event Name:</strong> </td><td>" .$_POST['name']. "</td></tr>";


           //$mail_body .= "<tr><td><strong>Username:</strong> </td><td>" . $_POST['email'] . "</td></tr>";

            // $mail_body .= "<tr><td><strong>Start Date:</strong> </td><td>" .$_POST['password']. "</td></tr>";


            $mail_body .= "<tr><td><strong>You can find your listing here:</strong> </td><td>" .$log. "</td></tr>";


            $mail_body .= "</table>";

            $mail_body .= "</body></html>";
            $mail_body .= "<p>We appreciate your association. </p><p>Thanks,</p><p>Pop Up Log</p><p>PS: This is an auto generated mail, Please do not reply to this.</p>";

				$name=$_POST["name"];
				require_once('class/class.phpmailer.php');
				$mail = new PHPMailer();

				$mail->IsSMTP();                                  
				$mail->Host = "bh-ht-2.webhostbox.net";  
				$mail->SMTPAuth = true; 
				$mail->Username = "sendmail@webtechnomind.com"; 
				$mail->Password = "ZM-(XPt2ie!z"; 
				$mail->From = "sendmail@webtechnomind.com";
				$mail->FromName = "Pop Up Log";
				$mail->AddAddress($_SESSION[USER][email]);  
				$mail->WordWrap = 5; 
				$mail->IsHTML(true);  
				$mail->Subject = $subject;
				$mail->Body    = $mail_body;
				$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
				if(!$mail->Send())
				{
				echo "Mailer Error: " . $mail->ErrorInfo;
				exit;
				}else{
				  $msg = 'Successfully Booked';
				}

				
			
			/*******************************************/
            header("Location: index.php");
         }else{
              $msg_class = 'alert-error';
              $msg = MSG_ADD_FAIL;
         }
   }else{
    $msg_class = 'alert-error';
   $msg="Must be .jpeg/.jpg/.png/.gif please check extension";
   }
   }

                }

              }
}

?>
<div class="bannerarea">
  <div class="home-banner shortbanner">
    <div class="cycle-slideshow banner-slideshow1" data-cycle-slides="&gt; div" data-cycle-pager=".banner-pager" data-cycle-prev="#HomePrev"  data-cycle-next="#HomeNext">
      <div class="slide" style="background-image:url(images/slide3.jpg)" > </div>
    </div>
  </div>
  <div class="datedbox onebox">
    <div class="container">
      <div class="box1">
        <h1>Where can I get some</h1>
      </div>
    </div>
  </div>
</div>
<div class="mainarea">
  <div class="container">
    <div class="onepage_area">
      <p class="">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a </p>
      <h1 class="company-heading-h1">POP UP DETAILS</h1>
      <div class="tital"> SECTION A</div>
      
      <?php if((isset($msg)) and ($msg != '')){ ?>
<div class="alert <?php echo $msg_class; ?> alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<p><?php echo $msg; ?></p>
</div>
<?php } ?>
      <form method="post" enctype="multipart/form-data" onsubmit="return submitUserForm();">
        <div class="form-group">
          <label for="name">Name of your Pop Up or Event </label>
          <input type="text" name="name" class="form-control" id="name" placeholder="Name of your Pop Up or Event" value="<?=$_SESSION['post_data']['name'];?>" required>
        </div>
        <div class="form-group">
          <label for="ckeExample">Description</label>
          <textarea class="form-control" name="description" id="ckeExample" cols="10" rows="3" placeholder="Provide details about your Pop Up or Event" required><?=$_SESSION['post_data']['description'];?></textarea>
		  <span class="copy" onClick="myDesT()"><a><i class="fa fa-clone" aria-hidden="true"></i></a></span>
        </div>
        <div class="form-group">
          <label for="Address">Address</label>
          <input type="text" class="form-control" name="address" id="ckeAddress" placeholder="" value="<?=$_SESSION['post_data']['address'];?>" required>
       <span class="copy" onClick="myAddT()"><a><i class="fa fa-clone" aria-hidden="true"></i></a></span>
          
          <div class="row">
          <div class="col-md-6">
            	 <div class="form-group">
            <label >City</label>
            <select class="form-control" name="city" id="city" required>
       <!-- <option value="" id="location" class="service-small" selected></option> -->
                        <?php 
            $sql = "SELECT * FROM ".TABLE_CITY."  ORDER BY title asc";
            $res = $db->selectData($sql);
            while($row_rec = $db->getRow($res)){
            ?>
                          
                            
                            <option <?php if($row_rec['id']==$_SESSION['post_data']['city']){?> selected <?php } ?> value="<?=$row_rec[id];?>" class="service-small"><?=$row_rec[title];?></option>
                            <?php
                        }

                        ?>
 
             </select>
          </div>
            </div>
          	<!-- <div class="col-md-4">
            	 <div class="form-group">
            <label>State</label>
            <select class="form-control" name="state" id="state">
                
                <option <?php if('CA'==$_SESSION['post_data']['state']){?> selected <?php } ?> value="CA">CA</option>
                <option <?php if('D.C.'==$_SESSION['post_data']['state']){?> selected <?php } ?> value="D.C.">D.C.</option>
        <option <?php if('FL'==$_SESSION['post_data']['state']){?> selected <?php } ?> value="FL">FL</option>
        <option <?php if('GA'==$_SESSION['post_data']['state']){?> selected <?php } ?> value="GA">GA</option>
      
                <option <?php if('IL'==$_SESSION['post_data']['state']){?> selected <?php } ?> value="IL">IL</option>
                <option <?php if('MA'==$_SESSION['post_data']['state']){?> selected <?php } ?> value="MA">MA</option>
        <option <?php if('NY'==$_SESSION['post_data']['state']){?> selected <?php } ?> value="NY">NY</option>
                <option <?php if('PA'==$_SESSION['post_data']['state']){?> selected <?php } ?> value="PA">PA</option>
                
                
            </select>
          </div>
            </div> -->
            
            
            <div class="col-md-6">
            	 <div class="form-group">
            <label >Zip</label>
            <input type="text" name="zipcode" class="form-control" id="name" placeholder="Zip" value="<?=$_SESSION['post_data']['zipcode'];?>" required>
          </div>
            </div>
          </div>
          <div class="timeanddatedarea clearfix">
          <div class="timeanddatedarea_one clearfix">
            <div class="timeanddatedarea_one_start">
              <div class="form-group">
                <label for="datepicker">Start Date</label>
                <input type="text" autocomplete="off" name="start_date" class="form-control" id="from" placeholder="MM DD YY" value="<?=$_SESSION['post_data']['start_date'];?>" required>
                <span style="color:red;" id="alert_dt"></span>
          
              </div>
            </div>
            <div class="timeanddatedarea_one_start">
              <div class="form-group">
                <label for="basicExample">Start Time</label>
                <input name="start_time" id="basicExample" type="text" class="time form-control" placeholder="1:30pm" value="<?=$_SESSION['post_data']['start_time'];?>" required>
              </div>
            </div>
          </div>
          <div class="timeanddatedarea_one clearfix">
            <div class="timeanddatedarea_one_start">
              <div class="form-group">
                <label for="datepicker1">End Date</label>
                <input name="end_date" type="text" autocomplete="off" class="form-control"  id="to" placeholder="MM DD YY" value="<?=$_SESSION['post_data']['end_date'];?>" required>
                <span style="color:red;" id="alert_dt2"></span>
              </div>
            </div>
            <div class="timeanddatedarea_one_start">
              <div class="form-group">
                <label for="basicExample1">End Time</label>
                <input name="end_time" id="basicExample1" type="text" class="time form-control" placeholder="12:30pm" value="<?=$_SESSION['post_data']['end_time'];?>" required>
              </div>
            </div>
          </div>
        </div>
        
        <div class="form-group organizer"> <span> <a href="#"><i class="fa fa-plus" aria-hidden="true"></i>Add more Pop Ups</a></span> </div>
        <div class="form-group">
          <label>Age Restrictrictions</label>
          <br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="age_restic" id="inlineRadio1" value="allage" <?php if('allage'==$_SESSION['post_data']['age_restic']){?> checked <?php } ?> <?php if($_SESSION['post_data']['age_restic']==''){ echo"checked";}?>>
            <label class="form-check-label" for="inlineRadio1">All Ages</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="age_restic" id="inlineRadio2" value="above_18" <?php if('above_18'==$_SESSION['post_data']['age_restic']){?> checked <?php } ?>>
            <label class="form-check-label" for="inlineRadio2">Above 18</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="age_restic" id="inlineRadio3" value="above_21" <?php if('above_21'==$_SESSION['post_data']['age_restic']){?> checked <?php } ?>>
            <label class="form-check-label" for="inlineRadio3">Above 21</label>
          </div>
        </div>
        <div class="form-group">
          <label>Charges</label>
          <br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="charges_fac" id="inlineRadio4" value="Paid" <?php if('Paid'==$_SESSION['post_data']['charges_fac']){?> checked <?php } ?><?php if($_SESSION['post_data']['charges_fac']==''){ echo"checked";}?> >
            <label class="form-check-label" for="inlineRadio4">Paid</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="charges_fac" id="inlineRadio5" value="Free" <?php if('Free'==$_SESSION['post_data']['charges_fac']){?> checked <?php } ?> >
            <label class="form-check-label" for="inlineRadio5">Free</label>
          </div>
        </div>
        <div class="form-group hide">
          <label for="account">Amount</label>
          <input type="text" class="form-control" id="account" placeholder="Amount" name="charges_amount" value="<?=$_SESSION['post_data']['charges_amount'];?>" required>
        </div>
        <div class="form-group">
          <label for="hosted">Hosted By</label>
          <input type="text" class="form-control" name="hosted_by" id="hosted" placeholder="Host User Name" value="<?=$_SESSION['USER']['user_id'];?>" readonly>
        </div>
        <div class="form-group">
          <label for="Official1">Social Link</label>
          <input type="text" name="soc_link1" class="form-control" id="Official1" placeholder="Social Link" value="<?=$_SESSION['post_data']['soc_link1'];?>" required>
        </div>
        <div class="form-group">
          <label for="Official2">Website Link</label>
          <input type="text" name="soc_link2" class="form-control" id="Official2" placeholder="Website Link" value="<?=$_SESSION['post_data']['soc_link2'];?>" required>
        </div>
        <div class="form-group">
          <label for="Official1">Upload Event Flyer/Picture</label>
          <div class="uploadOuter">
            <button class="btn">Upload a JPG/PNG file</button>
            <input type="text" class="uploadText"/>
            <input type="hidden" class="uploadText2" name="immmgg" />
            <input type="file" class="uploadFile form-control" name="up_file" <?php if($_SESSION['post_data']['immmgg']==''){?> required <?php } ?> />
          </div>
          <div class="Preview" <?php if($_SESSION['post_data']['immmgg']){?> style="display:block;" <?php }?>>
            <img src="<?php echo SITE_UPLOAD.$_SESSION['post_data']['up_file'];?>" alt=""/>
            <span class="loader" <?php if($_SESSION['post_data']['immmgg']){?> style="position: unset;" <?php }?>></span>
            </div>
          <span>
          <p>A pixel ratio of 2:1 looks the best</p>
          </span> </div>
        <div class="form-group">
          <label for="Official1">Type of Pop UP</label>
          <select class="form-control" name="events" id="events" required onchange="get_cat(this.value)">
              <option value="">--Select--</option>
                <?php 
            $sql = "SELECT * FROM ".TABLE_EVENT."  ORDER BY title asc";
            $res = $db->selectData($sql);
            while($row_rec = $db->getRow($res)){
            ?>
                            <option <?php if($row_rec['id']==$_SESSION['post_data']['events']){?> selected <?php } ?> value="<?=$row_rec[id];?>" class="service-small"><?=$row_rec[title];?></option>

                            <?php
                        }
                        ?>
            </select>
        </div>
        <div class="form-group">
          <label for="Official1">Sub Type</label>
          <select class="form-control" name="even_subtype" id="even_subtype" required>
                  
                    <?php 
                    $sid=$_SESSION['post_data']['events'];
                    $sql1= "SELECT * FROM ".TABLE_EVENT_SUB." where event_id='$sid' ORDER BY name";
                    $res1 = $db->selectData($sql1);
                    while($row_rec1 = $db->getRow($res1)){
                    ?>
                    <option <?php if($row_rec1['id']==$_SESSION['post_data']['even_subtype']){?> selected <?php } ?> value="<?php echo $row_rec1['id']; ?>"><?php echo $row_rec1['name']; ?></option>
                    <?php } ?>
                    <?php if($sid==''){?>
                    <option  value="" selected>--Select--</option>
                  <?php }?>
                
            </select>
        </div>
        <!--<div class="form-group">
            <div class="g-recaptcha" data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
            <input class="form-control d-none" data-recaptcha="true" required data-error="Please complete the Captcha">
            <div class="help-block with-errors"></div>
        </div>-->
        <div class="hide1">
            <div class="tital mt-4"><a href="#" data-toggle="tooltip" data-placement="top" title="Discount coupon distribution" style="color: #7c7c7c;">SECTION B</a></div>
        <div class="headinga-area">
            <h3>I Don't want to opt for Coupons <span data-toggle="tooltip" title="20% Discount ON $100 or $15 Discount ON $100"><i class="fa fa-question-circle" aria-hidden="true"></i></span></h3>
            <a class="btn-arrow" href="javascript:void(0)" type="button" data-toggle="collapse" data-target="#Collapse1" id="section_b"></a> 
          </div>
         <div id="Collapse1" class="collapse show">
          <div id="conditional_part">
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="Official1">Type of discount coupon </label>
                  <br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="discount_type" id="inlineRadio1" value="percentage" <?php if('percentage'==$_SESSION['post_data']['discount_type']){?> checked <?php } ?>>
                    <label class="form-check-label" for="inlineRadio1">% Percentage</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="discount_type" id="inlineRadio2" value="amount" <?php if('amount'==$_SESSION['post_data']['discount_type']){?> checked <?php } ?>>
                    <label class="form-check-label" for="inlineRadio2">$ Amount</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="discount">How much discount <span data-toggle="tooltip" title="explain 10% on $100 or $20 on $100"><i class="fa fa-question-circle" aria-hidden="true"></i></span></label>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="row percentage">
                  <div class="col">
                    <div class="form-group">
                      <input type="text" id="percentage" name="discount" class="form-control" placeholder="1-99" value="<?=$_SESSION['post_data']['discount'];?>">
                    </div>
                  </div>
                   <span>on</span>
                  <div class="col">
                    <div class="form-group">
                      <input type="text" id="Amount" name="charges_amount2" class="form-control" placeholder="Amount" value="<?=$_SESSION['post_data']['charges_amount2'];?>">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group organizer"> <span> <a href="#"><i class="fa fa-plus" aria-hidden="true"></i>(add more coupons)</a></span> </div>
            <div class="form-group mt-3">
              <label>Total coupons provided </label>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label >Quantity</label>
                    <select class="form-control" name="coupon_quantity" id="coupon_quantity" onchange="get_couponamt(this.value)">
                      <option value="">-Select-</option>
                      <?php 
            $sql = "SELECT * FROM ".TABLE_COUPON." ORDER BY title asc";
            $res = $db->selectData($sql);
            while($row_rec = $db->getRow($res)){
            ?>
                        <option <?php if($row_rec['id']==$_SESSION['post_data']['coupon_quantity']){?> selected <?php } ?>  value="<?php echo $row_rec['id']; ?>" ><?php echo $row_rec['title']; ?> </option>
                        <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Amount</label>
                    <select class="form-control" name="coupon_quan_amt" id="coupon_quan_amt">
                    <?php 
                    $sid2=$_SESSION['post_data']['coupon_quantity'];
                    $sql1= "SELECT * FROM ".TABLE_COUPONAMT." where event_id='$sid2' ";
                    $res1 = $db->selectData($sql1);
                    while($row_rec1 = $db->getRow($res1)){
                    ?>
                    <option  value="<?php echo $row_rec1['name']; ?>"><?php echo $row_rec1['name']; ?></option>
                    <?php } ?>
                    <?php if($sid2==''){?>
                    <option  value="" selected>-Select-</option>
                  <?php }?>                      
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>

        <div class="tital mt-3">SECTION C</div>
        <div class="headinga-area">
          <h3>I Don't want to opt for Banner Display <span data-toggle="tooltip" title="If a promoter selects this check box minimise this section"><i class="fa fa-question-circle" aria-hidden="true"></i></span></h3>
          <a class="btn-arrow" href="javascript:void(0)" type="button" data-toggle="collapse" data-target="#Collapse2" id="section_c"></a> 
         </div>
        <div id="Collapse2" class="collapse show">
          <div id="conditional_part">
            <div class="form-group">
                <h6 style="font-weight: bold;font-size:20px;">Premium displayed</h6>
              <label>Will be Premium Displayed on your Pop Up Category <span data-toggle="tooltip" title="3 options, Full page, Half Page, 1/3rd Page and amount $9.99, $7.99, $5.99"><i class="fa fa-question-circle" aria-hidden="true"></i></span></label>
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Display Size</label>
                    <select class="form-control" name="display_size" id="display_size" onchange="get_pageamt(this.value,'banner_end')" >
                      <option value="">-Select-</option>
                      <?php 
            $sql = "SELECT * FROM ".TABLE_PAGESIZE." ORDER BY id asc";
            $res = $db->selectData($sql);
            while($row_rec = $db->getRow($res)){
            ?>
                        <option <?php if($row_rec['id']==$_SESSION['post_data']['display_size']){?> selected <?php } ?>  value="<?php echo $row_rec['id']; ?>" ><?php echo $row_rec['name']; ?> </option>
                        <?php } ?>
                    </select>

                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Display Time</label>
                  <select class="form-control" name="banner_end" id="banner_end"  onchange="get_pageamt(display_size.value,'banner_end')">
                      <option value="" >-Select-</option>
                            <option value="<?php 
                            $td=date("m/d/Y");
                            echo $newDate = date("m/d/Y", strtotime("+7 day", strtotime($td)));?>" class="service-small" <?php if($_SESSION['post_data']['banner_end']==$newDate){?> selected <?php } ?>>One Week</option>
                            <option value="<?php
                             $lastm2 = $newDate; 
                            echo $today = date("m/d/Y", strtotime("+7 day", strtotime($lastm2)));?>" class="service-small" <?php if($_SESSION['post_data']['banner_end']==$today){?> selected <?php } ?>>Two Week</option>
                            <option value="<?php
                            $lastm = $today; 
                            echo $nextmonth = date("m/d/Y", strtotime("+7 day", strtotime($lastm)));

                            ?>" class="service-small" <?php if($_SESSION['post_data']['banner_end']==$nextmonth){?> selected <?php } ?>>Three Week</option>
                          
                      
                    </select>
                    <span id="msg" style="color: red;display: none;">Sorry Already booked</span>
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="form-group">
                    <label>Amount</label>
                    <input type="hidden" id="banner_start" name="banner_start" value="<?=date('m/d/Y');?>">
                  <select class="form-control" name="display_amount" id="display_amount">
                      <?php 
                    $sid3=$_SESSION['post_data']['display_size'];
                    $sql1= "SELECT * FROM ".TABLE_PAGEAMOUNT." where page_name='$sid3' ";
                    $res1 = $db->selectData($sql1);
                    while($row_rec1 = $db->getRow($res1)){
                    ?>
                    <option  value="<?php echo $row_rec1['amount']; ?>"><?php echo $row_rec1['amount']; ?></option>
                    <?php } ?>
                    <?php if($sid3==''){?>
                    <option  value="" selected>-Select-</option>
                  <?php }?>
                      
                    </select>
                  </div>
                </div>



              </div>
            </div>
          </div>
        </div>
        <style>
			.company-heading-h1 {
    font-size: 2.5rem;
    text-transform: UPPERCASE;
}
.onepage_area .tital {
	font-size: 30px;
	color: #49494e;
}
		</style>

        <!-- <div class="span12">
          <table class="table-condensed table-bordered table-striped">
                <thead>
                    <tr>
                      <th colspan="7"  >
                        <a href="#" rel="prev">&lt</a> March 2017 <a href="#" rel="next">&gt</a>
                      </th>
                    </tr>
                    <tr>
                        <th>Su</th>
                        <th>Mo</th>
                        <th>Tu</th>
                        <th>We</th>
                        <th>Th</th>
                        <th>Fr</th>
                        <th>Sa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="muted">29</td>
                        <td class="muted">30</td>
                        <td class="muted">31</td>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>13</td>
                        <td>14</td>
                        <td>15</td>
                        <td>16</td>
                        <td>17</td>
                        <td>18</td>
                    </tr>
                    <tr>
                        <td>19</td>
                        <td><strong>20</strong></td>
                        <td>21</td>
                        <td>22</td>
                        <td>23</td>
                        <td>24</td>
                        <td>25</td>
                    </tr>
                    <tr>
                        <td>26</td>
                        <td>27</td>
                        <td>28</td>
                        <td>29</td>
                        <td class="muted">1</td>
                        <td class="muted">2</td>
                        <td class="muted">3</td>
                    </tr>
                </tbody>
            </table>    
    </div> -->




        <div class="paymeny_box clearfix">
        <div class="paymeny_left">
        	<div class="payimg">
              <img src="images/payimg.jpg" alt=""> 
            </div>
          </div>
       	  <div class="paymeny_box_inner">
               <div class="form-group">
                 <label>Total Amount($)</label>
                 <input type="text" id="total_amt" name="total_amt" class="form-control" placeholder="Total amount" readonly value="<? if($_SESSION['post_data']['total_amt']!=''){echo $_SESSION['post_data']['total_amt'];}else{echo 0;}?>">
               </div>
               <a href="#"><i class="fa fa-cc-paypal" aria-hidden="true"></i></a>
               <div class="form-check clearfix">
              <input class="form-check-input" type="checkbox" <?php if($_SESSION['post_data']['agree']){ echo"checked";} ?> value="yes" id="defaultCheck1" name="agree" required>
              <label class="form-check-label" for="defaultCheck1">I agree to terms & conditions of Pop Up Log</label>
            </div>
			
			
			<div class="g-recaptcha" data-sitekey="6LeAx5gUAAAAAFSdX4yMKnk-iSYDFuIaaXpt6Ggv" data-callback="verifyCaptcha"></div>
    <div id="g-recaptcha-error"></div>
            </div>
        </div>
		
       <div class="col-md-12">
            <div class="form-group">
                        
            
            </div>
            </div>
		
        <div class="btnarea clearfix"> 
         <input type="submit" name="sub1" id="sub1" class="btn btn-danger" value="Save It For Now">
         <input type="submit" name="sub2" id="sub2" class="btn btn-primary" value="Let's Go Live!">
        </div>
      </form>
    </div>
  </div>
</div>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" rel="stylesheet"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

 
<script>
  $(document).ready(function () {
    $('#inlineRadio4').click(function () {
        $('.hide').show('fast');
    });
    $('#inlineRadio5').click(function () {
        $('.hide').hide('fast');
        
    });

    

        
        $('#from,#banner_end').change(function() {
          //alert('ok');
          var from=$('#from').val();
          var to=$('#to').val();
          var display_size=$('#display_size').val();
          var banner_end=$('#banner_end').val();
          if(display_size!='' && banner_end!='' ){
        $.ajax({
        type: "POST",
        url: "event_date_checking.php",
        data: 'from=' + from+'&to='+to+'&banner_end='+banner_end,
        cache: false,
        success: function(html) {
        //alert(html);
        if(html==1){

        $("#alert_dt").html('choose date after '+banner_end);
        $("#sub1").prop('disabled', true);
        $("#sub2").prop('disabled', true);
        }else{

        $("#alert_dt").html('');
       $("#sub1").prop('disabled', false);
        $("#sub2").prop('disabled', false);

        }
       


        }
        });
}

          });

        $('#from,#to').change(function() {
          //alert('ok');
          var from=$('#from').val();
          var to=$('#to').val();
          var display_size=$('#display_size').val();
          var banner_end=$('#banner_end').val();
          if(display_size!='' && banner_end!='' ){
        $.ajax({
        type: "POST",
        url: "event_date_checking2.php",
        data: 'from=' + from+'&to='+to+'&banner_end='+banner_end,
        cache: false,
        success: function(html) {
        //alert(html);
       
        if(html==2){

        $("#alert_dt2").html('Start and end date should be different');
       
        
        $("#sub1").prop('disabled', true);
        $("#sub2").prop('disabled', true);
        }else{

        $("#alert_dt2").html('');
       
        $("#sub1").prop('disabled', false);
        $("#sub2").prop('disabled', false);

        }


        }
        });
        }

          });

 $('#banner_end,#display_size,#events').change(function() { 
var date=$('#banner_start').val();
var page_size=$('#display_size').val();
var n=$('#banner_end').val();
var events=$('#events').val();
//alert(1);
if(n!='' && page_size!='' && events!='' ){
$.ajax({
        type: "POST",
        url: "date_check.php",
        data: 'date=' + date+'&page='+page_size+'&events='+events+'&banner_end='+n,
        cache: false,
        success: function(html) {
        //alert(html);
        if(html>0){
        $("#msg").show();
        $("#banner_end").focus();
        //$('#to1').val('');
        //$('#basicExample12').val('');
        $("#sub2").prop('disabled', true);
        }else{
          
        //$('#to1').val(n);
        //$('#basicExample12').val(stime);
        $("#msg").hide();
        $("#sub2").prop('disabled', false);
        }


        }
        });
      }
         });


$('#section_b').click(function() {
//alert(1);
$("#percentage").val('');
$("#coupon_quantity").val('');
var aa=$("#coupon_quan_amt").val();
if(aa!=''){
var a=$("#coupon_quan_amt").val();
}else{
var a=0;
}
var a_msg='<select class="form-control" name="coupon_quan_amt" id="coupon_quan_amt"><option value="0">-Select amount-</option></select>';

$("#coupon_quan_amt").html(a_msg);
var b=$("#total_amt").val();
if(b!='' || b!=0){
  //alert(aa);
  var c=parseFloat(b)-parseFloat(a);
  $("#total_amt").val(c);
}

//alert(c);

  });

$('#section_c').click(function() {
//alert(1);
$("#display_size").val('');
$("#banner_end").val('');
var aa=$("#display_amount").val();
if(aa!=''){
var a=$("#display_amount").val();
}else{
var a=0;
}
var a_msg='<select class="form-control" name="display_amount" id="display_amount"><option value="0">-Select Amount-</option></select>';

$("#display_amount").html(a_msg);
var b=$("#total_amt").val();
if(b!='' || b!=0){
  //alert(aa);
  var c=parseFloat(b)-parseFloat(a);
  $("#total_amt").val(c);
}

//alert(c);

  });



        });



   function get_cat(val) {
//alert(val);

$.ajax({
type: "POST",
url: "get_subevent.php",
data: 'val=' + val,
cache: false,
success: function(html) {
//alert(html);

   
$("#even_subtype").html(html);


}
});

return false;
}

function get_pageamt(val,wkk) {
//alert(val);
var optionText = $("#banner_end option:selected").text();
if(optionText=='-Select-'){
var wk=1;
}else if(optionText=='One Week'){
var wk=1;
}else if(optionText=='Two Week'){
var wk=2;

}else{
var wk=3;

}

$.ajax({
type: "POST",
url: "get_pagesize_amt.php",
data: 'val=' + val +'&wk=' + wk,
cache: false,
success: function(html) {
//alert(html);

   
$("#display_amount").html(html);
var aa=$("#coupon_quan_amt").val();
if(aa==''){
 var a=0;
}else{
  var a=$("#coupon_quan_amt").val();
}

//alert(optionText);

var b=$("#display_amount").val();
var c=parseFloat(a)+parseFloat(b);
//alert(c);
$("#total_amt").val(c);

}
});

return false;

}

function get_couponamt(val) {
//alert(val);

$.ajax({
type: "POST",
url: "get_coupon_amt.php",
data: 'val=' + val,
cache: false,
success: function(html) {
//alert(html);

   
$("#coupon_quan_amt").html(html);

var a=$("#coupon_quan_amt").val();

var bb=$("#display_amount").val();
if(bb==''){
 var b=0;
}else{
  var b=$("#display_amount").val();
}
var c=parseFloat(a)+parseFloat(b);
//alert(c);
$("#total_amt").val(c);
}
});

return false;
}


</script> 
<script>
	function myDesT() {
  /* Get the text field */
  var copyText = document.getElementById("ckeExample");

  /* Select the text field */
  copyText.select();

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  //alert("Copied the text: " + copyText.value);
  toastr.info('Text copied');
}

	function myAddT() {
		
		var e = document.getElementById("city");
		var city = e.options[e.selectedIndex].text;

		//var e1 = document.getElementById("state");
		//var state = e1.options[e.selectedIndex].text;

		//alert(s);
  /* Get the text field */
  var copyText12 = document.getElementById("ckeAddress").value;
var copyText = copyText12+", "+city;

 copyStringToClipboard(copyText);
//console.log(copyText);
//alert(copyText);
  /* Select the text field */
  //copyText.select();
  //c.select();
  //s.select();

  /* Copy the text inside the text field */
  //document.execCommand("copy");

  /* Alert the copied text */
  //alert("Copied the text: " + copyText);
  toastr.info('Text copied');
 
}

function copyStringToClipboard (str) {
   // Create new element
   var el = document.createElement('textarea');
   // Set value (string to be copied)
   el.value = str;
   // Set non-editable to avoid focus and move outside of view
   el.setAttribute('readonly', '');
   el.style = {position: 'absolute', left: '-9999px'};
   document.body.appendChild(el);
   // Select text inside element
   el.select();
   // Copy text to clipboard
   document.execCommand('copy');
   // Remove temporary element
   document.body.removeChild(el);
}
</script>
    <script>$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

function submitUserForm() {
    var response = grecaptcha.getResponse();
    if(response.length == 0) {
        document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">reCAPTCHA is mandatory.</span>';
        return false;
    }
    return true;
}
 
function verifyCaptcha() {
    document.getElementById('g-recaptcha-error').innerHTML = '';
}

</script>

<?php
include"footer.php";

?>