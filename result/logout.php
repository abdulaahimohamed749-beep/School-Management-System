<?php
session_start();
// Dhammaan session-ka tirtir
session_unset();
session_destroy();

// Dib ugu celinta login page
header("Location: login.php");
exit();
?>