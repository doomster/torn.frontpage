<?php
session_start(); 
unset($_SESSION['APIKEY']);
unset($_COOKIE['torndoomstereu']);
session_destroy(); // destroy session
setcookie('torndoomstereu', null , time()-1, '/'); //remove cookie
header("location:index.php"); 
?>