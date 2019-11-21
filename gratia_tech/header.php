<?php
include"configure.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>classified</title>
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" type="text/css">
<link href="css/flaticon.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">




</head>
<body>
<!--Header Start-->


<header class="header <?php if($page!='index_page'){echo "subpage_header"; }?> clearfix">
	<div class="container">
    	<div class="logo">
        <a href="index"><img src="images/logo.png" alt=""></a>
        </div>
        <div class="header-right">
        	<a id="menu" class="btn-menu" href="javascript:void(0)"><i class="fa fa-bars" aria-hidden="true"></i></a> 
            <div id="MainMenu" class="top-menu clearfix">
                <nav id="navMenu"> 
                    <ul>            
                        <li class="current-menu-item"><a href="index">Home</a></li>
                        <?php 
            $sql = "SELECT * FROM ".DTABLE_CATEGORY." where menu='Yes'";
            $res = $db->selectData($sql);
            while($row_rec = $db->getRow($res)){
            ?>
                        <li><a href="ad_listing?category=<?=$row_rec['id'];?>"><?php echo $row_rec['title']; ?></a></li>
                        <?php }?>
                    </ul>
                </nav>
            </div>
            <div class="pull-right leftarea">
                <?php if($_SESSION['USER']!=''){?>
            	  <a href="logout" class="login_btn"><img src="images/login.png" alt="">LOGOUT</a>
                <?php }else{?>
                     <a href="login" class="login_btn"><img src="images/login.png" alt="">LOGIN</a>
                <?php }?>
                 <a href="post_add" class="btn btn-default">post your ad</a>
                
            </div>
        </div>
    </div>
</header>