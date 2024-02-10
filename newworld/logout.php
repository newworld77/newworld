<?php
// Start the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page (you can change this URL to your desired location)
header("Location: index.php");
exit;
?>
