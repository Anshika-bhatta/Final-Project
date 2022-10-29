<?php  
session_start(); 
unset($_SESSION['usrid']);
session_destroy(); 
header("Location:./LoginHtml.php");
?>