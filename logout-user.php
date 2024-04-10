<?php

// if (!isset($_SESSION)) {
//     session_start();
// }
// $_SESSION = array();
// session_destroy();
// header("Location: ../Employee/Index.php");
// exit;


session_start();
session_unset();
session_destroy();
header('location: ../Employee/Index.php');
?>


 