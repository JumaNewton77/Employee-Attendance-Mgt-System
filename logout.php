<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logout</title>
</head>
<body>
    
<?php
session_start(); 
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 60*60,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
unset($_SESSION['alogin']);
session_destroy(); // destroy session
header("location:Index.php?message=loggedout");
exit;

if (isset($_GET['message']) && $_GET['message'] == 'loggedout') {
    echo "<p>You have successfully logged out.</p>";
}
?>


</body>
</html>