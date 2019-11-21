<?php
#setting headers
$filename = $_GET["nama"];
$fullPath = "file/".$filename;
  $contenttype = "application/force-download";
header("Content-Type: " . $contenttype);
header("Content-Disposition: attachment; filename=\"" . basename($filename) . "\";");
readfile($fullPath);
exit();
?>