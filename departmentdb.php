<?php

//require_once ($_SERVER['DOCUMENT_ROOT'] . '/Employee/Connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // $department_name = $_POST['dptname'];
    // $head_of_department = $_POST['dpthod'];
    // $department_ext_num = $_POST['dptextnum'];
    // $department_email =$_POST['dptemail'];
    // $department_address = $_POST['dptaddress'];
    // $date_created = $_POST['dptdate']; 
    // $department_loation = $_POST['dptlocaton']; 

    $stmt = $conn->prepare("INSERT INTO department (dptname, dpthod, dptextnum, dptemail, dptaddress, dptdate, dptlocation) 
    VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    // Check if the statement was prepared successfully
    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
        exit;
    }

    $stmt->bind_param("ssissss", $department_name, $head_of_department, $department_ext_num, $department_email, $department_address, $date_created, $department_location);

    if ($stmt->execute()) {
        header('location:../admin/admindash.php.php');
        exit();
        //echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request method.";
}

$conn->close();

    //Bind parameters and execute
//     if ($stmt) {
//         mysqli_stmt_bind_param($stmt, "ssssss", $full_name, $personal_number, $email, $date_of_birth, $gender, $user_password);
//         if (mysqli_stmt_execute($stmt)) {
//             header("Location: Home.html"); // Redirect on success
//             exit;
//         } else {
//             echo "Error: " . mysqli_stmt_error($stmt);
//         }
//         mysqli_stmt_close($stmt);
//     } else {
//         echo "Error preparing statement: " . mysqli_error($conn);
//     }
// }

// mysqli_close($conn);

?>

include_once('Connect.php');

// Retrieve form data
$department_name = $_POST['dptname'];
$head_of_department= $_POST['dpthod'];
$department_ext_num= $_POST['dptextnum'];
$department_email = $_POST['dptemail'];
$department_address = $_POST['dptaddress'];
$date_created = $_POST['dptdate'];
$department_location= $_POST['dptlocaton'];
// Add more fields as needed

// Insert data into the database
$sql = "INSERT INTO deparment(deparment_name, head_of_department, department_ext_num, department_email, department_address, date_created, department_location) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $department_name, $head_of_department, $department_ext_num, $department_email, $department_address,$date_created, $department_location); // Assuming both fields are strings (change "ss" as needed)

if ($stmt->execute()) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();