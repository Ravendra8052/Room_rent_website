<?php  
include 'connection.php';
session_start();
session_destroy();
echo "Logout Successfull...!";
header('refresh:2,url=login.php');
?>