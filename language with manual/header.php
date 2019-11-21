<?php

include_once("configure.php");

$foot=mysql_fetch_assoc(mysql_query("select * FROM ".DTABLE_SETTING." where id=1"));

?>

<!DOCTYPE html>



<html lang="en">



<head>



<meta charset="utf-8">



<meta http-equiv="X-UA-Compatible" content="IE=edge">



<meta name="viewport" content="width=device-width, initial-scale=1">



<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->



<title>Antaeya biz shopping & business</title>



<link rel="icon" href="images/favicon.png" type="image/x-icon" />

<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

<link href="css/font-awesome.min.css" rel="stylesheet">

<!-- Bootstrap -->

<link href="css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" type="text/css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" type="text/css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" type="text/css">

<link href="css/flaticon.css" rel="stylesheet">

<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

<link href="css/style.css" rel="stylesheet">

<link href="css/responsive.css" rel="stylesheet">

<style type="text/css">
/*body > .skiptranslate {
    display: none;
}*/
.goog-te-banner-frame.skiptranslate {
    display: none !important;
    } 
body {
    top: 0px !important; 
    }
    .goog-te-gadget-icon {
    /*background-image: url(https://placehold.it/32)!important;
    background-position: 0px 0px;
    height: 32px!important;
    width: 32px!important;
    margin-right: 8px!important;*/
    /*//     OR*/
    display: none;
}
.goog-te-gadget-simple {
    background-color: rgba(255, 255, 255, 0.2) !important;
    border: 1px solid rgba(255, 255, 255, 0.5) !important;
    padding: 2px !important;
    border-radius: 4px !important;
    font-size: 1rem !important;
    line-height: 2rem !important;
    display: inline-block;
    cursor: pointer;
    zoom: 1;
    color: #fff;
    font-family: 'Roboto', sans-serif;
    font-weight: 500;
}
.goog-te-gadget-simple .goog-te-menu-value {
    color: #fff !important;
}
.goog-te-gadget {
    font-family: arial;
    font-size: 11px;
    color: #666;
    white-space: nowrap;
    margin-right: 11px;
    margin-top: 2px;
}
  /*.goog-te-banner-frame.skiptranslate {display: none!important;}*/
  .goog-te-menu-value span:nth-child(1) {
  display:none;
  }
  
 /* .custom-select {
    position: relative;
    padding: 0;
    float: right;
    width: 105px;
    margin-top: 3px;
    background: #8cc63f;
    color: #fff;
    padding-left: 30px;
  }*/
  

</style>


<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en',includedLanguages: 'en,de,tr,ru' ,layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script type="text/javascript">
  var cs=sessionStorage.getItem("lang");
  
    //alert(cs);
    window.addEventListener('load', function() {
    //console.log('All assets are loaded');
    //alert(1);
    setTimeout(function(){
        var lang = $(".goog-te-menu-value span:first").text();
       
        
        if(lang == 'English'){
            //alert(1);
            document.getElementById("myLang").options.selectedIndex = 0;
        }else if(lang == 'German'){
            //alert(1);
            document.getElementById("myLang").options.selectedIndex = 1;
        }else if(lang == 'Turkish'){
            //alert(1);
            document.getElementById("myLang").options.selectedIndex = 2;
        }else if(lang=='Russian') {
             //alert(2);
            document.getElementById("myLang").options.selectedIndex = 3;
        }
        document.getElementById("myLang").style.display = 'block';
    }, 1000);
})
    

  function LangChange(){
    //alert(1);
    var x = document.getElementById("myLang").value;
    sessionStorage.setItem("lang", x);

    if(x=='English'){
        //alert(2);
        
        var $frame = $('.goog-te-menu-frame:first');
        $frame.contents().find('.goog-te-menu2-item span.text:contains(English)').get(0).click();
        return false;
    }else if(x=='German'){
        //alert(1);
       
        var $frame = $('.goog-te-menu-frame:first');
        $frame.contents().find('.goog-te-menu2-item span.text:contains(German)').get(0).click();
        $frame.contents().find('.goog-te-menu2-item span.text:contains(German)').get(0).click();
        
        return false;
    }else if(x=='Turkish'){
        //alert(1);
       
        var $frame = $('.goog-te-menu-frame:first');
        $frame.contents().find('.goog-te-menu2-item span.text:contains(Turkish)').get(0).click();
        $frame.contents().find('.goog-te-menu2-item span.text:contains(Turkish)').get(0).click();
        
        return false;
    }
    else if(x=='Russian'){
        //alert(1);
        
        var $frame = $('.goog-te-menu-frame:first');
        $frame.contents().find('.goog-te-menu2-item span.text:contains(Russian)').get(0).click();
        $frame.contents().find('.goog-te-menu2-item span.text:contains(Russian)').get(0).click();
        
        return false;
    }

}
</script>

</head>



<body>



<!--Header Start-->



<header class="header clearfix">

  <div class="header_topbox clearfix">

      <div class="container clearfix">

          <div class="logo">

              <a href="index"><img src="<?PHP echo SITE_IMAGE_PATH.$foot['logo']?>" alt=""> </a>

            </div>
            <div class="header_ad">

              <a href="index"><img src="<?PHP echo SITE_IMAGE_PATH.$foot['header_upload']?>" alt=""> </a>

            </div>

            <div class="header_topbox_right clearfix">

              <?php if($_SESSION['USER']!=''){?>

              <div class="user">

            <a class="unam" href="javascript:void(0)" id="LoginDropdownMenu" data-toggle="dropdown">

            <i class="icon fa fa-user" aria-hidden="true"></i><?=$_SESSION['USER']['name'];?>

            <i class="fa fa-angle-down" aria-hidden="true"></i>

            </a>

              <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="LoginDropdownMenu">

                <li><a href="post_ad_list"><i class="fa fa-check-square-o" aria-hidden="true"></i> Your Post</a></li>

                <li><a href="profile"><i class="fa fa-user" aria-hidden="true"></i> My Profile</a></li>

                <li><a href="wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i> Wish List</a></li>

                

              </ul>

            </div>

            <ul>

                  

                    <li class=""><a href="logout" class="btn btn-default min-width">LOGOUT</a></li>

                    <!-- <li class="language"><span>Select Language:</span><div class="langue">

                    <a href="#" class="lang"><img class="cuntry" src="images/cuntry.png" alt="">english <img class="arow" src="images/menu_arrow.png" alt=""></a>

                  <div class="lang_box" id="langue_text">

                    <ul>

                      <li><a href="#"><img class="cuntry" src="images/cuntry.png" alt=""> italiano</a></li>

                        <li><a href="#"><img class="cuntry" src="images/cuntry.png" alt=""> français</a></li>

                        <li><a href="#"><img class="cuntry" src="images/cuntry.png" alt=""> italiano</a></li>

                    </ul>

                  </div>

                </div>

                </li> -->

                <div id="google_translate_element" style="float: right; display:none;"></div>
                <li class="language"><select id="myLang" class="form-control langue   notranslate" onchange="LangChange()" style="width: auto;display: inline-block;">
                  <option value="English">English</option>
                <option value="German">German</option>
                <option value="Turkish">Turkish</option>
                <option value="Russian">Russian</option>
              </select></li>

                </ul>


          <?php }else{?>

              <ul>

                  <li class="login"><a href="login"><i class="zmdi zmdi-account-circle"></i> LOGIN</a></li>

                    <li><a href="register" class="btn btn-default min-width">REGISTER</a></li>

                    <!-- <li class="language"><span>Select Language:</span><div class="langue">

                    <a href="#" class="lang"><img class="cuntry" src="images/cuntry.png" alt="">english <img class="arow" src="images/menu_arrow.png" alt=""></a>

                  <div class="lang_box" id="langue_text">

                    <ul>

                      <li><a href="#"><img class="cuntry" src="images/cuntry.png" alt=""> italiano</a></li>

                        <li><a href="#"><img class="cuntry" src="images/cuntry.png" alt=""> français</a></li>

                        <li><a href="#"><img class="cuntry" src="images/cuntry.png" alt=""> italiano</a></li>

                    </ul>

                  </div> 

                </div>

                </li> -->
                <div id="google_translate_element" style="float: right; display:none;"></div>
                <li class="language"> 
                <!--<span>Select Language:</span> -->
                <select id="myLang" class="form-control langue   notranslate" onchange="LangChange()" style="width: auto;display: inline-block;">
                  <option value="English">English</option>
                <option value="German">German</option>
                <option value="Turkish">Turkish</option>
                <option value="Russian">Russian</option>
              </select></li>

                </ul>

              <?php }?>

            </div>

        </div>

    </div>

    <div class="header_menuarea clearfix">

    <div class="container">

          <div class="allcategoriesbox">

              <a href="#MenuSecondary" data-toggle="modal" data-target="#MenuSecondary">categories<span>Show All<?=$_SESSION['lang'];?></span></a>

            </div>

            <div class="header_menuarea_right clearfix">

              <div class="categories_dropdown">

                <form action="listing" name="search" method="get">

                  <div class="input-group">

                      <input type="text" value="<?=$_REQUEST['title'];?>" name="title" class="form-control" placeholder="SEARCH">

                      <div class="input-group-append">

                       

                        <select name="cat" class="btn" required>

                              <option  value="" >All Categories</option>

                              <?php 



                    $sql_cat= "SELECT * FROM ".DTABLE_CATEGORY." ";



                    $res_cat = $db->selectData($sql_cat);



                    while($row_cat = $db->getRow($res_cat)){



                    ?>

                              <option <?php if($_REQUEST['cat']==$row_cat['id']){echo"selected";}?> value="<?=$row_cat['id'];?>"><?=$row_cat['name'];?></option>

                              <?php }?>

                          </select>

                      </div>

                    </div>

                </div>

                <div class="categories_dropdown">

                  <div class="input-group">

                      <input type="text" value="<?=$_REQUEST['loc'];?>" name="loc" class="form-control" placeholder="SEARCH">

                      <div class="input-group-append">

                         <select name="place" class="btn" required>

                              <option  value="" >Whole Place</option>

                              <?php 



                    $sql1= "SELECT * FROM ".TABLE_COUNTRY."  ORDER BY name";



                    $res1 = $db->selectData($sql1);



                    while($row_rec1 = $db->getRow($res1)){



                    ?>

                               <option <?php if($_REQUEST['place']==$row_rec1['id']){echo"selected";}?> value="<?php echo $row_rec1['id']; ?>"><?php echo $row_rec1['name']; ?></option>



                    <?php } ?>

                          </select>

                      </div>

                    </div>

                </div>

               <div class="widget widget-search">

                <button class="btn-search" type="submit"><i class="fa fa-search"></i></button>

                <!-- <a class="btn-search" href="javascript:void(0)"></a>  -->                       

                <!--<div class="topsearch" id="TopSearch1">-->

                    

                <!--    <div class="input-group mb-3 mb-lg-0">-->

                <!--        <input type="text" class="form-control" placeholder="SEARCH">-->

                <!--        <div class="input-group-prepend"><button  class="btn btn-dark" type="submit" style="height: 44px;width: 44px;"><i class="fa fa-search"></i></button></div>-->

                <!--    </div>-->

                <!--    -->

                <!--</div>-->
</form>
            </div>
             <a href="compare" class="btn-link pull-right">Compare</a>
             <a href="category" class="btn-link pull-right">Shop Owners</a>
             
            </div>

        </div>

    </div>

</header>







