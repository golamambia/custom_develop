<?php
session_start();
require('configure.php');

if(isset($_POST['req_paypal']) && $_POST['req_paypal']=='req_paypal'){
	$randomnumber = rand ( 1000000000000 , 9999999999999 );
	$_SESSION["random"] = $randomnumber;

	$orders_details['orderid'] = $randomnumber;
	$orders_details['payment_status'] = 'Waiting';
	$_SESSION['post_data2']['payment_status']='Waiting';
  	$_SESSION['post_data2']['order_id']=$randomnumber;
  	$_SESSION['post_data2']['usr']=$_SESSION['USER']['email'];
      $get_last_id = $db->insertDataArray(TABLE_POPDETAILS,$_SESSION['post_data2']);
}


// PayPal settings
$paypal_email = "wtm.us_seller@mail.com";
$return_url = SITE_URL.'thankyou.php?successful='.base64_encode($randomnumber);
$cancel_url = SITE_URL.'payment-cancelled.php';
$notify_url = SITE_URL.'payments.php';

$item_name = 'Privatecleaner';
$item_amount = $_POST['amount'];
$currency = 'USD';
$localcode = 'US';


// Check if paypal request or response
if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])){
	$querystring = '';
	
	$querystring .= "?business=".urlencode($paypal_email)."&";
	$querystring .= "item_name=".urlencode($item_name)."&";
	$querystring .= "amount=".urlencode($item_amount)."&";
	$querystring .= "currency_code=".urlencode($currency)."&";
	$querystring .= "lc=".urlencode($localcode)."&";
	$querystring .= "custom=".urlencode($randomnumber)."&";
	
	foreach($_POST as $key => $value){
		$value = urlencode(stripslashes($value));
		$querystring .= "$key=$value&";
	}
	
	// Append paypal return addresses
	$querystring .= "return=".urlencode(stripslashes($return_url))."&";
	$querystring .= "cancel_return=".urlencode(stripslashes($cancel_url))."&";
	$querystring .= "notify_url=".urlencode($notify_url);
	
	header('location:https://www.sandbox.paypal.com/cgi-bin/webscr'.$querystring);
	exit();
	
} else {
	$req = 'cmd=_notify-validate';
	foreach ($_POST as $key => $value) {
		$value = urlencode(stripslashes($value));
		$value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i','${1}%0D%0A${3}',$value);// IPN fix
		$req .= "&$key=$value";
	}
	
	$header = "POST /cgi-bin/webscr HTTP/1.1\r\n";
	$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
	$header .= "Host: www.sandbox.paypal.com\r\n";  //www.paypal.com for a live site
	$header .= "Content-Length: " . strlen($req) . "\r\n";
	$header .= "Connection: close\r\n\r\n";
	$fp = fsockopen('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);
	
	if (!$fp) {
	} else {
		fputs($fp, $header . $req);
		while (!feof($fp)) {
			$res = fgets ($fp, 1024);
			if (stripos($res, "VERIFIED") !== false){
			    
			         $orderid=$_POST['custom'];
                $orders_details['pay_status'] = 'successful';
                $orders_details['transaction_id'] = $_POST["txn_id"];
                $orders_details['payment_amt'] = $_POST['mc_gross'];
                $orders_details['status'] = 'Active';
                //$orders_details['price'] = $_POST['mc_gross'];
			    $data=mysql_fetch_assoc(mysql_query("select * from ".TABLE_POPDETAILS." where order_id='$orderid'"));
			     $log=SITE_URL.'banner.php?event='.base64_encode($data['events']).'&location='.base64_encode($data['city']).'&date='.base64_encode($data['start_date']);
			     $orders_details['link'] =$log;
    $db->updateArray(TABLE_POPDETAILS,$orders_details, "order_id=".$orderid) or die(mysql_error());
    

    	$subject = "Thank you for posting with Pop Up Log.";

           

            $mail_body = '<html><body>';


            $mail_body .= '<table rules="all" style="border-color: #666;" cellpadding="10">';

            $mail_body .= "<tr style='background: #eee;'><td><strong>Event Name:</strong> </td><td>" .$data['name']. "</td></tr>";
 


            $mail_body .= "<tr><td><strong>You can find your listing here:</strong> </td><td>" .$log. "</td></tr>";


            $mail_body .= "</table>";

            $mail_body .= "</body></html>";
            $mail_body .= "<p>We appreciate your association. </p><p>Thanks,</p><p>Pop Up Log</p><p>PS: This is an auto generated mail, Please do not reply to this.</p>";

				$name=$data["name"];
				require_once('class/class.phpmailer.php');
				$mail = new PHPMailer();

				$mail->IsSMTP();                                  
				$mail->Host = "bh-ht-2.webhostbox.net";  
				$mail->SMTPAuth = true; 
				$mail->Username = "sendmail@webtechnomind.com"; 
				$mail->Password = "ZM-(XPt2ie!z"; 
				$mail->From = "sendmail@webtechnomind.com";
				$mail->FromName = "Pop Up Log";
				$mail->AddAddress($data[usr]);  
				$mail->WordWrap = 5; 
				$mail->IsHTML(true);  
				$mail->Subject = $subject;
				$mail->Body    = $mail_body;
				$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
				$mail->Send();
			}
		}
	fclose ($fp);
	}
}
?>
