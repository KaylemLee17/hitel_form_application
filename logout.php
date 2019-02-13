<?php
//start session
session_start();

$_SESSION = array();

//destroy session
session_destroy();

//redirect to login page
header("location: login.php");
exit;
?>