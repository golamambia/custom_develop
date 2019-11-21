<?php
include_once("configure.php");
//unset($_SESSION['ADMIN']);
unset($_SESSION['USER']);
session_destroy();
header("location:index");
?>
