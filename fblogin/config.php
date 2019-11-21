<?php 
session_start();
require_once 'Facebook/autoload.php';


$FB=new \Facebook\Facebook([
 'app_id'=>'2310396552563254',
 'app_secret'=>'0f7c3206ba924c84a3a2cdcd9d3a2026',
 'default_graph_version' => 'v2.10'

]);
 $helper = $FB->getRedirectLoginHelper();
?>