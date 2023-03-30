<?php
// Initialize the session
session_start();
require_once "config.php";
mysqli_query($link, "UPDATE users SET onstatus = '0' WHERE id = {$_SESSION['id']}");

// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();

// Redirect to login page
header("location: login.php");
exit;
?>