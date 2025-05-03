<?php
session_start();
session_unset();
session_destroy();

// Prevent cache after logout
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

// Redirect to login
header("Location: seller_login.php");
exit();
?>
