<?php
include"configure.php";
$mail_body = "
   <p>Name : ".$_POST['name']."</p>
   <p>Email : ".$_POST['email']."</p>
   <p>Phone : ".$_POST['phone']."</p>
   <p>Message : ".$_POST['message']."</p>
   ";
$_POST['entry_date']=date('d-m-Y');
$_POST['c_user']=$_POST['sender'];
require 'class/class.phpmailer.php';
   $mail = new PHPMailer;
   
   $mail->IsSMTP();                                  
  $mail->Host = "bh-ht-2.webhostbox.net";  
  $mail->SMTPAuth = true; 
  $mail->Username = "sendmail@webtechnomind.com"; 
  $mail->Password = "ZM-(XPt2ie!z"; 
  $mail->From = "sendmail@webtechnomind.com";
  $mail->FromName = $_POST['name'];
  $mail->AddAddress($_POST['sender']);  
  $mail->WordWrap = 50; 
  $mail->IsHTML(true);  
  $mail->Subject = $_POST['subject'];

  $mail->Body    = $mail_body;
  //$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
   if($mail->Send()){
    echo "yes";
    $get_last_id =$db->insertDataArray(DTABLE_INQUERY,$_POST);
       } else{
echo "no";

       }
?>