
<?php
 
 require_once "../Connect.php";

// if (isset($_GET['employee_id'])) { 
//     $employee_id = $_GET['employee_id']; 
//     $stmt = $conn->prepare("DELETE FROM employee WHERE employee_id = ?");
//     $stmt->bind_param("i", $employee_id); 
    
//     if ($stmt->execute()) {
//         echo "<script>alert('Employee deleted successfully'); window.location.href='employee_details.php';</script>";
//     } else {
//         echo "Error deleting user.";
//     }
//     $stmt->close();
// } else { 
//     echo "Invalid request. Employee ID not specified.";
// }

// $conn->close();

if (isset($_GET['delid'])) {
    $employeeId = $_GET['delid']; 
    $sql = "DELETE FROM employee WHERE employee_id = $employeeId";

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully"; 
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

?>