<?php 
  

function dateDiffInDays($date1, $date2)  
{ 
    // Calulating the difference in timestamps 
    $diff = strtotime($date2) - strtotime($date1); 
      
    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
    return abs(round($diff / 86400)); 
} 
  
// Start date 
$date1 = "17-09-2018"; 
  
// End date 
$date2 = "31-09-2018"; 
  
// Function call to find date difference 
$dateDiff = dateDiffInDays($date1, $date2); 
  
// Display the result 
printf("Difference between two dates: "
   . $dateDiff . " Days "); 
//echo 'PHP version is: ' . phpversion();
//echo 'PHP version is: ' . PHP_VERSION;
//phpinfo();
$file = "Koala1.jpg"; //Let say If I put the file name Bang.png
echo "<a href='download.php?nama=".$file."'>download</a> ";
?> 