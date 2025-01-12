<?php 
// Start the session
session_start();

// Unset all session variables
session_unset();

// Optionally, you can destroy the session if you want to remove session data entirely
session_destroy();
header("location:./");
?>