<?php
 
session_start();
$_SESSION = array();
session_unset();
session_destroy();
setcookie('username', $_SESSION['username'], time()-3600, "/");
header("location: login.php");
 
?>
