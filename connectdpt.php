<?php
 
//  session_start();
 
//  if ($_SERVER["REQUEST_METHOD"] == "POST") {
//      require_once "Connect.php";  
 
//      $department_name = $conn->real_escape_string($_POST['dptname']);
//      $head_of_department = $conn->real_escape_string($_POST['dpthod']);
//      $department_ext_number = $conn->real_escape_string($_POST['dptextnum']);
//      $department_email = $conn->real_escape_string($_POST['dptemail']);
//      $department_address = $conn->real_escape_string($_POST['dptaddress']);
//      $date_created = $conn->real_escape_string($_POST['dptdate']);
//      $department_location = $conn->real_escape_string($_POST['dptlocaton']);
 
//      $stmt = $conn->prepare("INSERT INTO department (dptname, dpthod, dptextnum, dptemail, dptaddress, dptdate, dptlocaton) VALUES (?, ?, ?, ?, ?, ?, ?)");
     
//      if (!$stmt) {
//          echo "Error preparing statement: " . htmlspecialchars($conn->error);
//          exit;
//      }

//      $stmt->bind_param("ssissss", $department_name, $head_of_department, $department_ext_number, $department_email, $department_address, $date_created, $department_location);

//      if ($stmt->execute()) {
//          $_SESSION['success_message'] = "Department successfully added.";
//          header("Location: ../Employee/department/manage_dpt.php");
//          exit();
//      } else {
//          echo "Error: " . htmlspecialchars($stmt->error);
//      }

//      $stmt->close();
//  } else {
//      echo "Invalid request method.";
//  }
 
//  $conn->close();
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "Connect.php";

    $department_name = $conn->real_escape_string($_POST['dptname']);
    $head_of_department = $conn->real_escape_string($_POST['dpthod']);
    $department_ext_number = $conn->real_escape_string($_POST['dptextnum']);
    $department_email = $conn->real_escape_string($_POST['dptemail']);
    $department_address = $conn->real_escape_string($_POST['dptaddress']);
    $date_created = $conn->real_escape_string($_POST['dptdate']);
    $department_location = $conn->real_escape_string($_POST['dptlocaton']);  


    if (isset($_POST['dptname'])) {
        $department_name = $conn->real_escape_string($_POST['dptname']);
        $query = "SELECT * FROM department WHERE dptname = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $department_name);
        $stmt->execute();
        $result = $stmt->get_result();
        echo ($result->num_rows > 0) ? 'exists' : 'not exists';

    }

    $stmt = $conn->prepare("INSERT INTO department (dptname, dpthod, dptextnum, dptemail, dptaddress, dptdate, dptlocaton) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        echo "Error preparing statement: " . htmlspecialchars($conn->error);
        exit;
    }

    $stmt->bind_param("ssissss", $department_name, $head_of_department, $department_ext_number, $department_email, $department_address, $date_created, $department_location);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Department successfully added.";
        header("Location: ../Employee/department/manage_dpt.php");
        exit();
    } else {
        echo "Error: " . htmlspecialchars($stmt->error);
    }

    $stmt->close();
} else {
    echo "Invalid request method.";
}

$conn->close();



 ?>
 