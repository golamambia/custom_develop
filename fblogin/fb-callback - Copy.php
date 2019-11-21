<?php
require_once 'configure.php';
require_once 'config.php';
try{
   
	
$accessToken=$helper->getAccessToken();

}catch(\Facebook\Exceptions\FacebookResponceException $e){
	echo 'Response Exception'.$e->getMesaage();
	exit();
}

catch(\Facebook\Exceptions\FacebookResponceSDKException $e){
	echo 'Sdk Exception'.$e->getMesaage();
	exit();
}
if(!$accessToken){
	header('location:login.php');
	exit();
}
$oAuth2client=$FB->getOAuth2client();
if(!$accessToken->isLonglived())
	$accessToken=$oAuth2client->getLonglivedAcessToken($accessToken);
$response=$FB->get(
 '/me?fields=id,name,email,picture',
   $accessToken
  );


$userData=$response->getGraphNode()->asArray();
//$_SESSION['userdata']=$userData;
$_SESSION['acess_token']=(string)$accessToken;


$_POST['entry_date'] = date('d-m-Y');
$_POST['status'] = 'active';
$_POST['log_type'] = 'fb';
$_POST['name'] = $userData[name];
$_POST['email'] = $userData[email];
//$get_last_id = $db->insertDataArray(TABLE_USER,$_POST);

$sql ="SELECT * FROM ".TABLE_USER." WHERE email='$_POST[email]' ";
 $row_count2=mysql_num_rows(mysql_query($sql));
 if($row_count2>0){
     $row = $db->selectData($sql);
$res = $db->getRow($row);
          //$msg_class = 'alert-error';
                    //$msg = "Sorry email already exist";
                    $newAdminDataArray = array( 
  'id' => $res['id'],
  'logedin' => 'true',
  'email' => $res['email'],
  'customer_id' => $res['customer_id'],
  'status' => $res['status'],
  'mobile' => $res['mobile'], 
  'name' =>  $res['name']
);
$_SESSION['USER'] = $newAdminDataArray;
header('location:my_account');
                    
 }else{
//$_POST['entry_date'] = date('d-m-Y');
//$_POST['status'] = 'active';
$get_last_id = $db->insertDataArray(TABLE_USER,$_POST);
                    
                    $newAdminDataArray = array( 
  'id' => $get_last_id,
  'logedin' => 'true',
  'email' => $_POST['email'],
  //'customer_id' => $res['customer_id'],
  'status' => $_POST['status'],
  //'mobile' => $res['mobile'], 
  'name' => $_POST['name']
);
            $_SESSION['USER'] = $newAdminDataArray;        
                    
                    header('location:my_account');
                    }

//print_r($_SESSION['userdata']);

?>