<?php
if(isset($_POST['stripe_token']) && isset($_POST['custom_token']))
{
    require('configure.php');
    include("config.php");

        $token = $_POST['stripe_token'];
        $amount = $_POST['amount'];        

        $customer = \Stripe\Customer::create(array(
            // 'email' => $email,
            'source'  => $token
        ));
      
         $charge = \Stripe\Charge::create(array(
            'customer' => $customer->id,
            'amount'   => $amount,
            'currency' => 'usd'
        ));

            

        $data['registration_date'] = date('Y-m-d');
        $data['status'] = 'Active';
        $data['password'] = $_POST['password'];
        $data['agree']=$_POST['agree'];
        $data['name']=$_POST['name'];
        $data['email']=$_POST['email'];
        $data['title']=$_POST['title'];
        $data['pincode']=$_POST['pincode'];
        $data['phone_number']=$_POST['mobile'];
        //$data['company_name']=$_POST['company_name'];
        $data['category']=$_POST['cat'];
        $data['location']=$_POST['location'];
        $data['description']=$_POST['description'];
        $data['country']=$_POST['country'];
        $data['city']=$_POST['city'];
        $data['address']=$_POST['address'];
        $data['pay_method']='stripe';
        $data['package']=$_POST['package'];
        $data['transaction_id']=$charge["balance_transaction"];
        $data['payment_amt']=$amount;
        $data['order_id']=$_POST['custom_token'];
        $data['pay_status']=$charge["status"];


        // $tmp_name = $_FILES['image_browse']['tmp_name'];
        //             $name = time()."_".$_FILES['image_browse']['name'];
        //             move_uploaded_file($tmp_name, BANNER_FRONTEND_CLEANER_IMAGE_PATH.$name);
        //           $data['image_browse']=$name;


        $get_last_id = $db->insertDataArray(DTABLE_JOIN_REGISTRATION,$data) or die(mysql_error());
        
        $_SESSION["msg"] = "add_thank";
        $_SESSION["order_id_rand"] = $_POST['custom_token'];
        $_SESSION["tnx_id"] = $charge["balance_transaction"];

        echo $charge["status"];


// $mail_body = "
// <p>Hi ".$_POST['name']."</p>
//    <p>Welcome to the Privatecleaner. Your username is ".$_POST['email']." and password is ".$_POST['password']."</p>
//    <p>Best Regards,<br />The Privatecleaner</p>

//    ";
$paym='strip';
        
$st11=$_POST['cat'];
 $parts = explode(',', $st11);
 

    $tt=count($parts);
   $sql112='';
   for($i=0;$i<$tt-1;$i++) {

$ss=$parts[$i];
   $sql11=mysql_fetch_assoc(mysql_query("select * from ".DTABLE_CATEGORY." where id='$ss'"))[cat_name].', ';
$sql112=$sql112.$sql11;
}

        $amount11=$amount/100;

$mail_body = '<html><body>';
            
            $mail_body .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
            $mail_body .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" .$_POST['name']. "</td></tr>";
            $mail_body .= "<tr><td><strong>Phone:</strong> </td><td>" .$_POST['mobile']. "</td></tr>";
            $mail_body .= "<tr><td><strong>Email:</strong> </td><td>" .$_POST['email']. "</td></tr>";
            $mail_body .= "<tr><td><strong>Password:</strong> </td><td>" .$_POST['password']. "</td></tr>";
            $mail_body .= "<tr><td><strong>Username:</strong> </td><td>" . $_POST['email'] . "</td></tr>";
            
            $mail_body .= "<tr><td><strong>Package:</strong> </td><td>" .$_POST['package']. "</td></tr>";
            $mail_body .= "<tr><td><strong>Amount:</strong> </td><td>" .$amount11. "</td></tr>";
            $mail_body .= "<tr><td><strong>Category:</strong> </td><td>" .$sql112. "</td></tr>";
            $mail_body .= "<tr><td><strong>Pay Method:</strong> </td><td>" .$paym. "</td></tr>";
            $mail_body .= "</table>";
            $mail_body .= "</body></html>";





require 'class/class.phpmailer.php';
   $mail = new PHPMailer;
   
   $mail->IsSMTP();                                  
  $mail->Host = "bh-ht-2.webhostbox.net";  
  $mail->SMTPAuth = true; 
  $mail->Username = "sendmail@webtechnomind.com"; 
  $mail->Password = "ZM-(XPt2ie!z"; 
  $mail->From = "sendmail@webtechnomind.com";
  $mail->FromName = $_POST['name'];
  $mail->AddAddress($_POST['email']);
  $mail->addCC('info@theprivatecleaner.co.uk');    
  $mail->WordWrap = 50; 
  $mail->IsHTML(true);  
  $mail->Subject = ' Registration Mail for Privatecleaner';

  $mail->Body    = $mail_body;
  //$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
   $mail->Send();


    
}

?>