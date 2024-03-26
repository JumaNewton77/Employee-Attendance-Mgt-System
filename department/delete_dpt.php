<?php
 
 require_once "../Connect.php";

if (isset($_GET['dpt_id'])) {
    $dpt_id = $_GET['dpt_id'];
    $stmt = $conn->prepare("DELETE FROM depatment WHERE dpt_id = ?");
    $stmt->bind_param("i", $dpt_id);  
    
    if ($stmt->execute()) {
        echo "<script>alert('Employee deleted successfully'); window.location.href='employee_details.php';</script>";
    } else {
        echo "Error deleting user.";
    }
    $stmt->close();
} else {

    echo "Invalid request. Employee ID not specified.";
}

$conn->close();
?>