<?php
session_start();
require "../Connect.php";
$email = "";
$name = "";
$errors = array();

if(isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $personalnumber = $_POST['personalnumber'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $checkoutdate = $_POST['checkoutdate'];
    $checkindate = $_POST['checkindate'];
    $checkout = $_POST['checkout'];
    $checkin = $_POST['checkin'];
    $department = $_POST['department']; 
    $hod = $_POST['dpthod'];
    $refname = $_POST['refname'];
    $leavetype = $_POST['leavetype'];
    $daysnum = $_POST['daysnum'];
    $reason = $_POST['reason'];

    $status = isset($_POST['status']) ? $_POST['status'] : '0';
   // $status = $_POST['status'];

    $checkSql = "SELECT * FROM employee WHERE personalnumber = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("i", $personalnumber);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        $sql = "INSERT INTO `leaves` (fullname, personalnumber, email, phonenumber, checkoutdate, checkindate, checkout, checkin, department, dpthod, refname, leavetype, daysnum, reason, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sisissssssssisi", $fullname, $personalnumber, $email, $phonenumber, $checkoutdate, $checkindate, $checkout, $checkin, $department, $hod, $refname, $leavetype, $daysnum, $reason, $status);
        
        if ($stmt->execute()) {
            //echo "Leave application submitted successfully.";
            header("Location: ../leave/dashboard.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Employee with personal number $personalnumber not found.";
    }
    $checkStmt->close();
}
$conn->close();

 

?>