<?php
//include 'Connect.php';
require_once ($_SERVER['DOCUMENT_ROOT'] . '/Employee/Connect.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $name = $_POST["name"];
    $message= $_POST["message"];
        $sql_user = "INSERT INTO help(email,name,message)  VALUES ('$email','$name','$message')";
    
        if ($conn->query($sql_user) === TRUE) {
            echo "User  information submitted successfully!";
            header("Location: help.html");  
    
        } else {
            echo "Error: " . $sql_user . "<br>" . $conn->error;
        }
    }

    

?>
