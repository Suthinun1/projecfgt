<?php
// logout.php
session_start();
session_unset();  // Clear all session variables
session_destroy();  // Destroy the session
header("Location: checklog.php");  // Redirect to login page
exit();
?>