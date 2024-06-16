<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to a login page or home page
header('Location: ../login.php'); // Change 'login.php' to the appropriate URL
exit;
?>
