<?php
 
session_start();
$_SESSION = array();
session_unset();
session_destroy();
setcookie('username', $_COOKIE['username'], time()-3600, "/");
setcookie('email', $_COOKIE['email'], time()-3600, "/");
header("location: login.php");
 
?>
