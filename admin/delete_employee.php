
<?php
 
 require_once "../Connect.php";

if (isset($_GET['employee_id'])) {
    // Safe to access 'employee_id' since we've checked it exists
    $employee_id = $_GET['employee_id'];

    // Assuming 'employee_id' is an integer
    $stmt = $conn->prepare("DELETE FROM employee WHERE employee_id = ?");
    $stmt->bind_param("i", $employee_id); // 'i' denotes the type is integer
    
    if ($stmt->execute()) {
        echo "<script>alert('Employee deleted successfully'); window.location.href='employee_details.php';</script>";
    } else {
        echo "Error deleting user.";
    }
    $stmt->close();
} else {
    // The 'employee_id' parameter wasn't passed in the URL
    echo "Invalid request. Employee ID not specified.";
}

$conn->close();
?>