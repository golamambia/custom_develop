<?php
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
$_SESSION['userdata']=$userData;
$_SESSION['acess_token']=(string)$accessToken;
//print_r($_SESSION['userdata']);
header('location:index.php');
?>