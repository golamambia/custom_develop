<?php
include"configure.php";
$bid=$_POST['pid'];
$social=$_POST['social'];
$get_dec_head = $pm->getTableDetails(TABLE_POPDETAILS,'id',$bid);
 $actual_link1 = 'http://'.$_SERVER['HTTP_HOST'].'/work/lic/banner_dts.php?event='.base64_encode($bid);
 $actual_link =urlencode($actual_link1);
 $get_dec_head2 = $pm->getTableDetails(TABLE_POPDETAILS,'id',$bid);
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php echo $get_dec_head2['name']; ?></title>
 <meta property="og:image" content="http://webtechnomind.com/work/lic/<?PHP echo SITE_UPLOAD.$get_dec_head2['up_file']?>" />
<meta  property="og:title" content="<?php echo $get_dec_head2['name']; ?>"  >
</head>
<body>
<?php 
if($social=='facebook'){
	echo"amb~".$button='http://www.facebook.com/share.php?u='.$actual_link."~bia";
}else if($social=='twitter'){
echo"amb~".$button='https://twitter.com/share?url='.$actual_link."~bia";
}else if($social=='google-plus'){
echo"amb~".$button='https://plus.google.com/share?url='.$actual_link."~bia";
}else if($social=='linkedin'){
echo"amb~".$button='http://www.linkedin.com/shareArticle?mini=true&amp;url='.$actual_link."~bia";
}else{
echo"amb~".$button='https://plus.google.com/share?url='.$actual_link."~bia";
}
?>
			
  </body>

  </html>