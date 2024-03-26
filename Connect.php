<?php

$servername = "localhost";
$dBUsername = "root";
$dbPassword = "";
$dBName = "eams";

$conn = mysqli_connect($servername, $dBUsername, $dbPassword, $dBName);

if(!$conn){
	echo "Database Connection Failed";
}
echo""



// require_once ($_SERVER['DOCUMENT_ROOT'] . '/Employee/Connect.php');

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Collect and sanitize input data
//     $full_name = mysqli_real_escape_string($conn, $_POST['fullname']);
//     $personal_number = mysqli_real_escape_string($conn, $_POST['personalnumber']);
//     $email = mysqli_real_escape_string($conn, $_POST['email']);
//     $date_of_birth = mysqli_real_escape_string($conn, $_POST['dob']);
//     $gender = mysqli_real_escape_string($conn, $_POST['gender']);
//     $password = $_POST['password']; // Collecting password to hash
//     $user_password = password_hash($password, PASSWORD_DEFAULT); // Hashing the password
    
//     // Prepare the SQL statement
//     $stmt = $conn->prepare("INSERT INTO employee (fullname, personalnumber, email, dob, gender, password) VALUES (?, ?, ?, ?, ?, ?)");
//     //$stmt = $conn->prepare("INSERT INTO `employee`(`fullname`, `personalnumber`, `email`, `dob`, `gender`, `password`) VALUES ($full_name, $personal_number,$email,$date_of_birth,$gender,$user_password));
//     $stmt->bind_param("sissss", $full_name, $personal_number, $email, $date_of_birth, $gender, $user_password);

//     $sql = "INSERT INTO `employee`(`fullname`, `personalnumber`, `email`, `dob`, `gender`, `password`) VALUES ($full_name, $personal_number,$email,$date_of_birth,$gender,$user_password)"; 

//     $stmt = mysqli_stmt_init($conn);
//     $prepareStmt = mysqli_stmt_query($stmt,$sql);

//     if ($prepareStmt) {
//          mysqli_stmt_bind_param($stmt, "sissss", $full_name, $personal_number, $email, $date_of_birth, $gender, $user_password);
//          mysqli_stmt_execute($stmt);
//          echo "<script type= 'text/javascript'>alert('Successfull Registered')</script>";
//     }else{
//         die("Something went wrong");
//     }
//     if (mysqli_stmt_execute($stmt)) {
//         header("Location: Login.html");
//         exit;
//         } else {
//         echo "Error: " . mysqli_stmt_error($stmt);
//         }
// }

// require_once ($_SERVER['DOCUMENT_ROOT'] . '/Employee/Connect.php');

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Collect input data
//     $full_name = $_POST['fullname'];
//     $personal_number = $_POST['personalnumber'];
//     $email = $_POST['email'];
//     $date_of_birth = $_POST['dob'];
//     $gender = $_POST['gender'];
//     $password = $_POST['password']; // Collecting password to hash
//     $user_password = password_hash($password, PASSWORD_DEFAULT); // Hashing the password
    
//     // Correctly prepare the SQL statement using placeholders
//     $stmt = $conn->prepare("INSERT INTO `employee` (`fullname`, `personalnumber`, `email`, `dob`, `gender`, `password`) VALUES (?, ?, ?, ?, ?, ?)");
    
    
//     $insert = INSERT INTO employee (fullname, personalnumber, email, dob, gender, password) VALUES (full_name, $personal_number, $email, $date_of_birth, $gender, $user_password)"); 
//     $query = mysqli_query($conn,$stmt);
//     // Bind parameters to the prepared statement
//     if ($stmt === false) {
//         die("Prepare failed: " . $conn->error);
//     }

//     $stmt->bind_param("sissss", $full_name, $personal_number, $email, $date_of_birth, $gender, $user_password);

//     // Execute the prepared statement
//     if ($stmt->execute()) {
//         echo "<script type='text/javascript'>alert('Successfully Registered');</script>";
//         header("Location: Login.php"); // Redirect on success
//         exit;
//     } else {
//         echo "Error: " . $stmt->error;
//     }

//     // Close the prepared statement
//     $stmt->close();
// }



?>
